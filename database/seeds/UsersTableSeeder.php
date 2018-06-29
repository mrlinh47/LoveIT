<?php

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
        DB::table('mll02_users')->insert([
            'fullname'=>'superadmin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'address' =>'aaa',
            'level' =>1,
            'status'=>1,
            'created_at' => new DateTime()
        ]);
    }
}
