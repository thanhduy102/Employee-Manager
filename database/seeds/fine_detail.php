<?php

use Illuminate\Database\Seeder;

class fine_detail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fine_detail')->delete();
        DB::table('fine_detail')->insert([
            ['fine_id'=>1,'fine_reason'=>'Phạt không chuyên cần','fine'=>300000,'isDelete'=>0],
            ['fine_id'=>2,'fine_reason'=>'Phạt chậm tiến độ','fine'=>200000,'isDelete'=>0],
            ['fine_id'=>3,'fine_reason'=>'Phạt đi muộn','fine'=>150000,'isDelete'=>0],
            ['fine_id'=>4,'fine_reason'=>'Phạt không đạt doanh số','fine'=>300000,'isDelete'=>0],
            ['fine_id'=>5,'fine_reason'=>'Nghỉ nhiều','fine'=>100000,'isDelete'=>0],
            ['fine_id'=>6,'fine_reason'=>'Tán gái','fine'=>500000,'isDelete'=>0],
        ]);
    }
}
