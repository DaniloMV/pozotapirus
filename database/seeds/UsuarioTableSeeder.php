<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class UsuarioTableSeeder extends Seeder{
	
	public function run()
	{
		Usuario::create([
			//$sec = Usuario::max('id')+1;
			//'id' => $sec,
			'name' => 'Danilo',
			'email' => 'dan@dan.com',
			'password' => Hash::make('dan'), 
			'estreg' => 1
		]);
	}
}