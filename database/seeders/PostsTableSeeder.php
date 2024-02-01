<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'ID' => 1,
                'post_author' => 1,
                'post_date' => '2023-07-03 18:47:50',
                'post_date_gmt' => '2023-07-03 18:47:50',
                'post_content' => '<p>Isto é o conteudo da página home<br></p>',
                'post_title' => 'home',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'home',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 14:00:44',
                'post_modified_gmt' => '2023-07-03 18:47:50',
                'post_content_filtered' => NULL,
                'post_parent' => 8,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"principal"}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a341f536abf',
            ),
            1 => 
            array (
                'ID' => 2,
                'post_author' => 1,
                'post_date' => '2023-07-04 08:56:51',
                'post_date_gmt' => '2023-07-04 08:56:51',
                'post_content' => '[sc ac="form_leilao"]
',
                'post_title' => 'leilão create',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'leilao-create',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 14:01:48',
                'post_modified_gmt' => '2023-07-04 08:56:51',
                'post_content_filtered' => NULL,
                'post_parent' => 8,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a408ed8c6c5',
            ),
            2 => 
            array (
                'ID' => 3,
                'post_author' => 1,
                'post_date' => '2023-08-01 16:47:19',
                'post_date_gmt' => '2023-08-01 16:47:19',
                'post_content' => '[sc ac="list_lance_user"]',
                'post_title' => 'Lances',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'lances-list',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 15:24:42',
                'post_modified_gmt' => '2023-07-06 16:47:19',
                'post_content_filtered' => NULL,
                'post_parent' => 8,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a719e8e3f01',
            ),
            3 => 
            array (
                'ID' => 4,
                'post_author' => 1,
                'post_date' => '2024-01-12 15:36:09',
                'post_date_gmt' => '2024-01-12 15:36:09',
                'post_content' => '<section class="bg-light">
<div class="container py-5">
<div class="row">
<div class="col-12 col-lg-6 py-5 text-center text-lg-start">
<h2>Passo 01</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pharetra tincidunt magna, et sagittis neque dignissim non. Mauris felis ligula, molestie et facilisis vitae, egestas ut metus.</p>
</div>
<div class="col-12 col-lg-6">
<a class="venobox youtube-video vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=BZAN-i_o8nA&amp;t=5s">
<i class="fa fa-play"></i>
<div class="youtube-video-overlay rounded"></div>
<img class="rounded" src="https://leilao.aeroclubejf.com.br/images/leilao-aeroclube-de-juiz-de-fora.jpg" alt="">
</a>
</div>
</div>
</div>
</section>
<section class="theme-bg-primary">
<div class="container py-5">
<div class="row">
<div class="order-1 order-lg-0 col-12 col-lg-6">
<a class="venobox youtube-video vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=BZAN-i_o8nA&amp;t=5s">
<i class="fa fa-play"></i>
<div class="youtube-video-overlay rounded"></div>
<img class="rounded" src="https://leilao.aeroclubejf.com.br/images/leilao-aeroclube-de-juiz-de-fora.jpg" alt="">
</a>
</div>
<div class="order-0 order-lg-1 col-12 col-lg-6 py-5 text-light text-center text-lg-start">
<h2>Passo 02</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pharetra tincidunt magna, et sagittis neque dignissim non. Mauris felis ligula, molestie et facilisis vitae, egestas ut metus.</p>
</div>
</div>
</div>
</section>
<section class="bg-light">
<div class="container py-5">
<div class="row">
<div class="col-12 col-lg-6 py-5 text-center text-lg-start">
<h2>Passo 03</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pharetra tincidunt magna, et sagittis neque dignissim non. Mauris felis ligula, molestie et facilisis vitae, egestas ut metus.</p>
</div>
<div class="col-12 col-lg-6">
<a class="venobox youtube-video vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=BZAN-i_o8nA&amp;t=5s">
<i class="fa fa-play"></i>
<div class="youtube-video-overlay rounded"></div>
<img class="rounded" src="https://leilao.aeroclubejf.com.br/images/leilao-aeroclube-de-juiz-de-fora.jpg" alt="">
</a>
</div>
</div>
</div>
</section>',
                'post_title' => 'Entenda como funciona',
                'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu feugiat elit. Duis dapibus lorem nec nisi feugiat consequat. Aenean ac eros ut tortor consectetur pharetra. Vivamus luctus sit amet elit id imperdiet.',
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'entenda-como-funciona',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 16:17:49',
                'post_modified_gmt' => '2024-01-12 15:36:09',
                'post_content_filtered' => NULL,
                'post_parent' => 95,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"html"}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '65a185f19695e',
            ),
            4 => 
            array (
                'ID' => 5,
                'post_author' => 1,
                'post_date' => '2023-09-29 16:47:19',
                'post_date_gmt' => '2023-09-29 16:47:19',
                'post_content' => '[sc ac="agradecimento"]
',
                'post_title' => 'Agradecimento',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'obrigado-pela-compra',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 15:13:58',
                'post_modified_gmt' => '2023-07-06 16:47:19',
                'post_content_filtered' => NULL,
                'post_parent' => 8,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a719e8e3d87',
            ),
            5 => 
            array (
                'ID' => 7,
                'post_author' => 1,
                'post_date' => '2023-07-06 00:00:00',
                'post_date_gmt' => '2023-07-06 09:47:25',
                'post_content' => NULL,
                'post_title' => NULL,
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'Banner_home.jpg',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2023-07-06 09:47:25',
                'post_modified_gmt' => '2023-07-06 09:47:25',
                'post_content_filtered' => NULL,
                'post_parent' => NULL,
                'guid' => 'media/2023/07/Banner_home.jpg',
                'menu_order' => NULL,
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg',
                'comment_count' => NULL,
                'config' => '"{\\"extenssao\\":\\"jpg\\"}"',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => NULL,
            ),
            6 => 
            array (
                'ID' => 8,
                'post_author' => 1,
                'post_date' => '2023-07-06 00:00:00',
                'post_date_gmt' => '2023-07-06 09:51:36',
                'post_content' => NULL,
                'post_title' => NULL,
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'AVIÃO-DECOLANDO.jpg',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2023-07-06 09:51:36',
                'post_modified_gmt' => '2023-07-06 09:51:36',
                'post_content_filtered' => NULL,
                'post_parent' => NULL,
                'guid' => 'media/2023/07/AVIÃO-DECOLANDO.jpg',
                'menu_order' => NULL,
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg',
                'comment_count' => NULL,
                'config' => '"{\\"extenssao\\":\\"jpg\\"}"',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => NULL,
            ),
            7 => 
            array (
                'ID' => 9,
                'post_author' => 1,
                'post_date' => '2023-08-01 16:47:19',
                'post_date_gmt' => '2023-08-01 16:47:19',
                'post_content' => '[sc ac="payment"]',
                'post_title' => 'Pagamentos',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'payment',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-02-01 11:13:50',
                'post_modified_gmt' => '2023-07-06 16:47:19',
                'post_content_filtered' => NULL,
                'post_parent' => 8,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a719e8e3d03',
            ),
            8 => 
            array (
                'ID' => 10,
                'post_author' => 1,
                'post_date' => '2023-10-19 19:50:10',
                'post_date_gmt' => '2023-10-19 19:50:10',
                'post_content' => '<section class="elementor-section elementor-top-section elementor-element elementor-element-ce68779 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ce68779" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4c17c50" data-id="4c17c50" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-b988fbc elementor-widget elementor-widget-theme-post-content" data-id="b988fbc" data-element_type="widget" data-widget_type="theme-post-content.default">
<div class="elementor-widget-container">

<p>Termos e Condições de Acesso ao Site do Aeroclube Juiz de Fora</p>



<p>Ao acessar o site do Aeroclube Juiz de Fora, você concorda em cumprir os seguintes termos e condições:</p>



<ol><li>Uso do Conteúdo: O conteúdo disponível no site do Aeroclube Juiz de 
Fora, incluindo textos, imagens, vídeos, documentos e outros materiais, é
protegido por direitos autorais e propriedade intelectual. Esse 
conteúdo é fornecido exclusivamente para fins informativos e pessoais, 
não sendo permitida sua reprodução, modificação, distribuição ou uso 
comercial sem autorização prévia por escrito do Aeroclube Juiz de Fora.</li><li>Responsabilidade pelo Uso: O acesso e uso do site do Aeroclube Juiz 
de Fora são de sua responsabilidade exclusiva. Você concorda em utilizar
o site de acordo com as leis aplicáveis e em respeitar os direitos de 
terceiros. O Aeroclube Juiz de Fora não se responsabiliza por quaisquer 
danos ou prejuízos decorrentes do uso inadequado, incorreto ou ilícito 
do site.</li><li>Precisão das Informações: O Aeroclube Juiz de Fora se esforça para 
fornecer informações precisas e atualizadas em seu site. No entanto, não
garantimos a exatidão, completude ou atualidade dessas informações. O 
uso das informações disponíveis no site é de sua responsabilidade e você
é encorajado a verificar a precisão das mesmas antes de tomar qualquer 
decisão ou ação com base nelas.</li><li>Links Externos: O site do Aeroclube Juiz de Fora pode conter links 
para sites de terceiros. Esses links são fornecidos apenas para 
conveniência e não implicam em qualquer endosso, aprovação ou 
responsabilidade pelo conteúdo desses sites. Ao acessar esses links, 
você estará sujeito aos termos e condições de uso desses sites externos.</li><li>Privacidade: Ao utilizar o site do Aeroclube Juiz de Fora, você 
concorda com a Política de Privacidade do site, que descreve como suas 
informações pessoais serão coletadas, armazenadas e utilizadas. 
Recomendamos que você leia atentamente a Política de Privacidade para 
entender como suas informações serão tratadas.</li><li>Alterações nos Termos e Condições: O Aeroclube Juiz de Fora se 
reserva o direito de modificar ou atualizar estes Termos e Condições a 
qualquer momento, sem aviso prévio. Recomendamos que você revise 
periodicamente esta página para estar ciente de quaisquer alterações.</li><li>Jurisdição: Estes Termos e Condições serão regidos pelas leis do 
Brasil. Qualquer disputa decorrente ou relacionada a estes Termos e 
Condições será submetida à jurisdição exclusiva dos tribunais 
competentes do Brasil.</li></ol>



<p>Ao acessar e utilizar o site do Aeroclube Juiz de Fora, você 
reconhece ter lido, compreendido e concordado com estes Termos e 
Condições. Caso você não concorde com estes termos, recomendamos que não
utilize o site.</p>
</div>
</div>
</div>
</div>
</div>
</section>',
                'post_title' => 'Termos do site',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'termos-do-site',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 15:25:22',
                'post_modified_gmt' => '2023-10-19 19:50:10',
                'post_content_filtered' => NULL,
                'post_parent' => 10,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria"}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '6531b274d2925',
            ),
            9 => 
            array (
                'ID' => 11,
                'post_author' => 1,
                'post_date' => '2023-11-10 13:52:44',
                'post_date_gmt' => '2023-11-10 13:52:44',
                'post_content' => '[sc ac="leilao_list_seguindo"]',
                'post_title' => 'Leilões que você segue',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'seguindo',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 15:54:07',
                'post_modified_gmt' => '2023-11-10 13:52:44',
                'post_content_filtered' => NULL,
                'post_parent' => 8,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","4","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '654e5fc344a55',
            ),
            10 => 
            array (
                'ID' => 12,
                'post_author' => 1,
                'post_date' => '2023-07-06 16:47:19',
                'post_date_gmt' => '2023-07-06 16:47:19',
                'post_content' => '[sc ac="list_leilao"]',
                'post_title' => 'Leilão list',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'leilao-list',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-02-01 13:43:34',
                'post_modified_gmt' => '2023-07-06 16:47:19',
                'post_content_filtered' => NULL,
                'post_parent' => 95,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a719e8e3d00',
            ),
            11 => 
            array (
                'ID' => 13,
                'post_author' => 1,
                'post_date' => '2023-07-07 17:41:28',
                'post_date_gmt' => '2023-07-07 17:41:28',
                'post_content' => '[sc ac="form_leilao"]',
                'post_title' => 'Leilão edit',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'leilao-edit',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-02-01 13:43:49',
                'post_modified_gmt' => '2023-07-07 17:41:28',
                'post_content_filtered' => NULL,
                'post_parent' => 94,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a8785e33dec',
            ),
            12 => 
            array (
                'ID' => 14,
                'post_author' => 1,
                'post_date' => '2023-07-07 17:41:28',
                'post_date_gmt' => '2023-07-07 17:41:28',
                'post_content' => '[sc ac="form_meu_cadastro"]',
                'post_title' => 'Meu cadastro',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'meu-cadastro',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-12 15:30:29',
                'post_modified_gmt' => '2023-07-07 17:41:28',
                'post_content_filtered' => NULL,
                'post_parent' => 95,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria","permission":["1","2","3","5"]}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a8785e34d2g',
            ),
            13 => 
            array (
                'ID' => 15,
                'post_author' => 1,
                'post_date' => '2023-09-20 16:47:19',
                'post_date_gmt' => '2023-09-20 16:47:19',
                'post_content' => '[sc ac="ger_user"]',
                'post_title' => 'Cadastrar usuário',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'user',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2023-09-20 07:01:48',
                'post_modified_gmt' => '2023-07-06 16:47:19',
                'post_content_filtered' => NULL,
                'post_parent' => 3,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '[]',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64a719e8e4d10',
            ),
            14 => 
            array (
                'ID' => 18,
                'post_author' => 1,
                'post_date' => '2024-02-01 11:19:20',
                'post_date_gmt' => '2024-02-01 11:19:20',
                'post_content' => '[sc ac="form_contato"]',
                'post_title' => 'Contato',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'contato',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-02-01 11:21:19',
                'post_modified_gmt' => '2024-02-01 11:19:20',
                'post_content_filtered' => NULL,
                'post_parent' => 94,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria"}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '65bba75e079cc',
            ),
            15 => 
            array (
                'ID' => 37,
                'post_author' => 1,
                'post_date' => '2023-07-13 19:58:56',
                'post_date_gmt' => '2023-07-13 19:58:56',
                'post_content' => '[sc ac="leiloes_publicos"]',
                'post_title' => 'Leiloes publicos',
                'post_excerpt' => 'descrição curta da página Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu ornare risus. Phasellus sed dolor mi. Donec laoreet convallis diam sed luctus.',
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'leiloes-publicos',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-02-01 17:55:13',
                'post_modified_gmt' => '2023-07-13 19:58:56',
                'post_content_filtered' => NULL,
                'post_parent' => 42,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"leiloes_publicos"}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '64b08191e1f58',
            ),
            16 => 
            array (
                'ID' => 40,
                'post_author' => 1,
                'post_date' => '2024-01-09 00:00:00',
                'post_date_gmt' => '2024-01-09 13:45:31',
                'post_content' => NULL,
                'post_title' => NULL,
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'contrato.jpg',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-09 13:45:31',
                'post_modified_gmt' => '2024-01-09 13:45:31',
                'post_content_filtered' => NULL,
                'post_parent' => NULL,
                'guid' => 'media/2024/01/contrato.jpg',
                'menu_order' => NULL,
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg',
                'comment_count' => NULL,
                'config' => '"{\\"extenssao\\":\\"jpg\\"}"',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => NULL,
            ),
            17 => 
            array (
                'ID' => 42,
                'post_author' => 1,
                'post_date' => '2024-01-10 00:00:00',
                'post_date_gmt' => '2024-01-10 11:48:58',
                'post_content' => NULL,
                'post_title' => NULL,
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'leilao-aeroclube-de-juiz-de-fora.jpg',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-10 11:48:58',
                'post_modified_gmt' => '2024-01-10 11:48:58',
                'post_content_filtered' => NULL,
                'post_parent' => NULL,
                'guid' => 'media/2024/01/leilao-aeroclube-de-juiz-de-fora.jpg',
                'menu_order' => NULL,
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg',
                'comment_count' => NULL,
                'config' => '"{\\"extenssao\\":\\"jpg\\"}"',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => NULL,
            ),
            18 => 
            array (
                'ID' => 43,
                'post_author' => 1,
                'post_date' => '2024-01-10 00:00:00',
                'post_date_gmt' => '2024-01-10 11:51:39',
                'post_content' => NULL,
                'post_title' => NULL,
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'leilao-aeroclube-de-juiz-de-fora.jpg',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2024-01-10 11:51:39',
                'post_modified_gmt' => '2024-01-10 11:51:39',
                'post_content_filtered' => NULL,
                'post_parent' => NULL,
                'guid' => 'media/2024/01/leilao-aeroclube-de-juiz-de-fora.jpg',
                'menu_order' => NULL,
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg',
                'comment_count' => NULL,
                'config' => '"{\\"extenssao\\":\\"jpg\\"}"',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => NULL,
            ),
        ));
        
        
    }
}