<?php

namespace Modules\CareProviders\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProviderTypesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $arrInserts = [
            [2, "Slot Contractor"],
            [3, "Group Home"],
            [4, "Center"],
            [5, "Non-Relative In-Home"],
            [6, "Relative In-Home"],
            [7, "Non-Relative Out-of-Home"],
            [8, "Relative Out-of-Home"]
        ];
        foreach ($arrInserts as $vals) {
            DB::table('provider_types')->insert([
                'type' => $vals[0],
                'description' => $vals[1],
            ]);
        }
    }

}
