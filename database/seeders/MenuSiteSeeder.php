<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_sites')->insert([
            [
                'categoria'=>'',
                'description'=>'Home',
                'icon'=>'fa fa-home',
                'actived'=>true,
                'permission'=>'public',
                'url'=>'https://aeroclubejf.com.br/',
                'route'=>'',
                'page_id'=>0,
                'pai'=>''
            ],
            [
                'categoria'=>'',
                'description'=>'Leilões',
                'icon'=>'fa fa-gavel',
                'actived'=>true,
                'permission'=>'public',
                'url'=>'leiloes-publicos',
                'route'=>'',
                'page_id'=>0,
                'pai'=>''
            ],
            [
                'categoria'=>'',
                'description'=>'Seguindo',
                'icon'=>'fa fa-gavel',
                'actived'=>true,
                'permission'=>'private',
                'url'=>'seguindo',
                'route'=>'',
                'page_id'=>0,
                'pai'=>''
            ],
            [
                'categoria'=>'',
                'description'=>'Meus Lances',
                'icon'=>'fa fa-gavel',
                'actived'=>true,
                'permission'=>'private',
                'url'=>'lances-list',
                'route'=>'',
                'page_id'=>0,
                'pai'=>''
            ],
            [
                'categoria'=>'',
                'description'=>'Contato',
                'icon'=>'fa fa-contacts',
                'actived'=>true,
                'permission'=>'public',
                'url'=>'https://aeroclubejf.com.br/contato',
                'route'=>'',
                'page_id'=>0,
                'pai'=>''
            ],
        ]);
    }
}
