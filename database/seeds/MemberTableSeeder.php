<?php

use Illuminate\Database\Seeder;
use App\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
        	'user_id' => 2,
        	'jenis_kelamin' => 'LAKI-LAKI',
        	'no_hp' => 081234567890,
            'alamat' => 'Jalan JL'
        ]);

    }
}
