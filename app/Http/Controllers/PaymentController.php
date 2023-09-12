<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Qlib\Qlib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {

    }
    public function form($post_id,$dados=false){
        $seg1 = request()->segment(1);
        $seg2 = request()->segment(2);
        $ret['exec'] = false;
        $ret['status'] = 404;
        $ret['mens'] = false;
        if($seg1 && $seg2){
            //verificar se o token no seg2 é de um leilao valido
            $tk = explode('-', $seg2);
            if(!isset($tk[1])){
                //a url está infalida
                return view('site.meio404');
            }
            $leilao_id = Qlib::buscaValorDb0('posts','token',$tk[0],'ID');
            //se $tk[1]==01 é para pagar leilao se $tk[1]==02 é para pagar o compreja
            $lc = new LeilaoController; //LeilaoController
            if($leilao_id && $tk[1]=='01'){
                $ul = $lc->get_lance_vencedor($leilao_id,false,'ultimo_lance');
                //coletar o valor do leilao arrematado
                if(isset($ul['ultimo_lance']['valor_lance']) && $ul['ultimo_lance']['valor_lance']>0){
                    $ret['type'] = $tk[1];
                    $ret['type_pagamento'] = 'leilao';
                    $ul = $ul['ultimo_lance'];
                    $ret['ul'] = $ul;
                    //verificar se quem está tentando pagar é o ganhador do leilao
                    $user = Auth::user();
                    if($user['id']==$ul['author']){
                        //verifica se verificou o cadastro
                        $iv=(new UserController)->is_verified();
                        if(!$iv){
                            return redirect()->route('verification.notice');
                        }
                        $ret['status'] = 200; //libera o formularo
                        $ret['mens'] = false;
                        $dl = Post::FindOrFail($leilao_id); //Dados do leilao
                        $dc = false; //dados do contrato
                        $dt = false; //dados do termino ou informações do termino
                        if($dl->count()){
                            $dl = $dl->toArray();
                            $dl['thumbnail'] = Qlib::get_thumbnail_link($dl['ID']);
                            $dt = $lc->info_termino($leilao_id,$dl);
                            if(isset($dl['config']['contrato']) && !empty($dl['config']['contrato'])){
                                $dc0 = Post::where('token',$dl['config']['contrato'])->get()->toArray();
                                if(isset($dc0[0])){
                                    $dc = $dc0[0];
                                }
                            }
                        }

                        $ret['dl'] = $dl; //dados do leilao
                        $ret['dc'] = $dc; //dados do contrato
                        $ret['dt'] = $dt; //dados do terminio
                        $ret['form_credit_cart'] = $this->frmCredCardV2([
                            'dt'=>$dt,
                            'ul'=>$ul, //dados do ultimo lance.
                        ]); //dados do terminio
                    }else{
                        $ret['status'] = 500; //bloqueia o formulario mais exibe uma mensagem de erro
                        $ret['mens'] = Qlib::formatMensagemInfo('Você está tentado pagar uma leilão arrematado pro outro usuário, esta ação não é permitida','danger');
                    }
                    return view('site.leiloes.payment.form',$ret);
                }else{

                }
            }else{
                return view('site.meio404');
            }
        }else{
            return view('site.meio404');
        }
    }
    public function frmCredCardV2($config=false){
		global $suf_in,$tk_conta;
		// $dFp = dados_tab('lcf_formas_pagamentos','*',"WHERE id='2' AND parcelamento='s'");//Dados Forma de pagamento cartão
		$dt = isset($config['dt']) ? $config['dt'] : false; //dados do termino.
		$ul = isset($config['ul']) ? $config['ul'] : false; //dados do ultimo lance.
        $valor = isset($ul['valor_lance']) ? $ul['valor_lance'] : 0;
        $d['valor'] = $valor;
		$dFp = Qlib::qoption('forma_pagamento');//Dados Forma de pagamento cartão
		$d['total_pacelamento'] = 1;
		$parcelasCurso = isset($config['parcelas'])?$config['parcelas']:1;
        if(isset($dFp[0]['total_pacelamento']) && $dFp[0]['total_pacelamento'] > 0){
			$total_pacelamento = $dFp[0]['total_pacelamento'];
			$d['total_pacelamento'] = $total_pacelamento;
		}else{
			$total_pacelamento = 0;
        }
		$ret = false;
		// if(!$valor){
        //     $ret = Qlib::formatMensagemInfo('Valor '.$valor.' é inválido por favor entre em contato com o nosso suporte.','danger');
        //     // $valor = isset($_SESSION[$tk_conta]['matricula'.$suf_in]['total'])?$_SESSION[$tk_conta]['matricula'.$suf_in]['total']:$_SESSION[SUF_SYS]['cart'][0]['valor'];
        // }
		//if($valor==0){
            //$valor = $_SESSION[SUF_SYS]['cart'][0]['valor'];
            //}
        if($valor<=0){
            $ret .= Qlib::formatMensagemInfo('<b>Erro: </b>não é possível finalizar a compra com este valor <b>'.number_format($valor,'2',',','.').'</b>. <a href="/cursos" class="btn btn-link">Todos cursos</a>','danger',10000);
            return $ret;
        }
        $valor_parcela_curso = isset($config['valor_parcela'])?$config['valor_parcela']:@$valor;
        $d['valor_parcela_curso'] = $valor_parcela_curso;
        $d['acao'] = isset($config['acao'])?$config['acao']:'cad';
        $form = isset($config['form'])?$config['form']:true;
        $d['pg'] = isset($config['pg'])?$config['pg']:false;
        $d['arr_mes'] = [];
        foreach (range(1, 12) as $number) {
            $number = Qlib::zerofill($number,2);
            $d['arr_mes'][$number] = $number;
            //$opt .= '<option value="'.$number.'">'.$number.'</option>';
        }
        $esteAno = date('Y');
        $d['arr_ano'] = [];
        foreach (range($esteAno, ($esteAno +10)) as $number) {
            $number = Qlib::zerofill($number,2);
            $d['arr_ano'][$number] = $number;
        }
        $parcelas = 1;
        $d['parcelas'] = $parcelas;
        $moeda = 'R$ ';
        $taxa = Qlib::qoption('taxa_juros')?:null;
        $aplicaJuros = Qlib::qoption('juros_ao_parcelar')?:'n';
        $d['arr_valores'] = [];
        if($parcelas > 0){
            $esteAno = date('Y');
            $c = $valor;
            $jc = 0; //juro composto
            // $calc = new Calculadoras;
            foreach (range(1, ($parcelas)) as $number) {
                $tempo = $number;
                // if($aplicaJuros=='s' && $taxa && $number>1){
                    //     $valor = $calc->jurosComposto($c,$taxa,$tempo);
                    //     $number = zerofill($number,2);
                    // }else{
                        $number = Qlib::zerofill($number,2);
                        // }
                        $valor_parcela = round(($valor/$number),2);
                        if($tempo == $parcelasCurso && $valor_parcela_curso){
                            $moeda.number_format($valor_parcela_curso,2,',','.').'</option>';
                            $d['arr_valores'][$number.'X'.$valor_parcela_curso] = $number.' X '.$moeda.number_format($valor_parcela_curso,2,',','.');
                        }else{
                            $d['arr_valores'][$number.'X'.$valor_parcela_curso] = $moeda.number_format($valor_parcela_curso,2,',','.');
                        }
                        if($number == $total_pacelamento){
                            break;
                        }
                    }
                }else{
                    $d['arr_valores']['1X'.$valor] = '01 X '.$moeda.number_format($valor,'2',',','.');
                    // $opt .= '<option value="1X'.$valor.'">01 X '.$moeda.number_format($valor,'2',',','.').'</option>';
                }
                // $d['parcelas'] = $this->calcParcelamento($valor);
                // dd($d);
                // $ret .= '<div class="card padding-none mb-3" style="padding-top:10px"  id="card_frm_cred_card">';
                // $ret .= '<div class="card-header">';
                // $ret .= '<i class="fa fa-credit-card"></i> Informações do cartão de crédito';
                // $ret .= '</div>';
                // $ret .= '<div class="card-body">';
                // $class_campos = 'form-control c-cred_card';
                // if($form)
                // $ret .= '<form role="form" id="form_cred_card" method="post" action="'.Qlib::urlAtual().'">';
                // 	$ret .= '<div class="pn-cred_card">';
                // 			$ret .='<div class="col-md-12 d-none"><label><input  type="checkbox" value="outro" name="cartao[dono]" > Usar cartão de outra pessoa</label></div>';
                // 			$config['campos_form'][0] = array('type'=>'tel','col'=>'md','size'=>'12','campos'=>'cartao[numero_cartao]-Numero do cartão de crédito*-','value'=>@$config['numero_cartao'],'css'=>false,'event'=>'required','clrw'=>false,'obs'=>false,'outros'=>false,'class'=>$class_campos,'title'=>false);
                // 			$config['campos_form'][1] = array('type'=>'text','col'=>'md','size'=>'12','campos'=>'cartao[nome_no_cartao]-Nome no cartão*-','value'=>@$config['nome_no_cartao'],'css'=>false,'event'=>'required','clrw'=>false,'obs'=>false,'outros'=>false,'class'=>$class_campos,'title'=>'Este é o nome do titular, que está impresso no cartão');
                // 			$config['campos_form']['id_curso'] = array('type'=>'hidden','col'=>'md','size'=>'12','campos'=>'compra[id_curso]-Nome no cartão*-','value'=>@$config['id'],'css'=>false,'event'=>'required','clrw'=>false,'obs'=>false,'outros'=>false,'class'=>$class_campos,'title'=>'Este é o nome do titular, que está impresso no cartão');

                // 			$ret .= formCampos($config['campos_form']);
                // 			$ret .= '<div class="row pl-3 pr-3"><div class="col-md-12" id="campo_validade"><label>Data de validate:</label></div>';
                // 			$Mes = '
        // 			<div class="col-6">
        // 				<select class="select-mes form-control '.$class_campos.'" name="cartao[validade_mes]" required>
        // 					{opt}
        // 				</select>
        // 			</div>';
        // 			$opt = false;
						// 			$opt .= '<option value="" selected>Mês</option>';

						// 			$ret .= str_replace('{opt}',$opt,$Mes);

						// 			$Ano = '
						// 			<div class="col-6">
						// 				<select class="select-ano form-control '.$class_campos.'" name="cartao[validade_ano]" required>
						// 					{opt}
						// 				</select>
						// 			</div>

						// 			';
						// 			$opt = false;
						// 			$opt .= '<option value="" selected>Ano</option>';
						//
						// 			$ret .= str_replace('{opt}',$opt,$Ano);
						// 			$ret .= '</div>';
						// 			$config['campos_form1'][1] = array('type'=>'tel','col'=>'md','size'=>'12','campos'=>'cartao[codigo_seguranca]-Código de serguraça (CVV)*-','value'=>@$config['codigo_seguranca'],'css'=>false,'event'=>'required','clrw'=>false,'obs'=>false,'outros'=>false,'class'=>$class_campos,'title'=>false);
						// 			$ret .= formCampos($config['campos_form1']);
						// 			$ret .= '<div class="col-md-12" id="valor_compra"><label>Valor: </label><br>';
						// 			$temavalor = '
						// 			<select class="select-valor form-control '.$class_campos.'" name="cartao[valor]" required>
						// 				{opt}
						// 			</select>';
						// 			$opt = false;
						// 			// o total esta declarado no objeto $this->resumoCompra()
						// 			if(isAdmin(1)){

						// 				//lib_print($_SESSION[$tk_conta]['matricula'.$suf_in]);
						// 				//lib_print($_SESSION[SUF_SYS]['cart'][0]);exit;
						// 			}
						// 			// if(isset($_GET['teste'])){
						// 			// 	dd($total_pacelamento);
						// 			// }
						// 			//if($_SESSION[SUF_SYS]['cart'][0]['parcelas'] > 0){

						// 			$ret .= str_replace('{opt}',$opt,$temavalor);
						// 			$ret .= '</div>';
						// 	$ret .= '</div>';
						// 	$ret .= $this->frmDadosResponsavel($config); ///comprar com cartão de terciros
						// 	//$ret .= '<div class="col-sm-12">{link_esqueci_senha}</div>';
						// 	//$ret .= queta_formfield4("hidden",'1',"sec-", 'cad_clientes',"","");
						// 	//$ret .= queta_formfield4("hidden",'1',"tab-", base64_encode($GLOBALS['tab15']),"","");
						// 	// $ret .= '<div class="col-md-12 mens2"></div>';
						// 	$ret .= '<div class="col-md-12" style="padding:10px 10px ">';
						// 	//$ret .= '<button type="submit" class="btn btn-success">Entrar</button><br>';

						// 	$ret .= '</div>';
						// if($form)
						// 	$ret .= '</form>';
			// $ret .= '</div>';
			// $ret .= '</div>';
        $ret = view('site.leiloes.payment.form_credit_card',$d);
		return $ret;
	}
}
