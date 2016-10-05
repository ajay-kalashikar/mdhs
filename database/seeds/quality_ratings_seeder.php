<?php

use Illuminate\Database\Seeder;

class quality_ratings_seeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $arrInserts = [
            [0, "Not Rated"],
            [1, "Low"],
            [2, "Average"],
            [3, "Good"],
            [4, "Very Good"],
            [5, "Excellent"]
        ];
        
        foreach ($arrInserts as $vals) {
            DB::table('quality_rating_details')->insert([
                'rating' => $vals[0],
                'description' => $vals[1],
            ]);
        }
    }

}
