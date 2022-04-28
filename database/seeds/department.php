<?php

use Illuminate\Database\Seeder;

class department extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->delete();
        DB::table('department')->insert([
            ['department_id'=>1,'department_name'=>'Phòng kinh doanh','salary_coefficient'=>1.2,'isDelete'=>0],
            ['department_id'=>2,'department_name'=>'Phòng kỹ thuật','salary_coefficient'=>2.1,'isDelete'=>0],
            ['department_id'=>3,'department_name'=>'Phòng nhân sự','salary_coefficient'=>1.3,'isDelete'=>0],
            ['department_id'=>4,'department_name'=>'Phòng kế toán','salary_coefficient'=>1.5,'isDelete'=>0],
            ['department_id'=>5,'department_name'=>'Phòng lãnh đạo','salary_coefficient'=>3.0,'isDelete'=>0],
            ['department_id'=>6,'department_name'=>'Phòng hành chính','salary_coefficient'=>1.9,'isDelete'=>0],
        ]);
    }
}
