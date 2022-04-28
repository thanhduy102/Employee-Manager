<?php

use Illuminate\Database\Seeder;

class level extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->delete();
        DB::table('level')->insert([
            ['level_id'=>1,'level_name'=>'Thạc sĩ','coefficient_salary'=>2.41,'isDelete'=>0],
            ['level_id'=>2,'level_name'=>'Tiến sĩ','coefficient_salary'=>2.65,'isDelete'=>0],
            ['level_id'=>3,'level_name'=>'Đại học','coefficient_salary'=>2.34,'isDelete'=>0],
            ['level_id'=>4,'level_name'=>'Cao đẳng','coefficient_salary'=>2.1,'isDelete'=>0],
            ['level_id'=>5,'level_name'=>'Trung cấp','coefficient_salary'=>1.86,'isDelete'=>0],
            ['level_id'=>6,'level_name'=>'Phổ thông','coefficient_salary'=>1.63,'isDelete'=>0],
        ]);
    }
}
