<?php

use Illuminate\Database\Seeder;

class salary_month extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('salary_month')->delete();
       DB::table('salary_month')->insert([
           ['salary_id'=>1,'salary_month'=>1,'year_id'=>1,'isDelete'=>0],
           ['salary_id'=>2,'salary_month'=>2,'year_id'=>2,'isDelete'=>0],
           ['salary_id'=>3,'salary_month'=>3,'year_id'=>3,'isDelete'=>0],
           ['salary_id'=>4,'salary_month'=>4,'year_id'=>4,'isDelete'=>0],
           ['salary_id'=>5,'salary_month'=>5,'year_id'=>1,'isDelete'=>0],
           ['salary_id'=>6,'salary_month'=>6,'year_id'=>2,'isDelete'=>0],
           ['salary_id'=>7,'salary_month'=>7,'year_id'=>3,'isDelete'=>0],
       ]);
    }
}
