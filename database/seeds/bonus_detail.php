<?php

use Illuminate\Database\Seeder;

class bonus_detail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bonus_detail')->delete();
        DB::table('bonus_detail')->insert([
            ['bonus_id'=>1,'bonus_reason'=>'Thưởng doanh số','bonus'=>300000,'isDelete'=>0],
            ['bonus_id'=>2,'bonus_reason'=>'Thưởng dự án','bonus'=>200000,'isDelete'=>0],
            ['bonus_id'=>3,'bonus_reason'=>'Thưởng chuyên cần','bonus'=>150000,'isDelete'=>0],
            ['bonus_id'=>4,'bonus_reason'=>'Thưởng trách nhiệm','bonus'=>300000,'isDelete'=>0],
            ['bonus_id'=>5,'bonus_reason'=>'Đi làm đầy đủ','bonus'=>100000,'isDelete'=>0],
            ['bonus_id'=>6,'bonus_reason'=>'Tán gái','bonus'=>500000,'isDelete'=>0],
        ]);
    }
}
