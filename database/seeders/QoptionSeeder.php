<?php

namespace Database\Seeders;

use App\Qlib\Qlib;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qoptions')->insert([
            [
                'nome'=>'Diretorio dos arquivos',
                'url'=>'storage_path',
                'valor'=>'/storage',
            ],
            [
                'nome'=>'Emails dos gerentes',
                'url'=>'email_gerente',
                'valor'=>'ger.maisaqui3@gmail.com',
            ],
            [
                'nome'=>'Nome da Empresa',
                'url'=>'empresa',
                'valor'=>'Aeroclube de Juiz de fora',
            ],
            [
                'nome'=>'Formas de pagamento',
                'url'=>'forma_pagamento',
                'valor'=>Qlib::lib_array_json([
                    'boleto'=>'BOLETO',
                    'cartao'=>'Cartão de crédito',
                    'pix'=>'PIX',
                ]),
            ],
        ]);
    }
}
