<?php

namespace App\Http\Controllers;

use App\Qlib\Qlib;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    public $campo;
    public $campo_motivo;
    // public $uc;
    public function __construct()
    {
        $this->campo = 'backlist';
        $this->campo_motivo = 'motivo_backlist';
        // $this->uc = new UserController;  //user controller
    }
    /**
     * Adiciona usuario ao blacklist
     */
    public function add($user_id,$motivo=false){
        $ret['exec'] = Qlib::update_usermeta($user_id,$this->campo,'s');
        $ret['save_motivo'] = false;
        if($motivo){
            if(is_array($motivo)){
                $ret['save_motivo'] = Qlib::update_usermeta($user_id,$this->campo_motivo,Qlib::lib_array_json($motivo));
            }
        }
        return $ret;
    }
    /**
     * Remove usuario ao blacklist
     */
    public function remove($user_id){
        $ret['exec'] = Qlib::update_usermeta($user_id,$this->campo,'n');
        // $ret['save_motivo'] = false;
        // if($motivo){
        //     if(is_array($motivo)){
        //         $ret['save_motivo'] = Qlib::update_usermeta($user_id,$this->campo_motivo,Qlib::lib_array_json($motivo));
        //     }
        // }
        return $ret;
    }
    /**
     * Metodo para verificar se um usuario está no blacklist
     */
    public function is_blacklist($user_id){
        $rs = Qlib::get_usermeta($user_id,$this->campo,true);
        if($rs=='s'){
            return true;
        }else{
            return false;
        }
    }
}
