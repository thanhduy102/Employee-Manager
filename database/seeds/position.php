<?php

use Illuminate\Database\Seeder;

class position extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->delete();
        DB::table('position')->insert([
            ['position_id'=>1,'position_name'=>'Giám Đốc','basic_salary'=>1000000,'isDelete'=>0],
            ['position_id'=>2,'position_name'=>'Trưởng phòng','basic_salary'=>800000,'isDelete'=>0],
            ['position_id'=>3,'position_name'=>'Nhân viên kỹ thuật','basic_salary'=>750000,'isDelete'=>0],
            ['position_id'=>4,'position_name'=>'Nhân viên kinh doanh','basic_salary'=>650000,'isDelete'=>0],
            ['position_id'=>5,'position_name'=>'Phó phòng','basic_salary'=>630000,'isDelete'=>0],
            ['position_id'=>6,'position_name'=>'Nhân viên kế toán','basic_salary'=>620000,'isDelete'=>0],
            ['position_id'=>7,'position_name'=>'Nhân viên hành chính','basic_salary'=>550000,'isDelete'=>0],
            ['position_id'=>8,'position_name'=>'Nhân viên nhân sự','basic_salary'=>580000,'isDelete'=>0],
        ]);
    }
}
