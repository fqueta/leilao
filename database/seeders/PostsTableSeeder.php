<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('postmeta')->truncate();
        DB::table('posts')->truncate();

        DB::table('posts')->insert(array (
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
<h2>Passo 01: Cadastro no Site<br></h2>
<p><b>Como:</b> Acesse o site de leilões de horas de voo e clique no botão de "Cadastro". Preencha o formulário com suas informações pessoais, como nome, e-mail e número de telefone. Verifique se todas as informações estão corretas para evitar problemas futuros com lances ou reservas.
</p>
<b>Por que:</b> O cadastro é necessário para criar um perfil pessoal no site, o que permite participar dos leilões. Essa etapa garante que apenas usuários verificados possam dar lances, aumentando a segurança e a confiabilidade do processo.

<p>
</p>
</div>
<div class="col-12 col-lg-6 pt-2">
<iframe width="100%" height="350" src="https://www.youtube.com/embed/8L7dp9FX8fk?si=ZtxrNQpd2MKPBkF_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
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
<h2>Passo 02: Explorando os Leilões Disponíveis</h2>
<p><b>Como:</b> Após o login, navegue pela seção de leilões ativos no site. Você pode filtrar os leilões por tipo de aeronave, localização do aeroclube, e faixas de horário disponíveis. Leia atentamente as descrições e as condições de cada leilão.
</p>
<p>
<b>Por que:</b> Explorar os leilões disponíveis permite que você encontre as melhores oportunidades conforme suas necessidades de treinamento ou preferências pessoais. Entender as condições do leilão ajuda a evitar surpresas no futuro, como taxas adicionais ou restrições de uso.

</p>
</div>
</div>
</div>
</section>
<section class="bg-light">
<div class="container py-5">
<div class="row">
<div class="col-12 col-lg-6 py-5 text-center text-lg-start">
<h2>Passo 03: Participando de um Leilão</h2>
<p><b>Como:</b> Escolha um leilão que atenda às suas necessidades e clique em "Dar Lance". Você precisará inserir o valor que está disposto a pagar pela hora de voo. Acompanhe o leilão até o fim para ver se seu lance é o mais alto e, consequentemente, se você é o vencedor.
</p>
<p>
<b>Por que:</b> Participar dos leilões pode oferecer horas de voo a preços mais acessíveis do que as tarifas regulares. Dar um lance permite que você negocie diretamente o preço que está disposto a pagar, baseando-se no mercado e na disponibilidade, o que pode resultar em economia significativa.

</p>
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
                'post_excerpt' => 'O leilão de horas de voo do Aeroclube de Juiz de Fora é uma oportunidade exclusiva para alunos e pilotos adquirirem horas de voo diretamente de outros alunos que solicitaram rescisão de seus contratos. Este sistema permite que as horas previamente contratadas sejam revendidas de maneira transparente e acessível.',
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
<div class="elementor-widget-container"><p data-start="263" data-end="471" class="">Estes Termos e Condições Gerais regulam o uso da plataforma de leilão de horas de voo, mantida pelo <strong data-start="363" data-end="392">Aeroclube de Juiz de Fora</strong>, com sede em Juiz de Fora/MG, doravante denominada simplesmente <strong data-start="457" data-end="470">AEROCLUBE</strong>.</p><h6>1. OBJETIVO DA PLATAFORMA</h6><p data-start="503" data-end="534" class="">A plataforma tem como objetivo:</p><ul data-start="536" data-end="899">
<li data-start="536" data-end="631" class="">
<p data-start="538" data-end="631" class="">Disponibilizar pacotes de horas de voo remanescentes de <strong data-start="594" data-end="630">contratos rescindidos por alunos</strong>;</p>
</li>
<li data-start="632" data-end="748" class="">
<p data-start="634" data-end="748" class="">Permitir que <strong data-start="647" data-end="666">sócios cotistas</strong> do Aeroclube ofereçam ao mercado interno horas de voo que não pretendem utilizar;</p>
</li>
<li data-start="749" data-end="899" class="">
<p data-start="751" data-end="899" class="">Viabilizar que <strong data-start="766" data-end="791">usuários interessados</strong> disputem esses pacotes por meio de <strong data-start="827" data-end="844">lances online</strong>, respeitando regras de transparência, prazo e conduta.</p>
</li>
</ul><h6>2. DEFINIÇÕES</h6><ul data-start="919" data-end="1380">
<li data-start="919" data-end="1007" class="">
<p data-start="921" data-end="1007" class=""><strong data-start="921" data-end="933">USUÁRIOS</strong>: pessoas físicas, maiores de 18 anos, devidamente cadastradas no sistema.</p>
</li>
<li data-start="1008" data-end="1108" class="">
<p data-start="1010" data-end="1108" class=""><strong data-start="1010" data-end="1024">VENDEDORES</strong>: ex-alunos com saldo de horas remanescente ou sócios cotistas ofertando suas horas.</p>
</li>
<li data-start="1109" data-end="1190" class="">
<p data-start="1111" data-end="1190" class=""><strong data-start="1111" data-end="1126">COMPRADORES</strong>: usuários interessados em adquirir pacotes de horas via leilão.</p>
</li>
<li data-start="1191" data-end="1269" class="">
<p data-start="1193" data-end="1269" class=""><strong data-start="1193" data-end="1203">LEILÃO</strong>: processo competitivo em que usuários disputam pacotes ofertados.</p>
</li>
<li data-start="1270" data-end="1380" class="">
<p data-start="1272" data-end="1380" class=""><strong data-start="1272" data-end="1290">SALDO DE HORAS</strong>: quantidade de horas de voo disponíveis para venda, previamente validadas pelo Aeroclube.</p>
</li>
</ul><h6>3. CADASTRO</h6><p data-start="1398" data-end="1570" class="">3.1. Para participar, o usuário deverá realizar um cadastro completo, com CPF válido, e-mail, telefone, endereço e, quando solicitado, documentos adicionais para validação.</p><p data-start="1572" data-end="1765" class="">3.2. O Aeroclube reserva-se o direito de aprovar, recusar ou cancelar cadastros a qualquer momento, especialmente em casos de informações falsas, inadimplência ou quebra das regras deste Termo.</p><p data-start="1767" data-end="1824" class="">3.3. Cada usuário poderá manter apenas um cadastro ativo.</p><h6>4. FUNCIONAMENTO DO LEILÃO</h6><p data-start="1857" data-end="1900" class="">4.1. Os pacotes serão disponibilizados com:</p><ul data-start="1902" data-end="2024">
<li data-start="1902" data-end="1933" class="">
<p data-start="1904" data-end="1933" class="">Descrição do número de horas;</p>
</li>
<li data-start="1934" data-end="1959" class="">
<p data-start="1936" data-end="1959" class="">Valor inicial do lance;</p>
</li>
<li data-start="1960" data-end="1989" class="">
<p data-start="1962" data-end="1989" class="">Tempo de duração do leilão;</p>
</li>
<li data-start="1990" data-end="2024" class="">
<p data-start="1992" data-end="2024" class="">Regras específicas de pagamento.</p>
</li>
</ul><p data-start="2026" data-end="2147" class="">4.2. Os lances são vinculativos. Ao ofertar um lance, o comprador se compromete a adquirir o pacote caso seja o vencedor.</p><p data-start="2149" data-end="2308" class="">4.3. Caso o vencedor desista ou não efetue o pagamento no prazo, poderá ser penalizado com suspensão do acesso por tempo determinado ou exclusão da plataforma.</p><p data-start="2310" data-end="2457" class="">4.4. O Aeroclube não garante o uso imediato das horas adquiridas. A utilização depende da disponibilidade operacional da frota e da agenda de voos.</p><h6>5. PAGAMENTO E TRANSFERÊNCIA</h6><p data-start="2492" data-end="2631" class="">5.1. O pagamento será realizado via plataforma integrada e homologada pelo Aeroclube, com as taxas e prazos descritos no momento da compra.</p><p data-start="2633" data-end="2799" class="">5.2. Após a confirmação do pagamento, o saldo de horas será transferido ao comprador no sistema interno do Aeroclube, com validade e regras previamente estabelecidas.</p><p data-start="2801" data-end="2863" class="">5.3. Não serão aceitas formas de pagamento fora da plataforma.</p><h6>6. CANCELAMENTO E ESTORNO</h6><p data-start="2895" data-end="3070" class="">6.1. Por se tratar de leilão com lances ativos e saldo limitado, não há direito ao arrependimento após a confirmação da compra, salvo por erro comprovado do sistema ou fraude.</p><p data-start="3072" data-end="3160" class="">6.2. Estornos serão realizados apenas mediante análise interna e validação do Aeroclube.</p><h6>7. RESPONSABILIDADE DAS PARTES</h6><p data-start="3197" data-end="3397" class="">7.1. O Aeroclube atua como <strong data-start="3224" data-end="3255">intermediador da negociação</strong> entre quem oferta e quem compra as horas, sem responsabilidade sobre a origem dos créditos disponibilizados, desde que validados previamente.</p><p data-start="3399" data-end="3443" class="">7.2. O vendedor declara estar ciente de que:</p><ul data-start="3445" data-end="3560">
<li data-start="3445" data-end="3500" class="">
<p data-start="3447" data-end="3500" class="">Horas ofertadas serão removidas de seu saldo pessoal;</p>
</li>
<li data-start="3501" data-end="3560" class="">
<p data-start="3503" data-end="3560" class="">Após a venda, não poderá solicitar reversão ou reembolso.</p>
</li>
</ul><p data-start="3562" data-end="3591" class="">7.3. O comprador entende que:</p><ul data-start="3593" data-end="3728">
<li data-start="3593" data-end="3673" class="">
<p data-start="3595" data-end="3673" class="">A utilização das horas seguirá regras operacionais e agendamento do Aeroclube;</p>
</li>
<li data-start="3674" data-end="3728" class="">
<p data-start="3676" data-end="3728" class="">As horas adquiridas são intransferíveis a terceiros.</p>
</li>
</ul><h6>8. CONDUTA E PENALIDADES</h6><p data-start="3759" data-end="3781" class="">É vedado aos usuários:</p><ul data-start="3783" data-end="3924">
<li data-start="3783" data-end="3816" class="">
<p data-start="3785" data-end="3816" class="">Manipular resultados de leilão;</p>
</li>
<li data-start="3817" data-end="3839" class="">
<p data-start="3819" data-end="3839" class="">Criar contas falsas;</p>
</li>
<li data-start="3840" data-end="3879" class="">
<p data-start="3842" data-end="3879" class="">Publicar ou enviar conteúdo ofensivo;</p>
</li>
<li data-start="3880" data-end="3924" class="">
<p data-start="3882" data-end="3924" class="">Realizar lances sem intenção de pagamento.</p>
</li>
</ul><p data-start="3926" data-end="4063" class="">O descumprimento destas regras poderá resultar em bloqueio da conta, perda do acesso ao sistema e, nos casos mais graves, medidas legais.</p><h6>9. PROPRIEDADE INTELECTUAL</h6><p data-start="4096" data-end="4281" class="">Todo o conteúdo da plataforma, incluindo layout, sistema de leilão, regras e funcionalidades são propriedade do Aeroclube de Juiz de Fora. É vedada a cópia ou reprodução não autorizada.</p><h6>10. DISPOSIÇÕES FINAIS</h6><p>
</p><ul data-start="4310" data-end="4566">
<li data-start="4310" data-end="4393" class="">
<p data-start="4312" data-end="4393" class="">O Aeroclube pode alterar este termo a qualquer momento, com aviso prévio no site;</p>
</li>
<li data-start="4394" data-end="4474" class="">
<p data-start="4396" data-end="4474" class="">O uso contínuo da plataforma representa a concordância com os termos vigentes;</p>
</li>
<li data-start="4475" data-end="4566" class="">
<p data-start="4477" data-end="4566" class="">O foro competente para dirimir eventuais controvérsias é o da comarca de Juiz de Fora/MG.</p></li></ul>
</div>
</div>
</div>
</div>
</div>
</section>',
                'post_title' => 'TERMOS E CONDIÇÕES DE USO DO SISTEMA DE LEILÃO DE HORAS DE VOO',
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
                'post_title' => 'Bem-vindo ao Leilão de Horas de Voo!',
                'post_excerpt' => 'No nosso site, transformamos a experiência de voo em algo exclusivo e acessível. Aqui, você tem a oportunidade única de participar de leilões emocionantes e garantir horas de voo com descontos incríveis.',
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
            19 =>
            array (
                'ID' => 19,
                'post_author' => 1,
                'post_date' => '2025-04-05 11:39:50',
                'post_date_gmt' => '2025-04-05 11:39:50',
                'post_content' => '<h4 style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);">1. Coleta de Dados</h4><p data-start="281" data-end="328" class="">Ao se cadastrar em nossa plataforma, coletamos:</p><ul data-start="329" data-end="479"><li data-start="329" data-end="345" class=""><p data-start="331" data-end="345" class="">Nome completo;</p></li><li data-start="346" data-end="352" class=""><p data-start="348" data-end="352" class="">CPF;</p></li><li data-start="353" data-end="374" class=""><p data-start="355" data-end="374" class="">Endereço de e-mail;</p></li><li data-start="375" data-end="396" class=""><p data-start="377" data-end="396" class="">Número de telefone;</p></li><li data-start="397" data-end="417" class=""><p data-start="399" data-end="417" class="">Endereço completo;</p></li><li data-start="418" data-end="479" class=""><p data-start="420" data-end="479" class="">Informações de pagamento (via plataforma segura integrada).</p></li></ul><h4 style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);">2. Uso das Informações</h4><p data-start="508" data-end="537" class="">Os dados são utilizados para:</p><ul data-start="538" data-end="750"><li data-start="538" data-end="579" class=""><p data-start="540" data-end="579" class="">Processar sua participação nos leilões;</p></li><li data-start="580" data-end="623" class=""><p data-start="582" data-end="623" class="">Transferir corretamente o saldo de horas;</p></li><li data-start="624" data-end="676" class=""><p data-start="626" data-end="676" class="">Garantir segurança e autenticidade das transações;</p></li><li data-start="677" data-end="750" class=""><p data-start="679" data-end="750" class="">Comunicar promoções, mudanças nas regras ou atualizações da plataforma.</p></li></ul><h4 style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);">3. Compartilhamento de Dados</h4><p data-start="785" data-end="826" class="">Seus dados são compartilhados apenas com:</p><ul data-start="827" data-end="1031"><li data-start="827" data-end="892" class=""><p data-start="829" data-end="892" class="">Parceiros de pagamento homologados (ex: gateways de pagamento);</p></li><li data-start="893" data-end="1031" class=""><p data-start="895" data-end="1031" class="">Internamente, para controle de saldo e agendamento de voos; Jamais vendemos, alugamos ou cedemos seus dados a terceiros não autorizados.</p></li></ul><h4 style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);">4. Armazenamento e Segurança</h4><p data-start="1066" data-end="1212" class="">Utilizamos servidores com protocolos de segurança atualizados e acesso restrito aos dados pessoais. Todo o tráfego de informações é criptografado.</p><h4 style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);">5. Seus Direitos</h4><p data-start="1235" data-end="1265" class="">Você pode, a qualquer momento:</p><ul data-start="1266" data-end="1382"><li data-start="1266" data-end="1314" class=""><p data-start="1268" data-end="1314" class="">Solicitar alteração ou exclusão de seus dados;</p></li><li data-start="1315" data-end="1382" class=""><p data-start="1317" data-end="1382" class="">Pedir um relatório completo sobre os dados que temos armazenados.</p></li></ul><h4 style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);">6. Contato</h4><p data-start="1399" data-end="1481" class="">Dúvidas? Entre em contato com nosso suporte através da aba "Fale Conosco" do site.</p>',
                'post_title' => 'POLÍTICA DE PRIVACIDADE',
                'post_excerpt' => NULL,
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'politica-de-privacidade',
                'to_ping' => NULL,
                'pinged' => NULL,
                'post_modified' => '2025-04-05 11:39:56',
                'post_modified_gmt' => '2025-04-05 16:39:50',
                'post_content_filtered' => NULL,
                'post_parent' => NULL,
                'guid' => NULL,
                'menu_order' => NULL,
                'post_type' => 'paginas',
                'post_mime_type' => NULL,
                'comment_count' => NULL,
                'config' => '{"tipo_pagina":"secundaria"}',
                'created_at' => NULL,
                'updated_at' => NULL,
                'token' => '67f1401fbd4a4',
            ),
            20 =>
            array (
                'ID' => 20,
                'post_author' => 1,
                'post_date' => '2023-10-19 19:50:10',
                'post_date_gmt' => '2023-10-19 19:50:10',
                'post_content' => '<h2 data-start="224" data-end="256" class=""></h2><h4>🔹 O que é o leilão de horas de voo?</h4><p data-start="1987" data-end="2156" class="">É uma plataforma onde você pode disputar pacotes de horas de voo ofertados por sócios cotistas e alunos que cancelaram seus contratos e ainda possuem saldo remanescente.</p><h4>🔹 Quem pode participar?</h4><p data-start="2187" data-end="2256" class="">Qualquer pessoa maior de 18 anos, cadastrada e com dados verificados.</p><h4>🔹 Como funciona o pagamento?</h4><p data-start="2292" data-end="2405" class="">Após vencer o leilão, o pagamento é feito por boleto, cartão ou Pix, por meio de uma plataforma segura integrada.</p><h4>🔹 Ganhei o leilão. E agora?</h4><p data-start="2440" data-end="2563" class="">Você terá um prazo para fazer o pagamento. Após a confirmação, o saldo será adicionado à sua conta no sistema do Aeroclube.</p><h4>🔹 Posso desistir depois de dar um lance?</h4><p data-start="2611" data-end="2718" class="">Não. Lances são compromissos de compra. Se você não pagar, poderá ser suspenso ou até banido da plataforma.</p><h4>🔹 Quando poderei usar minhas horas?</h4><p data-start="2761" data-end="2892" class="">Assim que seu pagamento for confirmado, as horas são liberadas no seu saldo, respeitando a agenda operacional de voos do Aeroclube.</p><h4>🔹 O que acontece com as horas se eu não usar?</h4><p></p><p data-start="2945" data-end="3061" class="">As horas seguem as regras do seu pacote, que podem incluir validade. Fique atento às condições no momento do leilão.</p>',
                'post_title' => 'FAQ',
                'post_excerpt' => 'Perguntas Frequentes',
                'post_status' => 'publish',
                'comment_status' => NULL,
                'ping_status' => NULL,
                'post_password' => NULL,
                'post_name' => 'faq',
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
                'token' => '67f13fc9b0cc4',
            ),
        ));


    }
}
