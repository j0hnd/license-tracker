<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['abbreviation' => "AL", 'name' => "Alabama", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "AK", 'name' => "Alaska", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "AZ", 'name' => "Arizona", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "AR", 'name' => "Arkansas", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "CA", 'name' => "California", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "CO", 'name' => "Colorado", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "CT", 'name' => "Connecticut", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "DE", 'name' => "Delaware", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "FL", 'name' => "Florida", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "GA", 'name' => "Georgia", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['abbreviation' => "HI", 'name' => "Hawaii", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "ID", 'name' => "Idaho", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "IL", 'name' => "Illinois", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "IN", 'name' => "Indiana", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "IA", 'name' => "Iowa", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "KS", 'name' => "Kansas", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "KY", 'name' => "Kentucky", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "LA", 'name' => "Louisiana", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "ME", 'name' => "Maine", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "MD", 'name' => "Maryland", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['abbreviation' => "MA", 'name' => "Massachusetts", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "MI", 'name' => "Michigan", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "MN", 'name' => "Minnesota", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "MS", 'name' => "Mississippi", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "MO", 'name' => "Missouri", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "MT", 'name' => "Montana", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "NE", 'name' => "Nebraska", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "NV", 'name' => "Nevada", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "NH", 'name' => "New Hampshire", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "NJ", 'name' => "New Jersey", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['abbreviation' => "NM", 'name' => "New Mexico", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "NY", 'name' => "New York", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "NC", 'name' => "North Carolina", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "ND", 'name' => "North Dakota", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "OH", 'name' => "Ohio", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "OK", 'name' => "Oklahoma", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "OR", 'name' => "Oregon", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "PA", 'name' => "Pennsylvania", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "RI", 'name' => "Rhode Island", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "SC", 'name' => "South Carolina", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['abbreviation' => "SD", 'name' => "South Dakota", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "TN", 'name' => "Tennessee", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "TX", 'name' => "Texas", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "UT", 'name' => "Utah", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "VT", 'name' => "Vermont", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "VA", 'name' => "Virginia", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "WA", 'name' => "Washington", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "WV", 'name' => "West Virginia", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "WI", 'name' => "Wisconsin", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['abbreviation' => "WY", 'name' => "Wyoming", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

            ['abbreviation' => "DC", 'name' => "Washington DC", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];

        foreach ($states as $state) {
            DB::table('states')->insert($state);
        }
    }
}
