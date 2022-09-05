<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userRecords = [

            ['id'=>7,'name'=>'Admin', 'email'=>'admin@admin.com', 'password'=>'$2y$10$qQ71rMLGaYYnfnABN5766OU9asm8mPZ/5BNwvFO3uPDnaEd0jd5.a', 'created_by'=>'2', 'role_as'=>1],

        ];

        // Email: admin@admin.com
        // Password: 12345678

        User::insert($userRecords);
    }
}
