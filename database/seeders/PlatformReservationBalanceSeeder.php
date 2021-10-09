<?php

namespace Database\Seeders;

use App\Models\Balance;
use Illuminate\Database\Seeder;

class PlatformReservationBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $balanceExists = Balance::where('is_platform', false)->where('type', Balance::$_TYPE_RESERVED)->first();
        if(!$balanceExists){
            Balance::create([
                'total' => 0,
                'is_platform' => true,
                'type' => Balance::$_TYPE_RESERVED
            ]);
        }
    }
}
