<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;	

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('user')->insert([
        // 	'name'=>'Minh',
        // 	'email'=>'Minhvuong@gmail.com',
        // 	'password'=>bcrypt('matkhau'),
        // 	// 'create_at'=>'5/10/2020',
        // 	// 'update_at'=>'10/10/2020',
        // ]);
        $this->call(userSeeder::class);
    }
}

/**
 * 
 */
class userSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->insert([
			['id'=>'1','email'=>'admin@vug.kb','password'=>bcrypt('123'),'role_id'=>'1']
		]);
	}
}

