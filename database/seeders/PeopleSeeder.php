<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\People::insert(
        	[
                [
                    'name' => 'Test 1',
                    'given_name' => 'Given Name - 1',
                    'website' => 'https://www.google.com',
                    'birthday' => '08 January 1985',
                    'family_name' => 'Family Name - 1',
                    'description' => 'Description test',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
