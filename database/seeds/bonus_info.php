<?php

use Illuminate\Database\Seeder;

class bonus_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bonus_info')->delete();
        DB::table('bonus_info')->insert([
            ['ordinal_id'=>1,'employee_id'=>10001,'bonus_id'=>1,'salary_id'=>1,'isDelete'=>0],
            ['ordinal_id'=>2,'employee_id'=>10002,'bonus_id'=>2,'salary_id'=>2,'isDelete'=>0],
            ['ordinal_id'=>3,'employee_id'=>10003,'bonus_id'=>3,'salary_id'=>3,'isDelete'=>0],
            ['ordinal_id'=>4,'employee_id'=>10004,'bonus_id'=>4,'salary_id'=>4,'isDelete'=>0],
            ['ordinal_id'=>5,'employee_id'=>10005,'bonus_id'=>5,'salary_id'=>5,'isDelete'=>0],
            ['ordinal_id'=>6,'employee_id'=>10006,'bonus_id'=>6,'salary_id'=>6,'isDelete'=>0],
        ]);
    }
}
