<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    /**
	     * Add Roles
	     *
	     */
    	if (Role::where('name', '=', 'Master')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Master',
	            'slug' => 'master',
	            'description' => 'Master Role',
	            'level' => 5,
        	]);
	    }

    	if (Role::where('name', '=', 'Administrador')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Administrador',
	            'slug' => 'Administrador',
	            'description' => 'Administrador Role',
	            'level' => 4,
	        ]);
		}

		if (Role::where('name', '=', 'Moderador')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Moderador',
	            'slug' => 'Moderador',
	            'description' => 'Moderador Role',
	            'level' => 3,
	        ]);
	    }
		
		if (Role::where('name', '=', 'Editor')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Editor',
	            'slug' => 'Editor',
	            'description' => 'Editor Role',
	            'level' => 2,
	        ]);
	    }

    	if (Role::where('name', '=', 'Jogador')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Jogador',
	            'slug' => 'Jogador',
	            'description' => 'Jogador Role',
	            'level' => 1,
	        ]);
	    }

    }

}
