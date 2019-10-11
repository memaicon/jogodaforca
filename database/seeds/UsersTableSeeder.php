<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$userRole 			= Role::where('name', '=', 'Jogador')->first();
		$adminRole 			= Role::where('name', '=', 'Administrador')->first();
		$masterRole 		= Role::where('name', '=', 'Master')->first();
		$permissions 		= Permission::all();

  	    /**
  	     * Add Users
  	     *
	     */
        if (User::where('email', '=', 'master@jogodaforca.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Master',
	            'email' => 'master@jogodaforca.com',
	            'password' => bcrypt('master'),
	        ]);

	        $newUser->attachRole($masterRole);
			foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}

        }

        if (User::where('email', '=', 'admin@jogodaforca.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Administrador',
	            'email' => 'admin@jogodaforca.com',
	            'password' => bcrypt('admin'),
	        ]);

	        $newUser;
	        $newUser->attachRole($adminRole);

		}
		
		if (User::where('email', '=', 'jogador@jogodaforca.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Jogador',
	            'email' => 'jogador@jogodaforca.com',
	            'password' => bcrypt('jogador'),
	        ]);

	        $newUser;
	        $newUser->attachRole($userRole);
        }

    }
}
