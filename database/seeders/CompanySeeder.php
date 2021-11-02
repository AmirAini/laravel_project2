<?php

namespace Database\Seeders;
use App\Models\Company;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach(range(1,100) as $index){
            DB::table('companies')->insert([
                'name' =>$faker->name,
                // this method x push date, sebab tu this method produce data with no time stamp
            ]);

            // another method to save into db
            // $company = new Company();
            // $company->name = $faker->name; //faker function boleh generate random name, random email
            // $company->save();
        }
    }
}
