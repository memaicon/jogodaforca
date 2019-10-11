<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Participantes', 'Inscrições', 'Pagamentos', 'Certificados',
            'Conferência', 'Evento', 'Palestrantes', 'Palestras', 'Cronogramas',
            'Coordenadores', 'Cupons',
            'Banners', 'Posts', 'Contatos', 'Newsletters', 
            'Redes Sociais', 'Aplicação', 'Menu Site', 'Menu Aparência', 'Usuários', 'Permissões'
        ];

        $itens = [
            [
                'name' => 'Visualizar menu site',
                'slug' => 'view.'.str_slug('Site'),
                'description' => 'Pode visualizar o menu site',
                'model' => 'Menu',
            ],
            [
                'name' => 'Visualizar menu formulários',
                'slug' => 'view.'.str_slug('Formulários'),
                'description' => 'Pode visualizar o menu formulários',
                'model' => 'Menu',
            ],
            [
                'name' => 'Visualizar menu configurações',
                'slug' => 'view.'.str_slug('Configurações'),
                'description' => 'Pode visualizar o menu Configurações',
                'model' => 'Menu',
            ]
        ];

        foreach ($itens as $key => $item) {
            Permission::create($item);
        }

        foreach ($permissions as $key => $permission) {

            $itens = [
                [
                    'name' => 'Visualizar ' . $permission,
                    'slug' => 'view.'.str_slug($permission),
                    'description' => 'Pode Visualizar '.($permission),
                    'model' => ucfirst($permission),
                ],
                [
                    'name' => 'Adicionar '. $permission,
                    'slug' => 'create.'.str_slug($permission),
                    'description' => 'Pode Adicionar '.($permission),
                    'model' => ucfirst($permission),
                ],
                [
                    'name' => 'Editar '. $permission,
                    'slug' => 'edit.'.str_slug($permission),
                    'description' => 'Pode Editar '.($permission),
                    'model' => ucfirst($permission),
                ],
                [
                    'name' => 'Deletar '. $permission,
                    'slug' => 'delete.'.str_slug($permission),
                    'description' => 'Pode Deletar '.($permission),
                    'model' => ucfirst($permission),
                ]
            ];

            foreach ($itens as $key => $item) {
                Permission::create($item);
            }

        }

    }
}
