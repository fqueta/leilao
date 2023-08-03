<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Qlib\Qlib;
use App\Rules\FullName;
use App\Rules\RightCpf;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255',new FullName],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf'   =>[new RightCpf, 'unique:users']
        ]);
        // $data = $request->all();
        // $validatedData = $request->validate([
        //     'name' => ['required','string',new FullName],
        //     'email' => ['required','string','unique:users'],
        //     // 'cpf'   =>[new RightCpf]
        // ],[
        //         'name.required'=>__('O nome é obrigatório'),
        //         'name.string'=>__('É necessário conter letras no nome'),
        //         'email.unique'=>__('E-mail já cadastrado'),
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         //REGISTRAR EVENTO
         $regev = Qlib::regEvent(['action'=>'create','tab'=>'user','config'=>[
             'obs'=>'Usuario se cadastrou pelo site',
             'link'=>'',
             ]
        ]);
        $ds = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'pre_registred',
            'cpf' => @$data['cpf'],
            'id_permission' => '5',
            'tipo_pessoa' => 'pf',
        ];
        // dd($ds);
        return User::create($ds);
    }
}
