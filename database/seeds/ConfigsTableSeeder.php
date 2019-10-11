<?php

use Illuminate\Database\Seeder;
use App\Models\Config\{Type, Group};
use App\Models\Config;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = ['text', 'boolean', 'file', 'select', 'textarea'];

        foreach ($itens as $key => $item) {
			Type::create(['name' => $item]);
        }

        $itens = ['Aplicação', 'Site'];

        foreach ($itens as $key => $item) {
            Group::create(['name' => $item]);
        }

        $itens = [
			[
				'name' => 'Nome Aplicação',
				'description' => 'Nome da aplicação',
				'slug' => str_slug('Nome Aplicacao'),
				'value' => 'Jogo da Forca',
				'type_id' => 1,
				'group_id' => 1,
				'delete' => false
			],
			[
				'name' => 'Logo Aplicação',
				'description' => 'Logo da Aplicação',
				'slug' => str_slug('Logo Aplicacao'),
				'value' => '/',
				'type_id' => 3,
				'group_id' => 1,
				'delete' => false
			],
			[
				'name' => 'Favicon Aplicação',
				'description' => 'Favicon da Aplicação',
				'slug' => str_slug('Favicon Aplicacao'),
				'value' => '/',
				'type_id' => 3,
				'group_id' => 1,
				'delete' => false
			],
			[
				'name' => 'Logo Site',
				'description' => 'Logo Site',
				'slug' => str_slug('Logo Site'),
				'value' => '/',
				'type_id' => 3,
				'group_id' => 2,
				'delete' => false
			],
			[
				'name' => 'Logo Footer',
				'description' => 'Logo Footer',
				'slug' => str_slug('Logo Footer'),
				'value' => '/',
				'type_id' => 3,
				'group_id' => 2,
				'delete' => false
			],
        ];

        foreach ($itens as $key => $item) {
            Config::create($item);
        }
    }
}
