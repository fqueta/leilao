<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LeilaoController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Qlib\Qlib;

class homeController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function index()
    {
        /*$controlerFamilias = new FamiliaController(Auth::user());
        $dadosFamilias = $controlerFamilias->queryFamilias();
        */

        $blacklist=(new BlacklistController())->get_blacklist();
        $config = [
            'blacklist'=>$ret = (new BlacklistController())->get_blacklist(),
            'lista_leilao_terminado' => (new LeilaoController)->lista_leilao_terminado(),
        ];
        return view('home',[
            'config'=>$config,
        ]);
        return view('home',[
            'config'=>$config,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
