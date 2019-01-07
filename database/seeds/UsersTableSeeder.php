<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'administrator',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$AHB63rh1pEk38s30GO9gYuYK.gRXbIyNNuh2.1u9gOKnG/4CBCFvu',
                'remember_token' => 'uOEkfMBZZNqDk1qIuX3Lm78wCGmc4oS9IWkIbbMsp55gUzW4Bx6bR9vSDcaz',
                'created_at' => '2019-01-07 08:56:45',
                'updated_at' => '2019-01-07 08:56:45',
            ),
        ));
        
        
    }
}