<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(position::class);
         $this->call(department::class);
         $this->call(level::class);
         $this->call(employee::class);
         $this->call(contract::class);
         $this->call(salary_year::class);
         $this->call(salary_month::class);
         $this->call(bonus_detail::class);
         $this->call(fine_detail::class);
         $this->call(work_day::class);
         $this->call(bonus_info::class);
         $this->call(fine_info::class);
         $this->call(users::class);

    }
}
