<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::truncate();

        $user = [
	        ['email' => 'admin@email.com', 'nama' => 'admin', 'password' => '12345', 'nohp' => '083876854003', 'alamat' => 'pandeglang', 'akses' => '0'],
	        ['email' => 'users@email.com', 'nama' => 'users', 'password' => md5('12345'), 'nohp' => '083876854003', 'alamat' => 'pandeglang', 'akses' => '1'],
            ['email' => 'rahmat@email.com', 'nama' => 'rahmat', 'password' => md5('12345'), 'nohp' => '083876854003', 'alamat' => 'pandeglang', 'akses' => '1'],
	    ];

	    User::insert($user);
    }
}
