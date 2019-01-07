<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rooms')->delete();
        
        \DB::table('rooms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '502',
                'table_capacity' => 125,
                'chair_capacity' => 200,
                'created_at' => '2019-01-07 16:00:40',
                'updated_at' => '2019-01-07 16:00:40',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '503',
                'table_capacity' => 50,
                'chair_capacity' => 75,
                'created_at' => '2019-01-07 16:00:30',
                'updated_at' => '2019-01-07 16:00:30',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => '504',
                'table_capacity' => 2,
                'chair_capacity' => 2,
                'created_at' => '2019-01-07 16:00:51',
                'updated_at' => '2019-01-07 16:00:51',
            ),
        ));
        
        
    }
}