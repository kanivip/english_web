<?php

namespace Database\Seeders;

use App\Models\role;
use App\Models\status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {

            DB::table('users')->insert([
                [
                    'role_id' => '1',
                    'first_name' => 'admin',
                    'last_name' => 'english',
                    'point' => 500,
                    'email' => 'kanivip284@gmail.com',
                    'password' => Hash::make('admin12345'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => '2',
                    'first_name' => 'user',
                    'point' => 500,
                    'last_name' => 'english',
                    'email' => 'shoppet2k@gmail.com',
                    'password' => Hash::make('user12345'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
            User::factory()
                ->count(200)
                ->create();
        } else {
            echo "Table have data";
        }
    }
}