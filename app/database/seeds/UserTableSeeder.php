<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
        	'name' => 'Wern Ancheta', 
        	'email' => 'ancheta.wern@gmail.com',
        	'password' => Hash::make('codenamered')
        ));
    }

}