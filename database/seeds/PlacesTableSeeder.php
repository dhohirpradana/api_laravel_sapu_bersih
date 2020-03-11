<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("places")->insert([
            [
                'image'         => "String.img",
                'latitude'      => "90809",
                'longtitude'    => "87979",
                'time'          => "2020-02-12 09:22:01",
                'desa'          => "xxxxxx", 
                'kecamatan'     => "uyyyyyy",
                'user_id'       => "3",
            ]
        ]);

    }
}
