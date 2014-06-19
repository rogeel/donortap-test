<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	  public function run()
    {
 
        Eloquent::unguard();
        //insertamos los usuarios
        $this->call('UserTableSeeder');
        //mostramos el mensaje de que los usuarios se han insertado correctamente
        $this->command->info('User table seeded!');
        //insertamos los posts
        
 
    }
 
}
 
//clase para insertar usuarios
class UserTableSeeder extends Seeder {
 
    public function run()
    {
 
        DB::table('users')->insert(array(
                'firstname' => 'admin',
                'lastname' => 'admin',
                'password' => Hash::make('admin123!'),
                'email' => 'admin@donortap.com',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
                'user_type' => 1
        ));
 
       
    }
}


