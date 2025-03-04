<?php

namespace Database\Seeders;

use App\Models\Qoption;
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
        Qoption::truncate();
        DB::table('qoptions')->insert([
            [
                'nome'=>'Emails do administrador',
                'url'=>'email_gerente',
                'valor'=>'ger.maisaqui1@gmail.com,suporte@maisaqui.com.br',
                'obs'=>'Se precisar colocar mais doque um email tem que separar por virgula.',
            ],
            [
                'nome'=>'Diretorio dos arquivos',
                'url'=>'storage_path',
                'valor'=>'/storage',
            ],
            [
                'nome'=>'Id da permissão do admin',
                'url'=>'id_permission_admin',
                'valor'=>1,
            ],
            [
                'nome'=>'Permissão padrão FrontEnd',
                'url'=>'id_permission_front',
                'valor'=>'8',
                'obs'=>'',
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
                'nome'=>'Campo Meta para status de pagamento',
                'url'=>'meta_pago',
                'valor'=>'pago',
            ],
            [
                'nome'=>'Campo Meta para resumo de pagamento',
                'url'=>'meta_resumo_pagamento',
                'valor'=>'resumo_pagamento',
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
            [
                'nome'=>'Tipos de páginas',
                'url'=>'tipos_paginas',
                'valor'=>Qlib::lib_array_json([
                    'principal'=>'Página principal',
                    'secundaria'=>'Página secundária',
                    'land_page'=>'Landing page',
                    'html'=>'HTML',
                    'leiloes_publicos'=>'Leilões públicos',
                    'area_cliente'=>'Área do cliente',
                ]),
            ],
            [
                'nome'=>'Tipos de conteudo',
                'url'=>'tipos_conteudos',
                'valor'=>Qlib::lib_array_json([
                    'artigo'=>'artigo',
                    'banner'=>'Bnner',
                    'galeria'=>'Galeria',
                    'pdf'=>'PDF',
                    'contratos'=>'Contratos',
                    'galeria'=>'Galeria',
                    'tags'=>'Tags',
                ]),
            ],
            [
                'nome'=>'Notificação de lance para seguidor',
                'url'=>'notific_lance_seguidor',
                'valor'=>'O leilão <b>{nome_leilao}</b> recebeu um lance ',
            ],
            [
                'nome'=>'Duração máxima do leilao',
                'url'=>'duracao_max_leilao',
                'valor'=>'15',
            ],
            [
                'nome'=>'Notiificar usuário sobre cadastro na plataforma',
                'url'=>'notific_new_user_add',
                'valor'=>'s',
            ],
            [
                'nome'=>'Texto Card Segurança',
                'url'=>'texto_card_seguranca',
                'valor'=>'Nosso site garante total segurança e privacidade em todas as transações de leilão de horas de voo. Viaje tranquilo sabendo que seus dados e informações estão protegidos.',
            ],
            [
                'nome'=>'Texto Card Economia',
                'url'=>'texto_card_economia',
                'valor'=>'Economize mais voando: Aproveite a oportunidade de adquirir horas de voo a preços competitivos através de nossos leilões. Maximize seu orçamento e voe mais gastando menos.',
            ],
            [
                'nome'=>'Texto Card Transparência',
                'url'=>'texto_card_transparencia',
                'valor'=>'Transparência total: Com nosso sistema de leilão, você tem visibilidade completa sobre todas as ofertas e lances. Nenhuma surpresa, apenas negociações claras e honestas.',
            ],
            [
                'nome'=>'Texto rodapé',
                'url'=>'texto_rodape',
                'valor'=>'O Aeroclube de Juiz de Fora é uma das escolas de aviação civil mais tradicionais do Brasil e, desde 1938, já formou mais de 12 mil pilotos.',
            ],
        ]);
    }
}
