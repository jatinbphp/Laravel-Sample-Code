<?php

namespace Database\Seeders;

use App\Models\Agency;
use DB;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Agency::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $firstAgency = new Agency();
        $firstAgency->name = "Test Agency";
        $firstAgency->email = "test.agency@gmail.com";
        $firstAgency->address = "Rajkot";
        $firstAgency->city = "Rajkot";
        $firstAgency->state = "Gujarat";
        $firstAgency->country = "India";
        $firstAgency->pin_code = "030167";
        $firstAgency->phone_no = "8460177472";
        $firstAgency->is_active = "0";
        $firstAgency->save();
    }
}
