<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
            'email'=> 'mcuong215@gmail.com',
            'password'=> bcrypt('123456'),
            'level'=>1
            ],
            [
            'email'=> 'cuonghophan99@gmail.com',
            'password'=> bcrypt('123456'),
            'level'=>1
            ],
        ];
        DB::table('mc_users')->insert($data);
    }
}
