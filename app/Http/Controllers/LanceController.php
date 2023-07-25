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
    public function store(Request $request)
    {
        $d = $request->all();
        $origem = isset($d['origem']) ? $d['origem'] : false;
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
            $salvar = lance::create($d);
            if(isset($salvar->id) && $salvar->id){
                $ret['exec'] = true;
                $ret['idCad'] = $salvar;
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
    public function ultimo_lance($leilao_id=false){
        $ret = 0;
        $l = lance::where('leilao_id',$leilao_id)->where('excluido','n')->orderBy('id', 'desc')->first();
        if($l->count() > 0){
            $ret = $l['valor_lance'];
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
        if(isset($dadosForm['valor_lance']) && ($vl=$dadosForm['valor_lance']) && $leilao_id){
            $proximo_lance = $this->proximo_lance($leilao_id);
            if($vl>$proximo_lance){
                //nesse momento o sistema entede que precisa gravar o este lance tbm como reserva
            }
        }
        return $ret;
    }
}
