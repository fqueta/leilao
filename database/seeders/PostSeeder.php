<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create( [
            'ID'=>1,
            'post_author'=>1,
            'post_date'=>'2023-07-03 18:47:50',
            'post_date_gmt'=>'2023-07-03 18:47:50',
            'post_content'=>'
            Isto é o conteudo da página home

            ',
            'post_title'=>'home',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'home',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-06 10:41:03',
            'post_modified_gmt'=>'2023-07-03 18:47:50',
            'post_content_filtered'=>NULL,
            'post_parent'=>8,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a341f536abf'
        ] );


            Post::create( [
            'ID'=>2,
            'post_author'=>1,
            'post_date'=>'2023-07-04 08:56:51',
            'post_date_gmt'=>'2023-07-04 08:56:51',
            'post_content'=>'
            \n
            \n      [sc ac=\"form_leilao\"]\n    \n\n
            \n\n    \n  ',
            'post_title'=>'leilão create',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-create',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-07 17:36:04',
            'post_modified_gmt'=>'2023-07-04 08:56:51',
            'post_content_filtered'=>NULL,
            'post_parent'=>8,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a408ed8c6c5'
            ] );


            Post::create( [
            'ID'=>3,
            'post_author'=>1,
            'post_date'=>'2023-08-01 16:47:19',
            'post_date_gmt'=>'2023-08-01 16:47:19',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"list_lance_user\"]\r\n    \r\n  ',
            'post_title'=>'Lances list',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'lances-list',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-18 11:24:03',
            'post_modified_gmt'=>'2023-07-06 16:47:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>8,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a719e8e3f01'
            ] );


            Post::create( [
            'ID'=>4,
            'post_author'=>1,
            'post_date'=>'2023-07-05 14:05:47',
            'post_date_gmt'=>'2023-07-05 14:05:47',
            'post_content'=>'
            Apenas sugestões

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0947',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.0947',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-13 18:46:31',
            'post_modified_gmt'=>'2023-07-05 14:05:47',
            'post_content_filtered'=>NULL,
            'post_parent'=>5,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"3\",\"total_horas\":\"52\",\"valor_r\":\"R$ 1.933,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a5a2b17a602'
            ] );


            Post::create( [
            'ID'=>5,
            'post_author'=>1,
            'post_date'=>'2023-09-29 16:47:19',
            'post_date_gmt'=>'2023-09-29 16:47:19',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"agradecimento\"]\r\n    \r\n  ',
            'post_title'=>'Agradecimento',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'obrigado-pela-compra',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-18 11:24:03',
            'post_modified_gmt'=>'2023-07-06 16:47:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>8,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a719e8e3d87'
            ] );


            Post::create( [
            'ID'=>6,
            'post_author'=>1,
            'post_date'=>'2023-07-05 23:02:42',
            'post_date_gmt'=>'2023-07-05 23:02:42',
            'post_content'=>NULL,
            'post_title'=>'12312313',
            'post_excerpt'=>NULL,
            'post_status'=>'7',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'12312313',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-05 23:02:42',
            'post_modified_gmt'=>'2023-07-05 23:02:42',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>NULL,
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"total_horas\":\"421\",\"valor_r\":\"R$ 12,12\",\"valor_h\":\"0,03\",\"lance_unit\":\"R$ 21,21\",\"lance_total\":\"8929.41\",\"valor_venda\":\"R$ 21.211,21\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a620c2f327a'
            ] );

            Post::create( [
            'ID'=>7,
            'post_author'=>1,
            'post_date'=>'2023-07-06 00:00:00',
            'post_date_gmt'=>'2023-07-06 09:47:25',
            'post_content'=>NULL,
            'post_title'=>NULL,
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'Banner_home.jpg',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-06 09:47:25',
            'post_modified_gmt'=>'2023-07-06 09:47:25',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>'media/2023/07/Banner_home.jpg',
            'menu_order'=>NULL,
            'post_type'=>'attachment',
            'post_mime_type'=>'image/jpeg',
            'comment_count'=>NULL,
            'config'=>'\"{\\\"extenssao\\\":\\\"jpg\\\"}\"',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>NULL
            ] );

            Post::create( [
            'ID'=>8,
            'post_author'=>1,
            'post_date'=>'2023-07-06 00:00:00',
            'post_date_gmt'=>'2023-07-06 09:51:36',
            'post_content'=>NULL,
            'post_title'=>NULL,
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'AVIÃO-DECOLANDO.jpg',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-06 09:51:36',
            'post_modified_gmt'=>'2023-07-06 09:51:36',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>'media/2023/07/AVIÃO-DECOLANDO.jpg',
            'menu_order'=>NULL,
            'post_type'=>'attachment',
            'post_mime_type'=>'image/jpeg',
            'comment_count'=>NULL,
            'config'=>'\"{\\\"extenssao\\\":\\\"jpg\\\"}\"',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>NULL
            ] );

            Post::create( [
            'ID'=>9,
            'post_author'=>1,
            'post_date'=>'2023-08-01 16:47:19',
            'post_date_gmt'=>'2023-08-01 16:47:19',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"payment\"]\r\n    \r\n  ',
            'post_title'=>'Pagamentos',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'payment',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-09-01 17:14:36',
            'post_modified_gmt'=>'2023-07-06 16:47:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>8,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a719e8e3d03'
            ] );


            Post::create( [
            'ID'=>10,
            'post_author'=>1,
            'post_date'=>'2023-07-05 00:00:00',
            'post_date_gmt'=>'2023-07-05 14:08:56',
            'post_content'=>NULL,
            'post_title'=>NULL,
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'capa.png',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-05 14:08:56',
            'post_modified_gmt'=>'2023-07-05 14:08:56',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>'media/2023/07/capa.png',
            'menu_order'=>NULL,
            'post_type'=>'attachment',
            'post_mime_type'=>'image/png',
            'comment_count'=>NULL,
            'config'=>'\"{\\\"extenssao\\\":\\\"png\\\"}\"',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>NULL
            ] );

            Post::create( [
            'ID'=>11,
            'post_author'=>1,
            'post_date'=>'2023-11-10 13:52:44',
            'post_date_gmt'=>'2023-11-10 13:52:44',
            'post_content'=>'
            \r\n
            \r\n        [sc ac=\"leilao_list_seguindo\"]\r\n    \r\n  ',
            'post_title'=>'Leilões que você segue',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'seguindo',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-11-11 06:03:58',
            'post_modified_gmt'=>'2023-11-10 13:52:44',
            'post_content_filtered'=>NULL,
            'post_parent'=>8,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"4\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'654e5fc344a55'
            ] );


            Post::create( [
            'ID'=>14,
            'post_author'=>1,
            'post_date'=>'2023-07-06 15:27:50',
            'post_date_gmt'=>'2023-07-06 15:27:50',
            'post_content'=>'
            Estamos testando agora mesmo

            ',
            'post_title'=>'leilão cadastrado no admin',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-cadastrado-no-admin',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-08 06:13:26',
            'post_modified_gmt'=>'2023-07-06 15:27:50',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.create\",\"total_horas\":\"87\",\"valor_r\":\"R$ 45,12\",\"valor_h\":\"R$ 0,52\",\"lance_unit\":\"R$ 245,12\",\"lance_total\":\"R$ 213,25\",\"valor_venda\":\"R$ 8.542,12\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a70765472aa'
            ] );


            Post::create( [
            'ID'=>15,
            'post_author'=>1,
            'post_date'=>'2023-07-06 15:28:46',
            'post_date_gmt'=>'2023-07-06 15:28:46',
            'post_content'=>NULL,
            'post_title'=>'Teste frontend',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'teste-frontend',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-08 06:13:39',
            'post_modified_gmt'=>'2023-07-06 15:28:46',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index\",\"total_horas\":\"451\",\"valor_r\":\"R$ 51,21\",\"valor_h\":\"R$ 0,11\",\"lance_unit\":\"R$ 74,52\",\"lance_total\":\"R$ 3.852,00\",\"valor_venda\":\"R$ 412,26\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a707deac54a'
            ] );

            Post::create( [
            'ID'=>16,
            'post_author'=>1,
            'post_date'=>'2023-07-06 15:46:53',
            'post_date_gmt'=>'2023-07-06 15:46:53',
            'post_content'=>'
            Mais um teste',
            'post_title'=>'Novo cadastro teste front',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'novo-cadastro-teste-front',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-09-22 06:56:25',
            'post_modified_gmt'=>'2023-07-06 15:46:53',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index\",\"total_horas\":\"412\",\"valor_r\":\"R$ 0,12\",\"valor_h\":\"R$ 0,02\",\"lance_unit\":\"R$ 0,02\",\"lance_total\":\"R$ 824,00\",\"valor_venda\":\"R$ 412,22\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a70c1d478a3'
            ] );


            Post::create( [
            'ID'=>17,
            'post_author'=>1,
            'post_date'=>'2023-07-06 16:42:10',
            'post_date_gmt'=>'2023-07-06 16:42:10',
            'post_content'=>'
            Mais um teste',
            'post_title'=>'Novo cadastro teste front',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'novo-cadastro-teste-front',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-09-22 07:01:47',
            'post_modified_gmt'=>'2023-07-06 16:42:10',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"total_horas\":\"412\",\"valor_r\":\"R$ 0,12\",\"valor_h\":\"R$ 0,02\",\"lance_unit\":\"R$ 0,02\",\"lance_total\":\"R$ 824,00\",\"valor_venda\":\"R$ 412,22\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a71912268f6'
            ] );


            Post::create( [
            'ID'=>18,
            'post_author'=>1,
            'post_date'=>'2023-07-06 16:47:19',
            'post_date_gmt'=>'2023-07-06 16:47:19',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"list_leilao\"]\r\n    \r\n\r\n
            \r\n\r\n    \r\n  ',
            'post_title'=>'Leilão list',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-list',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-06 17:10:19',
            'post_modified_gmt'=>'2023-07-06 16:47:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>3,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a719e8e3d00'
            ] );


            Post::create( [
            'ID'=>19,
            'post_author'=>2,
            'post_date'=>'2023-07-07 15:15:12',
            'post_date_gmt'=>'2023-07-07 15:15:12',
            'post_content'=>'
            teste salv leiião4 agora mesmo',
            'post_title'=>'Leilao teste4',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-teste4',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-08 06:10:31',
            'post_modified_gmt'=>'2023-07-07 15:15:12',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index2\",\"total_horas\":\"12\",\"valor_r\":\"R$ 0,21\",\"valor_h\":\"R$ 2,12\",\"lance_unit\":\"R$ 0,02\",\"lance_total\":\"R$ 24,00\",\"valor_venda\":\"R$ 21,21\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a85630d0679'
            ] );


            Post::create( [
            'ID'=>20,
            'post_author'=>2,
            'post_date'=>'2023-07-07 17:28:57',
            'post_date_gmt'=>'2023-07-07 17:28:57',
            'post_content'=>'
            teste  atelração vomga com cusecesooo asss Atualização bem sucedida',
            'post_title'=>'leilão teste 5',
            'post_excerpt'=>NULL,
            'post_status'=>'7',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-teste-5',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-08 05:25:34',
            'post_modified_gmt'=>'2023-07-07 17:28:57',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index2\",\"total_horas\":\"12\",\"valor_r\":\"R$ 0,12\",\"valor_h\":\"R$ 0,12\",\"lance_unit\":\"R$ 11,11\",\"lance_total\":\"R$ 13.332,00\",\"valor_venda\":\"R$ 854,21\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a8758941b0b'
            ] );


            Post::create( [
            'ID'=>21,
            'post_author'=>1,
            'post_date'=>'2023-07-07 17:41:28',
            'post_date_gmt'=>'2023-07-07 17:41:28',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"form_leilao\"]\r\n    \r\n\r\n
            \r\n\r\n    \r\n  ',
            'post_title'=>'Leilão edit',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-edit',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-07 17:42:03',
            'post_modified_gmt'=>'2023-07-07 17:41:28',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a8785e33dec'
            ] );


            Post::create( [
            'ID'=>22,
            'post_author'=>2,
            'post_date'=>'2023-07-08 05:37:16',
            'post_date_gmt'=>'2023-07-08 05:37:16',
            'post_content'=>'
            Novo teste de cadastro de leilao',
            'post_title'=>'Mais um cadastro de leilão do contrato taltal',
            'post_excerpt'=>NULL,
            'post_status'=>'pending',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'mais-um-cadastro-de-leilao-do-contrato-taltal',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-20 15:18:47',
            'post_modified_gmt'=>'2023-07-08 05:37:16',
            'post_content_filtered'=>NULL,
            'post_parent'=>5,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"edicao\",\"total_horas\":\"524\",\"valor_r\":\"R$ 5,44\",\"incremento\":\"R$ 452,10\",\"valor_venda\":\"R$ 789,79\",\"termino\":null,\"hora_termino\":null}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a9203c42377'
            ] );


            Post::create( [
            'ID'=>23,
            'post_author'=>1,
            'post_date'=>'2023-07-08 06:15:18',
            'post_date_gmt'=>'2023-07-08 06:15:18',
            'post_content'=>'
            Meu teste novo alterado as informações',
            'post_title'=>'cadstro teste 6',
            'post_excerpt'=>NULL,
            'post_status'=>'pending',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'cadstro-teste-6',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-10 14:13:44',
            'post_modified_gmt'=>'2023-07-08 06:15:18',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"edicao\",\"total_horas\":\"1\",\"valor_r\":\"R$ 0,04\",\"incremento\":\"R$ 40,00\",\"valor_venda\":\"R$ 241,22\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a92926aced1'
            ] );


            Post::create( [
            'ID'=>24,
            'post_author'=>1,
            'post_date'=>'2023-07-10 11:38:09',
            'post_date_gmt'=>'2023-07-10 11:38:09',
            'post_content'=>'
            Contrato apenas

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0948',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>NULL,
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-13 18:46:15',
            'post_modified_gmt'=>'2023-07-10 11:38:09',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"5\",\"total_horas\":\"15\",\"valor_r\":\"R$ 8.422,22\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac17bac7827'
            ] );


            Post::create( [
            'ID'=>25,
            'post_author'=>4,
            'post_date'=>'2023-07-10 14:29:55',
            'post_date_gmt'=>'2023-07-10 14:29:55',
            'post_content'=>'
            Agora é somente um teste',
            'post_title'=>'Leilão 64ac3feb627ab',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>NULL,
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-10 14:30:29',
            'post_modified_gmt'=>'2023-07-10 14:29:55',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index\",\"status\":\"edicao\",\"itens\":[\"24\"],\"total_horas\":\"40\",\"valor_r\":\"R$ 4.500,00\",\"incremento\":\"R$ 41,00\",\"valor_venda\":\"R$ 5.000,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac3feb627ab'
            ] );


            Post::create( [
            'ID'=>26,
            'post_author'=>4,
            'post_date'=>'2023-07-10 14:31:11',
            'post_date_gmt'=>'2023-07-10 14:31:11',
            'post_content'=>'
            Mais teste agora',
            'post_title'=>'Leilão 0026',
            'post_excerpt'=>NULL,
            'post_status'=>'pending',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leil-ao-0026',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-25 08:23:34',
            'post_modified_gmt'=>'2023-07-10 14:31:11',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index2\",\"status\":\"edicao\",\"contrato\":null,\"total_horas\":\"14\",\"valor_r\":\"R$ 4.500,00\",\"incremento\":\"R$ 78,00\",\"valor_venda\":\"R$ 5.000,00\",\"termino\":\"2023-09-02\",\"hora_termino\":\"15:59\",\"pode_lance\":\"6\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac403a55787'
            ] );


            Post::create( [
            'ID'=>27,
            'post_author'=>NULL,
            'post_date'=>'2023-07-10 14:43:03',
            'post_date_gmt'=>'2023-07-10 14:43:03',
            'post_content'=>NULL,
            'post_title'=>'leilão teste 5',
            'post_excerpt'=>NULL,
            'post_status'=>'7',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'20',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-10 14:43:03',
            'post_modified_gmt'=>'2023-07-10 14:43:03',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>1,
            'post_type'=>'menu',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac4327228e7'
            ] );

            Post::create( [
            'ID'=>28,
            'post_author'=>NULL,
            'post_date'=>'2023-07-10 14:46:20',
            'post_date_gmt'=>'2023-07-10 14:46:20',
            'post_content'=>NULL,
            'post_title'=>'leilão teste 5',
            'post_excerpt'=>NULL,
            'post_status'=>'7',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'20',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-10 14:46:20',
            'post_modified_gmt'=>'2023-07-10 14:46:20',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>2,
            'post_type'=>'menu',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac43ec74841'
            ] );

            Post::create( [
            'ID'=>29,
            'post_author'=>NULL,
            'post_date'=>'2023-07-10 14:46:41',
            'post_date_gmt'=>'2023-07-10 14:46:41',
            'post_content'=>NULL,
            'post_title'=>'leilão teste 5',
            'post_excerpt'=>NULL,
            'post_status'=>'7',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'20',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-10 14:46:41',
            'post_modified_gmt'=>'2023-07-10 14:46:41',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>3,
            'post_type'=>'menu',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac4401b0d8f'
            ] );

            Post::create( [
            'ID'=>30,
            'post_author'=>1,
            'post_date'=>'2023-07-10 14:48:12',
            'post_date_gmt'=>'2023-07-10 14:48:12',
            'post_content'=>'
            Novo teste de Leilão',
            'post_title'=>'Leilão 0030',
            'post_excerpt'=>NULL,
            'post_status'=>'pending',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0030',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-10 14:49:14',
            'post_modified_gmt'=>'2023-07-10 14:48:12',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"edicao\",\"itens\":[\"24\"],\"total_horas\":\"10\",\"valor_r\":\"R$ 5.422,20\",\"incremento\":\"R$ 245,12\",\"valor_venda\":\"R$ 8.500,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ac442a96674'
            ] );


            Post::create( [
            'ID'=>31,
            'post_author'=>1,
            'post_date'=>'2023-07-11 03:59:47',
            'post_date_gmt'=>'2023-07-11 03:59:47',
            'post_content'=>'
            Agora mais um teste',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0941',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.0941',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-18 17:42:26',
            'post_modified_gmt'=>'2023-07-11 03:59:47',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"3\",\"total_horas\":\"25\",\"valor_r\":\"R$ 4.251,00\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 5.000,00\",\"valor_atual\":\"R$ 8.000,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64acfd996e0bf'
            ] );


            Post::create( [
            'ID'=>32,
            'post_author'=>1,
            'post_date'=>'2023-07-11 05:52:36',
            'post_date_gmt'=>'2023-07-11 05:52:36',
            'post_content'=>'
            Teste agora mesmo

            ',
            'post_title'=>'Leilão 0032',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0032',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-17 17:29:37',
            'post_modified_gmt'=>'2023-07-11 05:52:36',
            'post_content_filtered'=>NULL,
            'post_parent'=>5,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"edicao\",\"total_horas\":\"15\",\"valor_r\":\"R$8,42\",\"incremento\":\"R$ 452,12\",\"valor_venda\":\"R$ 451,22\",\"termino\":\"2023-09-13\",\"hora_termino\":\"08:00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ad16d0ac6dc'
            ] );


            Post::create( [
            'ID'=>33,
            'post_author'=>2,
            'post_date'=>'2023-07-11 06:07:47',
            'post_date_gmt'=>'2023-07-11 06:07:47',
            'post_content'=>'
            Ola meu teste

            ',
            'post_title'=>'Leilão 0033',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0033',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-20 15:16:52',
            'post_modified_gmt'=>'2023-07-11 06:07:47',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"edicao\",\"total_horas\":\"25\",\"valor_r\":\"R$4,25\",\"incremento\":\"R$ 421,11\",\"valor_venda\":\"R$ 8.500,00\",\"termino\":null,\"hora_termino\":null}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64ad1baccc93a'
            ] );


            Post::create( [
            'ID'=>34,
            'post_author'=>1,
            'post_date'=>'2023-07-07 17:41:28',
            'post_date_gmt'=>'2023-07-07 17:41:28',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"form_meu_cadastro\"]\r\n    \r\n\r\n
            \r\n\r\n    \r\n  ',
            'post_title'=>'Meu cadastro',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'meu-cadastro',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-07 17:42:03',
            'post_modified_gmt'=>'2023-07-07 17:41:28',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"permission\":[\"1\",\"2\",\"3\",\"5\"]}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a8785e34d2g'
            ] );


            Post::create( [
            'ID'=>35,
            'post_author'=>1,
            'post_date'=>'2023-07-13 18:45:22',
            'post_date_gmt'=>'2023-07-13 18:45:22',
            'post_content'=>'
            descriptio de teste

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0941',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.0941',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-13 19:11:38',
            'post_modified_gmt'=>'2023-07-13 18:45:22',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"6\",\"total_horas\":\"12\",\"valor_r\":\"R$ 8.502,22\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b07009b7ab7'
            ] );


            Post::create( [
            'ID'=>36,
            'post_author'=>6,
            'post_date'=>'2023-07-13 19:12:03',
            'post_date_gmt'=>'2023-07-13 19:12:03',
            'post_content'=>'
            Mais agora estou testando este leilão',
            'post_title'=>'Leilão 0036',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0036',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-18 18:43:48',
            'post_modified_gmt'=>'2023-07-13 19:12:03',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"64b07009b7ab7\",\"status\":\"publicado\",\"total_horas\":\"12\",\"valor_r\":\"R$ 8.502,22\",\"incremento\":\"R$ 72,60\",\"valor_venda\":\"R$ 7.855,20\",\"termino\":\"2023-10-26\",\"hora_termino\":\"14:30\",\"pode_lance\":\"6\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b0769e47002'
            ] );


            Post::create( [
            'ID'=>37,
            'post_author'=>1,
            'post_date'=>'2023-07-13 19:58:56',
            'post_date_gmt'=>'2023-07-13 19:58:56',
            'post_content'=>'[sc ac=\"leiloes_publicos\"]',
            'post_title'=>'Leiloes publicos',
            'post_excerpt'=>'descrição curta da página Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu ornare risus.\r\n                    Phasellus sed dolor mi. Donec laoreet convallis diam sed luctus.',
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leiloes-publicos',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2024-01-09 13:45:40',
            'post_modified_gmt'=>'2023-07-13 19:58:56',
            'post_content_filtered'=>NULL,
            'post_parent'=>92,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'[]',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b08191e1f58'
            ] );

            Post::create( [
            'ID'=>38,
            'post_author'=>NULL,
            'post_date'=>'2023-07-13 19:58:57',
            'post_date_gmt'=>'2023-07-13 19:58:57',
            'post_content'=>NULL,
            'post_title'=>'Leiloes publicados',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'37',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-13 19:58:57',
            'post_modified_gmt'=>'2023-07-13 19:58:57',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>4,
            'post_type'=>'menu',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b081b13bc99'
            ] );

            Post::create( [
            'ID'=>39,
            'post_author'=>3,
            'post_date'=>'2023-07-14 13:28:51',
            'post_date_gmt'=>'2023-07-14 13:28:51',
            'post_content'=>NULL,
            'post_title'=>'Leilão 0039',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0039',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-18 17:58:17',
            'post_modified_gmt'=>'2023-07-14 13:28:51',
            'post_content_filtered'=>NULL,
            'post_parent'=>5,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"publicado\",\"total_horas\":\"52\",\"valor_r\":\"R$1,93\",\"incremento\":\"R$ 40,00\",\"valor_venda\":\"R$ 4.852,20\",\"termino\":\"2023-07-27\",\"hora_termino\":\"15:42\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b1779beba6e'
            ] );

            Post::create( [
            'ID'=>40,
            'post_author'=>6,
            'post_date'=>'2023-07-17 16:13:56',
            'post_date_gmt'=>'2023-07-17 16:13:56',
            'post_content'=>'
            oi teste agora mesmo',
            'post_title'=>'Leilão 0040',
            'post_excerpt'=>NULL,
            'post_status'=>'pending',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0040',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-08 10:56:30',
            'post_modified_gmt'=>'2023-07-17 16:13:56',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index2\",\"status\":\"edicao\",\"contrato\":null,\"total_horas\":null,\"valor_r\":null,\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 4.854,74\",\"termino\":\"2023-07-19\",\"hora_termino\":\"18:18\",\"pode_lance\":null}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b592cdc9dc4'
            ] );


            Post::create( [
            'ID'=>41,
            'post_author'=>6,
            'post_date'=>'2023-07-18 16:27:10',
            'post_date_gmt'=>'2023-07-18 16:27:10',
            'post_content'=>'
            teste q',
            'post_title'=>'Leilão 0041',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0041',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-15 15:03:26',
            'post_modified_gmt'=>'2023-07-18 16:27:10',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"publicado\",\"contrato\":\"64b6ecdab4d00\",\"total_horas\":\"45\",\"valor_r\":\"5.420,00\",\"incremento\":\"R$ 75,00\",\"valor_venda\":\"R$ 8.000,00\",\"termino\":\"2023-08-30\",\"hora_termino\":\"15:00\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b6e7630678d'
            ] );


            Post::create( [
            'ID'=>42,
            'post_author'=>1,
            'post_date'=>'2023-07-18 16:51:44',
            'post_date_gmt'=>'2023-07-18 16:51:44',
            'post_content'=>'
            Teste de horas

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0948',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.0948',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-07-18 16:51:44',
            'post_modified_gmt'=>'2023-07-18 16:51:44',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"6\",\"total_horas\":\"45\",\"valor_r\":\"R$ 5.420,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64b6ecdab4d00'
            ] );


            Post::create( [
            'ID'=>43,
            'post_author'=>1,
            'post_date'=>'2023-08-03 09:52:28',
            'post_date_gmt'=>'2023-08-03 09:52:28',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0987',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>NULL,
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-03 09:52:28',
            'post_modified_gmt'=>'2023-08-03 09:52:28',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"3\",\"total_horas\":\"45\",\"valor_r\":\"R$ 8.500,24\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64cba2f3591ea'
            ] );

            Post::create( [
            'ID'=>44,
            'post_author'=>1,
            'post_date'=>'2023-08-03 09:58:03',
            'post_date_gmt'=>'2023-08-03 09:58:03',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.01000',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.01000',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-03 09:58:03',
            'post_modified_gmt'=>'2023-08-03 09:58:03',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"9\",\"total_horas\":\"25\",\"valor_r\":\"R$ 4.251,23\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64cba425e9c2e'
            ] );

            Post::create( [
            'ID'=>45,
            'post_author'=>9,
            'post_date'=>'2023-08-03 10:09:13',
            'post_date_gmt'=>'2023-08-03 10:09:13',
            'post_content'=>'
            Teste de Cadastro de leilao',
            'post_title'=>'Leilão 0045',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0045',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-18 17:39:47',
            'post_modified_gmt'=>'2023-08-03 10:09:13',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"64cba425e9c2e\",\"status\":\"publicado\",\"total_horas\":\"25\",\"valor_r\":\"R$ 4.251,23\",\"incremento\":\"R$ 25,00\",\"valor_venda\":\"R$ 6.000,00\",\"termino\":\"2023-10-20\",\"hora_termino\":\"10:12\",\"pode_lance\":\"8\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64cba6ad36e01'
            ] );


            Post::create( [
            'ID'=>46,
            'post_author'=>1,
            'post_date'=>'2023-08-18 13:18:24',
            'post_date_gmt'=>'2023-08-18 13:18:24',
            'post_content'=>'
            Teste de lorem impsem

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09578',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.09578',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-21 12:57:08',
            'post_modified_gmt'=>'2023-08-18 13:18:24',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"13\",\"total_horas\":\"45\",\"valor_r\":\"R$ 2.050,00\",\"incremento\":\"R$ 125,00\",\"valor_venda\":\"R$ 3.000,00\",\"valor_atual\":\"R$ 5.000,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64df999965c51'
            ] );


            Post::create( [
            'ID'=>47,
            'post_author'=>1,
            'post_date'=>'2023-08-18 13:19:19',
            'post_date_gmt'=>'2023-08-18 13:19:19',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09875',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.09875',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-08-18 13:19:19',
            'post_modified_gmt'=>'2023-08-18 13:19:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"3\",\"total_horas\":\"17\",\"valor_r\":\"R$ 3.254,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64df99e65237b'
            ] );

            Post::create( [
            'ID'=>48,
            'post_author'=>5,
            'post_date'=>'2023-08-18 13:24:06',
            'post_date_gmt'=>'2023-08-18 13:24:06',
            'post_content'=>'
            Este é a descrição do meu leilao em 18/08/2023 teste mesmo atualizado e revisado pelo moderador',
            'post_title'=>'Leilão 0048',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0048',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-05 17:54:27',
            'post_modified_gmt'=>'2023-08-18 13:24:06',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"status\":\"publicado\",\"contrato\":\"64ac17bac7827\",\"total_horas\":\"15\",\"valor_r\":\"R$8.422,22\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 10.000,00\",\"termino\":\"2023-08-31\",\"hora_termino\":\"13:27\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64df9ae404b80'
            ] );


            Post::create( [
            'ID'=>49,
            'post_author'=>1,
            'post_date'=>'2023-08-25 08:18:13',
            'post_date_gmt'=>'2023-08-25 08:18:13',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09t1',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.09t1',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-09-22 05:26:22',
            'post_modified_gmt'=>'2023-08-25 08:18:13',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"4\",\"total_horas\":\"25\",\"valor_r\":\"R$ 2.581,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64e88dd87175a'
            ] );

            Post::create( [
            'ID'=>50,
            'post_author'=>4,
            'post_date'=>'2023-08-25 08:22:43',
            'post_date_gmt'=>'2023-08-25 08:22:43',
            'post_content'=>'
            Ok este é o meu contrato de teste agora mesmo corrigido e aprovado',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09t1',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0050',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-28 09:59:37',
            'post_modified_gmt'=>'2023-08-25 08:22:43',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"64e88dd87175a\",\"status\":\"publicado\",\"total_horas\":\"25\",\"valor_r\":\"R$ 2.581,00\",\"incremento\":\"R$ 50,00\",\"valor_venda\":\"R$ 3.500,00\",\"termino\":\"2023-12-30\",\"hora_termino\":\"20:00\",\"pode_lance\":\"8\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64e88ec0c4144'
            ] );


            Post::create( [
            'ID'=>52,
            'post_author'=>1,
            'post_date'=>'2023-09-20 16:47:19',
            'post_date_gmt'=>'2023-09-20 16:47:19',
            'post_content'=>'
            \r\n
            \r\n      [sc ac=\"ger_user\"]\r\n    \r\n\r\n
            \r\n\r\n    \r\n  ',
            'post_title'=>'Cadastrar usuário',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'user',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-09-20 07:01:48',
            'post_modified_gmt'=>'2023-07-06 16:47:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>3,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'[]',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'64a719e8e4d10'
            ] );


            Post::create( [
            'ID'=>53,
            'post_author'=>1,
            'post_date'=>'2023-09-22 06:59:15',
            'post_date_gmt'=>'2023-09-22 06:59:15',
            'post_content'=>NULL,
            'post_title'=>'tysets',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'tysets',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-09-22 06:59:21',
            'post_modified_gmt'=>'2023-09-22 06:59:15',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"3\",\"total_horas\":\"45\",\"valor_r\":\"R$ 211,21\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'650d6564eb389'
            ] );

            Post::create( [
            'ID'=>54,
            'post_author'=>3,
            'post_date'=>'2023-09-22 07:10:21',
            'post_date_gmt'=>'2023-09-22 07:10:21',
            'post_content'=>'
            Agora mais um teste',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0941',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0054',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-27 11:28:24',
            'post_modified_gmt'=>'2023-09-22 07:10:21',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"64acfd996e0bf\",\"status\":\"publicado\",\"total_horas\":\"25\",\"valor_r\":\"R$ 4.251,00\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 5.000,00\",\"termino\":\"2024-01-03\",\"hora_termino\":\"10:00\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'650d67e4edc68'
            ] );


            Post::create( [
            'ID'=>55,
            'post_author'=>1,
            'post_date'=>'2023-09-25 06:47:21',
            'post_date_gmt'=>'2023-09-25 06:47:21',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09t1 qllla',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.09t1-qllla',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-05 17:50:27',
            'post_modified_gmt'=>'2023-09-25 06:47:21',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"37\",\"total_horas\":\"45\",\"valor_r\":\"R$ 9.000,00\",\"incremento\":null,\"valor_venda\":\"R$ 18.822,22\",\"valor_atual\":\"R$ 422,22\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'651155edd09ec'
            ] );

            Post::create( [
            'ID'=>56,
            'post_author'=>37,
            'post_date'=>'2023-09-25 06:52:45',
            'post_date_gmt'=>'2023-09-25 06:52:45',
            'post_content'=>'
            descrição aero',
            'post_title'=>'Leilão 0056',
            'post_excerpt'=>NULL,
            'post_status'=>'pending',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0056',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-24 06:00:35',
            'post_modified_gmt'=>'2023-09-25 06:52:45',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"site.index2\",\"contrato\":\"651155edd09ec\",\"status\":\"edicao\",\"total_horas\":\"45\",\"valor_r\":\"R$ 9.000,00\",\"incremento\":null,\"valor_venda\":\"R$ 18.822,22\",\"termino\":\"2023-10-26\",\"hora_termino\":\"06:53\",\"pode_lance\":\"6\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6511573ed40cb'
            ] );


            Post::create( [
            'ID'=>57,
            'post_author'=>1,
            'post_date'=>'2023-10-03 07:33:15',
            'post_date_gmt'=>'2023-10-03 07:33:15',
            'post_content'=>'
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in lobortis nisl. In consequat tincidunt porta. Cras a quam nisl. Mauris urna dui, sagittis id lacus tempor, malesuada vehicula ex. Curabitur faucibus fermentum rhoncus. Nunc lobortis pharetra orci, quis porta urna ullamcorper ac. Duis gravida urna ut ipsum rhoncus pretium.

            Etiam porta aliquet neque id scelerisque. Morbi vitae enim vel dolor bibendum scelerisque sit amet sed augue. Duis ut placerat est. Mauris congue maximus ante, id facilisis lorem lacinia eu. Donec venenatis nisi urna. Morbi leo ipsum, lacinia in tortor quis, pulvinar commodo turpis. Morbi molestie magna at lectus viverra, non tempor neque lacinia. Mauris pretium magna diam, vitae dictum neque pharetra sed. Fusce nec magna mi. Aliquam porttitor nisl elit, eget placerat diam tristique ut.

            Praesent nec metus sapien. Etiam in consequat dolor. Ut mattis metus ac mi scelerisque ultricies. Phasellus luctus dolor tempor ipsum rutrum sollicitudin. Mauris pharetra massa sed lectus ornare, eu fringilla orci consectetur. Nunc sed tincidunt ipsum. Maecenas id turpis quis augue aliquam porta. Fusce et rhoncus sapien. Nam facilisis sit amet est vel volutpat. Nulla vel enim magna. Pellentesque pellentesque eros eget lorem aliquet pretium. Integer tempus eros non velit congue, mollis vestibulum magna aliquet. Phasellus ac purus commodo, tristique ligula quis, faucibus diam. Vestibulum lorem ex, sollicitudin vitae magna a, consequat malesuada mi.
            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.0455',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.0455',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-05 18:36:54',
            'post_modified_gmt'=>'2023-10-03 07:33:15',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"13\",\"total_horas\":\"78\",\"valor_r\":\"R$ 5.100,10\",\"incremento\":\"R$ 150,00\",\"valor_venda\":\"R$ 8.745,00\",\"valor_atual\":\"R$ 10.000,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'651bed078e51f'
            ] );


            Post::create( [
            'ID'=>58,
            'post_author'=>13,
            'post_date'=>'2023-10-05 08:31:59',
            'post_date_gmt'=>'2023-10-05 08:31:59',
            'post_content'=>'
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in lobortis nisl. In consequat tincidunt porta. Cras a quam nisl. Mauris urna dui, sagittis id lacus tempor, malesuada vehicula ex. Curabitur faucibus fermentum rhoncus. Nunc lobortis pharetra orci, quis porta urna ullamcorper ac. Duis gravida urna ut ipsum rhoncus pretium.

            Etiam porta aliquet neque id scelerisque. Morbi vitae enim vel dolor bibendum scelerisque sit amet sed augue. Duis ut placerat est. Mauris congue maximus ante, id facilisis lorem lacinia eu. Donec venenatis nisi urna. Morbi leo ipsum, lacinia in tortor quis, pulvinar commodo turpis. Morbi molestie magna at lectus viverra, non tempor neque lacinia. Mauris pretium magna diam, vitae dictum neque pharetra sed. Fusce nec magna mi. Aliquam porttitor nisl elit, eget placerat diam tristique ut.

            Praesent nec metus sapien. Etiam in consequat dolor. Ut mattis metus ac mi scelerisque ultricies. Phasellus luctus dolor tempor ipsum rutrum sollicitudin. Mauris pharetra massa sed lectus ornare, eu fringilla orci consectetur. Nunc sed tincidunt ipsum. Maecenas id turpis quis augue aliquam porta. Fusce et rhoncus sapien. Nam facilisis sit amet est vel volutpat. Nulla vel enim magna. Pellentesque pellentesque eros eget lorem aliquet pretium. Integer tempus eros non velit congue, mollis vestibulum magna aliquet. Phasellus ac purus commodo, tristique ligula quis, faucibus diam. Vestibulum lorem ex, sollicitudin vitae magna a, consequat malesuada mi.
            ',
            'post_title'=>'Leilão 0058',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0058',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-17 06:23:44',
            'post_modified_gmt'=>'2023-10-05 08:31:59',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"651bed078e51f\",\"status\":\"publicado\",\"total_horas\":\"78\",\"valor_r\":\"R$ 5.100,10\",\"incremento\":\"R$ 150,00\",\"valor_venda\":\"R$ 8.745,00\",\"termino\":\"2023-10-25\",\"hora_termino\":\"08:31\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'651e9e475f3c7'
            ] );


            Post::create( [
            'ID'=>59,
            'post_author'=>1,
            'post_date'=>'2023-10-11 08:45:26',
            'post_date_gmt'=>'2023-10-11 08:45:26',
            'post_content'=>'
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu purus dolor. Duis id lectus quis dui consequat rutrum. Mauris pharetra semper diam eu semper. Quisque ut elit egestas, fringilla eros non, accumsan metus. Ut facilisis nisi tempor, molestie ex sed, lacinia magna. Nunc tristique arcu ut convallis gravida. Curabitur vitae dui blandit, scelerisque est semper, pretium felis. Nunc hendrerit luctus sapien, eget ultrices massa tincidunt id. Etiam non scelerisque dui. Nulla facilisi. Morbi odio diam, congue in eros vel, pulvinar ultrices eros.
            Phasellus eget libero id enim suscipit commodo. Aliquam ultrices ex libero, eget scelerisque odio cursus nec. Donec sed metus nibh. Nulla facilisi. Vestibulum tortor augue, volutpat sed aliquet at, bibendum quis urna. Maecenas metus urna, posuere ac leo sit amet, ultrices pulvinar massa. Nulla urna neque, aliquam id gravida vel, sollicitudin auctor lacus. Donec semper dui ut dolor cursus elementum. Aliquam ultrices nunc sit amet turpis venenatis cursus. Etiam ligula lectus, mattis sed vestibulum ut, maximus sed neque. Integer ligula lectus, varius non nisi dapibus, rutrum semper mi.
            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09lpteste',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.09lpteste',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-11 08:45:26',
            'post_modified_gmt'=>'2023-10-11 08:45:26',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"7\",\"total_horas\":\"12\",\"valor_r\":\"R$ 3.500,04\",\"incremento\":\"R$ 120,00\",\"valor_venda\":\"R$ 5.000,00\",\"valor_atual\":\"R$ 6.500,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'65268a5fadc47'
            ] );


            Post::create( [
            'ID'=>60,
            'post_author'=>7,
            'post_date'=>'2023-10-11 08:51:27',
            'post_date_gmt'=>'2023-10-11 08:51:27',
            'post_content'=>'
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu purus dolor. Duis id lectus quis dui consequat rutrum. Mauris pharetra semper diam eu semper. Quisque ut elit egestas, fringilla eros non, accumsan metus. Ut facilisis nisi tempor, molestie ex sed, lacinia magna. Nunc tristique arcu ut convallis gravida. Curabitur vitae dui blandit, scelerisque est semper, pretium felis. Nunc hendrerit luctus sapien, eget ultrices massa tincidunt id. Etiam non scelerisque dui. Nulla facilisi. Morbi odio diam, congue in eros vel, pulvinar ultrices eros.
            Phasellus eget libero id enim suscipit commodo. Aliquam ultrices ex libero, eget scelerisque odio cursus nec. Donec sed metus nibh. Nulla facilisi. Vestibulum tortor augue, volutpat sed aliquet at, bibendum quis urna. Maecenas metus urna, posuere ac leo sit amet, ultrices pulvinar massa. Nulla urna neque, aliquam id gravida vel, sollicitudin auctor lacus. Donec semper dui ut dolor cursus elementum. Aliquam ultrices nunc sit amet turpis venenatis cursus. Etiam ligula lectus, mattis sed vestibulum ut, maximus sed neque. Integer ligula lectus, varius non nisi dapibus, rutrum semper mi.
            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09lpteste',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0060',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-27 11:10:15',
            'post_modified_gmt'=>'2023-10-11 08:51:27',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"65268a5fadc47\",\"status\":\"publicado\",\"total_horas\":\"12\",\"valor_r\":\"R$ 3.500,04\",\"incremento\":\"R$ 120,00\",\"valor_venda\":\"R$ 5.000,00\",\"termino\":\"2023-12-28\",\"hora_termino\":\"23:51\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'65268c120123b'
            ] );


            Post::create( [
            'ID'=>61,
            'post_author'=>1,
            'post_date'=>'2023-10-17 15:39:39',
            'post_date_gmt'=>'2023-10-17 15:39:39',
            'post_content'=>'
            tesde de descrição ção  aqui voce pode editar toda descrição do contrato

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.test admin',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.test-admin',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-11 10:42:30',
            'post_modified_gmt'=>'2023-10-17 15:39:39',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"47\",\"total_horas\":\"45\",\"valor_r\":\"R$ 4.008,00\",\"incremento\":\"R$ 120,00\",\"valor_venda\":\"R$ 6.000,00\",\"valor_atual\":\"R$ 1.500,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'652ed49db60a1'
            ] );


            Post::create( [
            'ID'=>62,
            'post_author'=>1,
            'post_date'=>'2023-10-17 15:40:20',
            'post_date_gmt'=>'2023-10-17 15:40:20',
            'post_content'=>'
            tesde de descrição ção

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.test admin',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0062',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-11-09 10:47:30',
            'post_modified_gmt'=>'2023-10-17 15:40:20',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"652ed49db60a1\",\"status\":\"publicado\",\"total_horas\":\"45\",\"valor_r\":\"R$ 4.008,00\",\"incremento\":\"R$ 120,00\",\"valor_venda\":\"R$ 6.000,00\",\"termino\":\"2023-11-22\",\"hora_termino\":\"12:00\",\"pode_lance\":\"6\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'652ed4f8c2f76'
            ] );


            Post::create( [
            'ID'=>63,
            'post_author'=>1,
            'post_date'=>'2023-10-19 19:50:10',
            'post_date_gmt'=>'2023-10-19 19:50:10',
            'post_content'=>'
            \r\n
            \r\n
            \r\n
            \r\n
            \r\n
            \r\n			\r\n
            Termos e Condições de Acesso ao Site do Aeroclube Juiz de Fora\r\n\r\n\r\n\r\n
            Ao acessar o site do Aeroclube Juiz de Fora, você concorda em cumprir os seguintes termos e condições:\r\n\r\n\r\n\r\n
            Uso do Conteúdo: O conteúdo disponível no site do Aeroclube Juiz de \r\nFora, incluindo textos, imagens, vídeos, documentos e outros materiais, é\r\n protegido por direitos autorais e propriedade intelectual. Esse \r\nconteúdo é fornecido exclusivamente para fins informativos e pessoais, \r\nnão sendo permitida sua reprodução, modificação, distribuição ou uso \r\ncomercial sem autorização prévia por escrito do Aeroclube Juiz de Fora.
            Responsabilidade pelo Uso: O acesso e uso do site do Aeroclube Juiz \r\nde Fora são de sua responsabilidade exclusiva. Você concorda em utilizar\r\n o site de acordo com as leis aplicáveis e em respeitar os direitos de \r\nterceiros. O Aeroclube Juiz de Fora não se responsabiliza por quaisquer \r\ndanos ou prejuízos decorrentes do uso inadequado, incorreto ou ilícito \r\ndo site.
            Precisão das Informações: O Aeroclube Juiz de Fora se esforça para \r\nfornecer informações precisas e atualizadas em seu site. No entanto, não\r\n garantimos a exatidão, completude ou atualidade dessas informações. O \r\nuso das informações disponíveis no site é de sua responsabilidade e você\r\n é encorajado a verificar a precisão das mesmas antes de tomar qualquer \r\ndecisão ou ação com base nelas.
            Links Externos: O site do Aeroclube Juiz de Fora pode conter links \r\npara sites de terceiros. Esses links são fornecidos apenas para \r\nconveniência e não implicam em qualquer endosso, aprovação ou \r\nresponsabilidade pelo conteúdo desses sites. Ao acessar esses links, \r\nvocê estará sujeito aos termos e condições de uso desses sites externos.
            Privacidade: Ao utilizar o site do Aeroclube Juiz de Fora, você \r\nconcorda com a Política de Privacidade do site, que descreve como suas \r\ninformações pessoais serão coletadas, armazenadas e utilizadas. \r\nRecomendamos que você leia atentamente a Política de Privacidade para \r\nentender como suas informações serão tratadas.
            Alterações nos Termos e Condições: O Aeroclube Juiz de Fora se \r\nreserva o direito de modificar ou atualizar estes Termos e Condições a \r\nqualquer momento, sem aviso prévio. Recomendamos que você revise \r\nperiodicamente esta página para estar ciente de quaisquer alterações.
            Jurisdição: Estes Termos e Condições serão regidos pelas leis do \r\nBrasil. Qualquer disputa decorrente ou relacionada a estes Termos e \r\nCondições será submetida à jurisdição exclusiva dos tribunais \r\ncompetentes do Brasil.
            \r\n\r\n\r\n\r\n
            Ao acessar e utilizar o site do Aeroclube Juiz de Fora, você \r\nreconhece ter lido, compreendido e concordado com estes Termos e \r\nCondições. Caso você não concorde com estes termos, recomendamos que não\r\n utilize o site.\r\n		\r\n				\r\n					\r\n		\r\n							\r\n		',
            'post_title'=>'Termos do site',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'termos-do-site',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-26 11:48:07',
            'post_modified_gmt'=>'2023-10-19 19:50:10',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'paginas',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'[]',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6531b274d2925'
            ] );


            Post::create( [
            'ID'=>64,
            'post_author'=>NULL,
            'post_date'=>'2023-10-19 19:50:10',
            'post_date_gmt'=>'2023-10-19 19:50:10',
            'post_content'=>NULL,
            'post_title'=>'Termos do site',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'63',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-19 19:50:10',
            'post_modified_gmt'=>'2023-10-19 19:50:10',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>5,
            'post_type'=>'menu',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6531b2a23764e'
            ] );

            Post::create( [
            'ID'=>65,
            'post_author'=>1,
            'post_date'=>'2023-10-20 14:36:06',
            'post_date_gmt'=>'2023-10-20 14:36:06',
            'post_content'=>'
            teste de conteduo

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.test20102023',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.test20102023',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-10-20 14:36:06',
            'post_modified_gmt'=>'2023-10-20 14:36:06',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"5\",\"total_horas\":\"15\",\"valor_r\":\"R$ 4.522,22\",\"incremento\":\"R$ 150,00\",\"valor_venda\":\"R$ 6.000,00\",\"valor_atual\":\"R$ 7.000,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6532ba38d5bfe'
            ] );


            Post::create( [
            'ID'=>66,
            'post_author'=>13,
            'post_date'=>'2023-10-21 12:57:46',
            'post_date_gmt'=>'2023-10-21 12:57:46',
            'post_content'=>'
            Teste de lorem impsem

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.09578',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0066',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-11-09 10:46:45',
            'post_modified_gmt'=>'2023-10-21 12:57:46',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"64df999965c51\",\"status\":\"publicado\",\"total_horas\":\"45\",\"valor_r\":\"R$ 2.050,00\",\"incremento\":\"R$ 125,00\",\"valor_venda\":\"R$ 3.000,00\",\"termino\":\"2023-11-24\",\"hora_termino\":\"12:57\",\"pode_lance\":\"6\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6533f4dfe3beb'
            ] );


            Post::create( [
            'ID'=>67,
            'post_author'=>1,
            'post_date'=>'2023-11-03 13:54:01',
            'post_date_gmt'=>'2023-11-03 13:54:01',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021.03/11/2023',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021.0311/2023',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-11-03 13:54:01',
            'post_modified_gmt'=>'2023-11-03 13:54:01',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"4\",\"total_horas\":\"10\",\"valor_r\":\"R$ 5.600,40\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 6.000,00\",\"valor_atual\":\"R$ 15.200,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6545257e2e7ed'
            ] );

            Post::create( [
            'ID'=>72,
            'post_author'=>0,
            'post_date'=>'2023-12-06 18:42:10',
            'post_date_gmt'=>'2023-12-06 18:42:10',
            'post_content'=>'Contrato adicionado pelo CRM ',
            'post_title'=>'Repasse do contrato 5550.12.2023',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-5550122023',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-29 12:58:21',
            'post_modified_gmt'=>'2023-12-06 18:42:10',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":52,\"total_horas\":\"10\",\"valor_r\":\"18.000,00\",\"valor_venda\":\"20.000,00\",\"valor_atual\":\"21.000,00\",\"incremento\":\"101,30\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6529b82a8aa6a'
            ] );

            Post::create( [
            'ID'=>73,
            'post_author'=>52,
            'post_date'=>'2023-12-07 18:10:27',
            'post_date_gmt'=>'2023-12-07 18:10:27',
            'post_content'=>'Contrato adicionado pelo CRM',
            'post_title'=>'Repasse do contrato 5550.12.2023',
            'post_excerpt'=>NULL,
            'post_status'=>'trash',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0073',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-29 12:52:07',
            'post_modified_gmt'=>'2023-12-07 18:10:27',
            'post_content_filtered'=>NULL,
            'post_parent'=>10,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"6529b82a8aa6a\",\"status\":\"publicado\",\"total_horas\":\"10\",\"valor_r\":\"R$18.000,00\",\"incremento\":\"R$101,30\",\"valor_venda\":\"R$20.000,00\",\"termino\":\"2023-12-27\",\"hora_termino\":\"20:00\",\"pode_lance\":\"6\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6572349c720bf'
            ] );

            Post::create( [
            'ID'=>74,
            'post_author'=>1,
            'post_date'=>'2023-12-21 13:09:37',
            'post_date_gmt'=>'2023-12-21 13:09:37',
            'post_content'=>'
            Este contrato agora esta vencido e esta na promoção

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021 xy',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021-xy',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-21 13:09:37',
            'post_modified_gmt'=>'2023-12-21 13:09:37',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"37\",\"total_horas\":\"14\",\"valor_r\":\"R$ 4.522,00\",\"incremento\":\"R$ 522,23\",\"valor_venda\":\"R$ 5.000,00\",\"valor_atual\":\"R$ 1.470,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6584630cd4c89'
            ] );


            Post::create( [
            'ID'=>75,
            'post_author'=>1,
            'post_date'=>'2023-12-21 13:12:12',
            'post_date_gmt'=>'2023-12-21 13:12:12',
            'post_content'=>'
            este contrato agora vai indo bem

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021 784',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021-784',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-21 13:12:12',
            'post_modified_gmt'=>'2023-12-21 13:12:12',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"37\",\"total_horas\":\"56\",\"valor_r\":\"R$ 2.000,01\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 3.000,00\",\"valor_atual\":\"R$ 5.200,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6584638067a18'
            ] );


            Post::create( [
            'ID'=>76,
            'post_author'=>1,
            'post_date'=>'2023-12-21 13:12:34',
            'post_date_gmt'=>'2023-12-21 13:12:34',
            'post_content'=>'
            este contrato agora vai indo bem

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021 784',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021-784',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-21 13:12:34',
            'post_modified_gmt'=>'2023-12-21 13:12:34',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"37\",\"total_horas\":\"56\",\"valor_r\":\"R$ 2.000,01\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 3.000,00\",\"valor_atual\":\"R$ 5.200,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6584638067a18'
            ] );


            Post::create( [
            'ID'=>77,
            'post_author'=>1,
            'post_date'=>'2023-12-21 13:23:23',
            'post_date_gmt'=>'2023-12-21 13:23:23',
            'post_content'=>NULL,
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-cps.acjf.adm.2021',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-21 13:23:23',
            'post_modified_gmt'=>'2023-12-21 13:23:23',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"37\",\"total_horas\":\"10\",\"valor_r\":\"R$ 2.111,00\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 10.000,00\",\"valor_atual\":\"R$ 50.000,00\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6584666673b18'
            ] );

            Post::create( [
            'ID'=>78,
            'post_author'=>37,
            'post_date'=>'2023-12-21 14:17:35',
            'post_date_gmt'=>'2023-12-21 14:17:35',
            'post_content'=>'
            Este contrato agora esta vencido e esta na promoção

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021 xy',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0078',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2024-01-09 16:00:37',
            'post_modified_gmt'=>'2023-12-21 14:17:35',
            'post_content_filtered'=>NULL,
            'post_parent'=>91,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"6584630cd4c89\",\"status\":\"publicado\",\"total_horas\":\"14\",\"valor_r\":\"R$ 4.522,00\",\"incremento\":\"R$ 522,23\",\"valor_venda\":\"R$ 5.000,00\",\"termino\":\"2024-01-13\",\"hora_termino\":\"12:02\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'658473116276e'
            ] );


            Post::create( [
            'ID'=>79,
            'post_author'=>1,
            'post_date'=>'2023-12-21 17:29:19',
            'post_date_gmt'=>'2023-12-21 17:29:19',
            'post_content'=>'
            Agora mesmo estou fazendo um novo teste ja

            ',
            'post_title'=>'Repasse do Contrato 2023.05.11',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'repasse-do-contrato-2023.05.11',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2023-12-21 17:29:19',
            'post_modified_gmt'=>'2023-12-21 17:29:19',
            'post_content_filtered'=>NULL,
            'post_parent'=>NULL,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'produtos',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"cliente\":\"37\",\"total_horas\":\"10\",\"valor_r\":\"R$ 4.500,00\",\"incremento\":\"R$ 130,00\",\"valor_venda\":\"R$ 6.500,00\",\"valor_atual\":\"R$ 42,51\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'65849fcc9312d'
            ] );


            Post::create( [
            'ID'=>80,
            'post_author'=>37,
            'post_date'=>'2023-12-21 17:45:02',
            'post_date_gmt'=>'2023-12-21 17:45:02',
            'post_content'=>'
            Agora mesmo estou fazendo um novo teste ja

            ',
            'post_title'=>'Repasse do Contrato 2023.05.11',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0080',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2024-01-09 16:00:19',
            'post_modified_gmt'=>'2023-12-21 17:45:02',
            'post_content_filtered'=>NULL,
            'post_parent'=>91,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"65849fcc9312d\",\"status\":\"publicado\",\"total_horas\":\"10\",\"valor_r\":\"R$ 4.500,00\",\"incremento\":\"R$ 130,00\",\"valor_venda\":\"R$ 6.500,00\",\"termino\":\"2024-01-15\",\"hora_termino\":\"12:04\",\"pode_lance\":\"7\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6584a3b6bcd08'
            ] );


            Post::create( [
            'ID'=>81,
            'post_author'=>37,
            'post_date'=>'2023-12-21 18:16:53',
            'post_date_gmt'=>'2023-12-21 18:16:53',
            'post_content'=>'
            este contrato agora vai indo bem

            ',
            'post_title'=>'Repasse do Contrato CPS.ACJF.ADM.2021 784',
            'post_excerpt'=>NULL,
            'post_status'=>'publish',
            'comment_status'=>NULL,
            'ping_status'=>NULL,
            'post_password'=>NULL,
            'post_name'=>'leilao-0081',
            'to_ping'=>NULL,
            'pinged'=>NULL,
            'post_modified'=>'2024-01-09 16:00:07',
            'post_modified_gmt'=>'2023-12-21 18:16:53',
            'post_content_filtered'=>NULL,
            'post_parent'=>91,
            'guid'=>NULL,
            'menu_order'=>NULL,
            'post_type'=>'leiloes_adm',
            'post_mime_type'=>NULL,
            'comment_count'=>NULL,
            'config'=>'{\"origem\":\"leiloes_adm.edit\",\"contrato\":\"6584638067a18\",\"status\":\"publicado\",\"total_horas\":\"56\",\"valor_r\":\"R$ 2.000,01\",\"incremento\":\"R$ 100,00\",\"valor_venda\":\"R$ 3.000,00\",\"termino\":\"2024-01-11\",\"hora_termino\":\"04:50\",\"pode_lance\":\"8\"}',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'token'=>'6584ab25a5adb'
            ] );

    }
}
