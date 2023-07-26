<?php

namespace App\Http\Controllers;

use App\Models\lance;
use App\Models\Post;
use App\Qlib\Qlib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function gravar_lance($d=false){
        $ret['exec'] = false;
        if($d){
            $s = lance::create($d);
            if($s->id && isset($d['leilao_id']) && ($leilao_id = $d['leilao_id'])){
                $ret['exec'] = true;
                $ret['id'] = $s->id;
                $ret['auto_lance'] = $this->lance_automatico($leilao_id);

            }
        }
        return $ret;
    }
    public function store(Request $request)
    {
        $d = $request->all();
        $origem = isset($d['origem']) ? $d['origem'] : false;
        $leilao_id = isset($d['leilao_id']) ? $d['leilao_id'] : false;
        $type = isset($d['type']) ? $d['type'] : 'lance';  // serve para marcar os tipos de lances existem 2 tipos de lances type=lance ou type=reserva
        $d['token'] = isset($d['token']) ? $d['token'] : uniqid();
        $d_user = Auth::user();
        $d['author'] = $d_user->id;
        $d['type'] = $type;
        $ret['exec'] = false;
        $ret['code_mens'] = false;
        $ret['mens'] = Qlib::formatMensagemInfo('Erro ao gravar o lance, por favor entre em contato com o nosso suporte','danger');
        if(!isset($d['valor_lance']) || !isset($d['author']) || !isset($d['leilao_id'])){
            return $ret;
        }
        if($d['valor_lance']<0){
            $ret['mens'] = Qlib::formatMensagemInfo('Erro o valor do lance é nulo, por favor selecione outro','danger');
            return $ret;
        }
        //verificar se o lance é igual a algum lance ja dado
        $verifica = Lance::where('valor_lance','=',$d['valor_lance'])
                    ->where('leilao_id','=',$d['leilao_id'])
                    ->where('type','=',$d['type'])
                    ->count();
        if($verifica>0){
            $ret['code_mens'] = 'enc';
            $ret['mens'] = Qlib::formatMensagemInfo('<b>Erro</b> Valor de lance, <b>'.Qlib::valor_moeda($d['valor_lance']).'</b> já foi encontrado tente novamente com outro valor','danger');
            return $ret;
        }

        if($origem=='front'){
            $v_reserva = $this->salvar_reserva($d,$d['leilao_id']);
            $ret['v_reserva'] = $v_reserva;
            $verificar_auto_lance = true;
            if($v_reserva['exec'] && isset($v_reserva['proximo_lance']) && $v_reserva['proximo_lance']>0){
                //Nesse caso salvou a reserva e resgatamos o proximo lance
                $d['valor_lance'] = $v_reserva['proximo_lance'];
                $verificar_auto_lance = false;
            }
            //Antes de gravar novo lance verifica se o ultimo lance foi do que está dando lance atualmente
            $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
            if(isset($d_ultimo_lance['author']) && ($dono_ultimo_l = $d_ultimo_lance['author'])){
                if($dono_ultimo_l==$d['author']){
                    $ret['code_mens'] = 'dulance';
                    $ret['mens'] = Qlib::formatMensagemInfo('<b>Erro</b> O seu lance precisa ser vencido antes de dar o próximo lance','danger');
                    return $ret;
                }
            }
            $ret = $this->gravar_lance($d);
            if($ret['exec']){
                $ret['idCad'] = @$ret['id'];
                $ret['mens'] = Qlib::formatMensagemInfo('Lance cadastrado com sucesso','success',70000);
            }
        }
        return $ret;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function show(lance $lance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function edit(lance $lance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lance $lance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lance  $lance
     * @return \Illuminate\Http\Response
     */
    public function destroy(lance $lance)
    {
        //
    }
    /**
     * Metodo para retornar o proximo ultimo lance dado
     * @param integer $leilao_id
     * @return integer $ret
     */
    public function ultimo_lance($leilao_id=false,$exibe_data=false){
        $ret = 0;
        $l = lance::where('leilao_id',$leilao_id)->where('excluido','n')->orderBy('id', 'desc')->first();
        if($l->count() > 0){
            if($exibe_data){
                $ret = $l;
            }else{
                $ret = $l['valor_lance'];
            }
        }
        return $ret;
    }
    /**
     * Metodo para retornar o proximo lance
     * @param integer $leilao_id
     * @return integer $ret
     */
    public function proximo_lance($leilao_id=false){
        $ret = 0;
        $lance_atual = $this->ultimo_lance($leilao_id);
        $dl = Post::Find($leilao_id);
        if(isset($dl['config']['incremento']) && ($inc = $dl['config']['incremento'])){
            $inc = Qlib::precoBanco($inc);
            if($inc>0){
                $ret = $lance_atual+$inc;
            }
        }
        //$incremento =
        return $ret;
    }
    /**
     * Metodo para salver um lance de reserve
     * @param array $dadosForm, int $leilao_id
     * @return array $ret
     */
    public function salvar_reserva($dadosForm=false,$leilao_id=false){
        $ret['exec'] = false;
        $ret['proximo_lance'] = 0;
        if(isset($dadosForm['valor_lance']) && ($vl=$dadosForm['valor_lance']) && $leilao_id){
            $proximo_lance = $this->proximo_lance($leilao_id);
            if($vl>$proximo_lance){
                //nesse momento o sistema entede que precisa gravar o este lance tbm como reserva
                $ret['proximo_lance'] = $proximo_lance;
                $dadosForm['type'] = 'reserva';
                //verifica se ja tem uma reserva criada se sim ele atualiza com o valor
                $vr = lance::where('leilao_id',$leilao_id)
                    ->where('type','reserva')
                    ->where('excluido','n')
                    ->where('author',$dadosForm['author'])
                    ->get();
                if($vr->count()){
                    //se encontrou vamos atualizar
                    if(isset($vr[0]['id']) && $id=$vr[0]['id']){
                        unset($dadosForm['_token'],$dadosForm['origem'],$dadosForm['ajax']);
                        $salvar = lance::where('id',$id)->update($dadosForm);
                        if($salvar){
                            $ret['exec'] = true;
                        }
                    }
                }else{
                    //se não encontrou vamos gravar novo
                    $salvar = lance::create($dadosForm);
                    if(isset($salvar->id) && $salvar->id){
                        $ret['exec'] = true;
                    }
                }
            }
        }
        return $ret;
    }
    /**
     * Metodo para dar lances automaticos dos registro na reserva
     * @param integer $leilao_id
     * @return array $ret
     */
    public function lance_automatico($leilao_id=false){
        $ret['exec'] = false;
        if($leilao_id){
            $proximo_lance = $this->proximo_lance($leilao_id);
            $reservas = lance::where('leilao_id',$leilao_id)
            ->where('type','reserva')
            ->where('excluido','n')
            ->where('valor_lance','>=',$proximo_lance)
            ->orderBy('id','ASC')
            ->get();
            $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
            if(is_array($reservas) && isset($d_ultimo_lance['author'])){
                foreach ($reservas as $k => $v) {
                    if($v['author'] != $d_ultimo_lance['author']){
                        $salv[$k] = $this->gravar_lance($v,$leilao_id);
                        $d_ultimo_lance = $this->ultimo_lance($leilao_id,true);//dados do ultimo lance
                    }
                }
            }
                // Qlib::lib_print($d_ultimo_lance);
        }
        return $ret;
    }
}
