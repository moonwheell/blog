<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Unknown author',
                'email' => 'author_unknown@g.g',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' => 'test author',
                'email' => 'author_test@t.t',
                'password' => bcrypt('admin123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
