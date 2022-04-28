<?php

use Illuminate\Database\Seeder;

class employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->delete();
        DB::table('employee')->insert([
            ['employee_id'=>10001,'full_name'=>'Trần Văn A','gender'=>'Nam','position_id'=>1,'department_id'=>1,'level_id'=>1,'isDelete'=>0],
            ['employee_id'=>10002,'full_name'=>'Trần Văn B','gender'=>'Nữ','position_id'=>1,'department_id'=>1,'level_id'=>1,'isDelete'=>0],
            ['employee_id'=>10003,'full_name'=>'Trần Văn AC','gender'=>'Nữ','position_id'=>2,'department_id'=>2,'level_id'=>2,'isDelete'=>0],
            ['employee_id'=>10004,'full_name'=>'Trần Văn D','gender'=>'Nam','position_id'=>2,'department_id'=>3,'level_id'=>2,'isDelete'=>0],
            ['employee_id'=>10005,'full_name'=>'Trần Văn E','gender'=>'Nữ','position_id'=>3,'department_id'=>2,'level_id'=>3,'isDelete'=>0],
            ['employee_id'=>10006,'full_name'=>'Trần Văn F','gender'=>'Nam','position_id'=>4,'department_id'=>4,'level_id'=>4,'isDelete'=>0],
            ['employee_id'=>10007,'full_name'=>'Trần Văn G','gender'=>'Nam','position_id'=>5,'department_id'=>4,'level_id'=>5,'isDelete'=>0],
            ['employee_id'=>10008,'full_name'=>'Trần Văn H','gender'=>'Nữ','position_id'=>6,'department_id'=>5,'level_id'=>6,'isDelete'=>0],
            ['employee_id'=>10009,'full_name'=>'Trần Văn I','gender'=>'Nam','position_id'=>7,'department_id'=>6,'level_id'=>6,'isDelete'=>0],
            ['employee_id'=>100010,'full_name'=>'Trần Văn J','gender'=>'Nữ','position_id'=>8,'department_id'=>3,'level_id'=>3,'isDelete'=>0],
        ]);
    }
}
