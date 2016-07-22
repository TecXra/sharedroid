<?php

use Illuminate\Database\Seeder;

class AppUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        \App\User::create([
			'phone_number' => '03154342359',
			'token' => 'abc',
		]);

	\App\User::create([
			'phone_number' => '03114220578',
			'token' => 'klm',

		]);
	\App\User::create([
			'phone_number' => '03214604811',
			'token' => 'pqr',
			
		]);

    \App\Message::create([
			'to_number' => '03014430979',
			'message' => 'hey asif',
			'primary_id' => '1',
			'secondary_id' => '2',
			'check' => 's',
			
		]);
   \App\Message::create([
			'to_number' => '03014430979',
			'message' => 'oye gal sun chwal',
			'primary_id' => '1',
			'secondary_id' => '2',
			'check' => 's',
			
		]);

\App\Message::create([
			'to_number' => '03014430979',
			'message' => 'yar menu chwal na kya kar',
			'primary_id' => '1',
			'secondary_id' => '2',
			'check' => 'r',
			
		]);
    }
}
