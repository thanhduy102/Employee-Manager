<?php

use Illuminate\Database\Seeder;

class salary_year extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salary_year')->delete();
        DB::table('salary_year')->insert([
            ['year_id'=>1,'salary_year'=>2018,'isDelete'=>0],
            ['year_id'=>2,'salary_year'=>2019,'isDelete'=>0],
            ['year_id'=>3,'salary_year'=>2020,'isDelete'=>0],
            ['year_id'=>4,'salary_year'=>2021,'isDelete'=>0],
            ['year_id'=>5,'salary_year'=>2022,'isDelete'=>0],
            ['year_id'=>6,'salary_year'=>2023,'isDelete'=>0],
        ]);
    }
}
