<?php

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
			[
				'name' => 'Alimentos',
			],
			[
				'name' => 'Verbos',
			],
			[
				'name' => 'Música',
			],
			[
				'name' => 'Profissões',
			],
        ];

        foreach ($categories as $key => $categorie) {
            Categorie::create($categorie);
        }
    }
}
