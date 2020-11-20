<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			[
				'name'              => 'Guru',
				'email'             => 'guru@epca.co.id',
				'password'          => bcrypt('passguru'),
				'role'			    => 1,
				'email_verified_at' => now(),
				'created_at'        => Carbon::now(),
				'updated_at'        => Carbon::now(),
			],
			[
				'name'              => 'Murid',
				'email'             => 'murid@epca.co.id',
				'password'          => bcrypt('passmurid'),
				'email_verified_at' => now(),
				'role'  			=> 2,
				'created_at'        => Carbon::now(),
				'updated_at'        => Carbon::now(),
			]
		]);
    }
}
