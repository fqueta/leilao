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
            [
                'nome'=>'Token do Asaas',
                'url'=>'token-asaas',
                'valor'=>'9d0c7a708698cd8c74b883a37c2a836282672587e7dd34053773e012d7c10b94', //token do sandbox
            ],
            [
                'nome'=>'Url do Asaas',
                'url'=>'url-asaas',
                'valor'=>'https://sandbox.asaas.com', //url do sandbox
            ],
            [
                'nome'=>'Prazo máximo de boleto gerado na compra em dias',
                'url'=>'prazo_boleto',
                'valor'=>1, //url do sandbox
            ],
            [
                'nome'=>'Debug Front',
                'url'=>'debug_front',
                'valor'=>'s', //url do sandbox
            ],
            [
                'nome'=>'Dados da Empresa',
                'url'=>'dados_empresa',
                'valor'=>Qlib::lib_array_json([
                    'razao'=>'Aeroclube de Juiz de Fora',
                    'cnpj'=>'21.616.420/0001-77',
                    'telefone'=>'(32) 3233-1004',
                    'endereco'=>'Av. Prefeito Mello Reis',
                    'numero'=>'SN',
                    'compl'=>'',
                    'cep'=>'36033560',
                    'bairro'=>'Aeroporto',
                    'cidade'=>'Juiz de Fora',
                    'estado'=>'MG',
                ]),
            ],
        ]);
    }
}
