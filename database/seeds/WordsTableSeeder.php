<?php

use Illuminate\Database\Seeder;
use App\Models\Word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $words = [
			[
                'name' => 'Arroz',
                'tip_phrase' => 'Comida de Dia-a-Dia.',
                'categorie_id' => 1
			],
            [
                'name' => 'Feijão',
                'tip_phrase' => 'Comida de Dia-a-Dia.',
                'categorie_id' => 1
            ],
			[
                'name' => 'Pular',
                'tip_phrase' => 'Ação em que se tira os pés do chão.',
                'categorie_id' => 2
			],
            [
                'name' => 'Andar',
                'tip_phrase' => 'Usa-se as pernas.',
                'categorie_id' => 2
            ],
			[
                'name' => 'Banda',
                'tip_phrase' => 'Possui mais de um integrante.',
                'categorie_id' => 3
			],
            [
                'name' => 'Nota',
                'tip_phrase' => 'Utilizada para produzir e tocar músicas.',
                'categorie_id' => 3
            ],
			[
                'name' => 'Artista',
                'tip_phrase' => 'Aquele que cultiva as belas-artes.',
                'categorie_id' => 4
			],
            [
                'name' => 'Engenheiro',
                'tip_phrase' => 'Aquele que se diplomou em engenharia.',
                'categorie_id' => 4
            ],
        ];

        foreach ($words as $key => $word) {
            Word::create($word);
        }
    }
}
