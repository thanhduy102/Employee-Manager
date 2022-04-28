<?php

use Illuminate\Database\Seeder;

class contract extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contract')->delete();
        DB::table('contract')->insert([
            ['contract_id'=>10001,'employee_id'=>10001,'type_contract'=>'Dài hạn','sign_day'=>'2019-01-01','expiration_day'=>'3000-01-01','isDelete'=>0],
            ['contract_id'=>10002,'employee_id'=>10001,'type_contract'=>'Dài hạn','sign_day'=>'2019-01-01','expiration_day'=>'3000-01-01','isDelete'=>0],

            ['contract_id'=>10003,'employee_id'=>10002,'type_contract'=>'Ngắn hạn','sign_day'=>'2019-02-03','expiration_day'=>'2022-02-03','isDelete'=>0],

            ['contract_id'=>10004,'employee_id'=>10003,'type_contract'=>'Ngắn hạn','sign_day'=>'2019-03-11','expiration_day'=>'2022-12-31','isDelete'=>0],

            ['contract_id'=>10005,'employee_id'=>10004,'type_contract'=>'Khác','sign_day'=>'2019-04-15','expiration_day'=>'2022-04-10','isDelete'=>0],

            ['contract_id'=>10006,'employee_id'=>10005,'type_contract'=>'Dài hạn','sign_day'=>'2019-02-04','expiration_day'=>'2022-02-13','isDelete'=>0],

            ['contract_id'=>10007,'employee_id'=>10006,'type_contract'=>'Ngắn hạn','sign_day'=>'2019-03-15','expiration_day'=>'2022-12-12','isDelete'=>0],

            ['contract_id'=>10008,'employee_id'=>10007,'type_contract'=>'Khác','sign_day'=>'2019-04-16','expiration_day'=>'2022-04-17','isDelete'=>0],

            ['contract_id'=>10009,'employee_id'=>10008,'type_contract'=>'Khác','sign_day'=>'2019-10-01','expiration_day'=>'2020-11-01','isDelete'=>0],

            ['contract_id'=>100010,'employee_id'=>10009,'type_contract'=>'Dài hạn','sign_day'=>'2019-05-10','expiration_day'=>'2020-10-10','isDelete'=>0],

        ]);
    }
}
