<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('admin'),'name'=>'duy'],
            ['id'=>2,'email'=>'admin1@gmail.com','password'=>bcrypt('admin1'),'name'=>'duy1'],
        ]);
    }
}
