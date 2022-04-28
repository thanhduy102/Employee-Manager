<?php

use Illuminate\Database\Seeder;

class work_day extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_day')->delete();
        DB::table('work_day')->insert([
            ['ordinal_id'=>1,'employee_id'=>10001,'salary_id'=>1,'day_worked'=>22,'overtime'=>28,'isDelete'=>0],
            ['ordinal_id'=>2,'employee_id'=>10002,'salary_id'=>2,'day_worked'=>21,'overtime'=>29,'isDelete'=>0],
            ['ordinal_id'=>3,'employee_id'=>10003,'salary_id'=>3,'day_worked'=>20,'overtime'=>27,'isDelete'=>0],
            ['ordinal_id'=>4,'employee_id'=>10004,'salary_id'=>4,'day_worked'=>19,'overtime'=>26,'isDelete'=>0],
            ['ordinal_id'=>5,'employee_id'=>10005,'salary_id'=>5,'day_worked'=>18,'overtime'=>25,'isDelete'=>0],
            ['ordinal_id'=>6,'employee_id'=>10006,'salary_id'=>6,'day_worked'=>22,'overtime'=>24,'isDelete'=>0],
            ['ordinal_id'=>7,'employee_id'=>10007,'salary_id'=>7,'day_worked'=>23,'overtime'=>23,'isDelete'=>0],
            ['ordinal_id'=>8,'employee_id'=>10007,'salary_id'=>2,'day_worked'=>20,'overtime'=>22,'isDelete'=>0],
            ['ordinal_id'=>9,'employee_id'=>10008,'salary_id'=>3,'day_worked'=>21,'overtime'=>24,'isDelete'=>0],
            ['ordinal_id'=>10,'employee_id'=>10009,'salary_id'=>4,'day_worked'=>25,'overtime'=>20,'isDelete'=>0],
        ]);
    }
}
