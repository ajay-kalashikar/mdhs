<?php namespace Modules\CareProviders\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CountyDetailsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
        $arrInserts = [
            [1, "ADAMS"],
            [2, "ALCORN"],
            [3, "AMITE"],
            [4, "ATTALA"],
            [5, "BENTON"],
            [6, "BOLIVAR"],
            [7, "CALHOUN"],
            [8, "CARROLL"],
            [9, "CHICKASAW"],
            [10, "CHOCTAW"],
            [11, "CLAIBORNE"],
            [12, "CLARKE"],
            [13, "CLAY"],
            [14, "COAHOMA"],
            [15, "COPIAH"],
            [16, "COVINGTON"],
            [17, "DESOTO"],
            [18, "FORREST"],
            [19, "FRANKLIN"],
            [20, "GEORGE"],
            [21, "GREENE"],
            [22, "GRENADA"],
            [23, "HANCOCK"],
            [24, "HARRISON"],
            [25, "HINDS"],
            [26, "HOLMES"],
            [27, "HUMPHREYS"],
            [28, "ISSAQUENA"],
            [29, "ITAWAMBA"],
            [30, "JACKSON"],
            [31, "JASPER"],
            [32, "JEFFERSON"],
            [33, "JEFFERSON DAVIS"],
            [34, "JONES"],
            [35, "KEMPER"],
            [36, "LAFAYETTE"],
            [37, "LAMAR"],
            [38, "LAUDERDALE"],
            [39, "LAWRENCE"],
            [40, "LEAKE"],
            [41, "LEE"],
            [42, "LEFLORE"],
            [43, "LINCOLN"],
            [44, "LOWNDES"],
            [45, "MADISON"],
            [46, "MARION"],
            [47, "MARSHALL"],
            [48, "MONROE"],
            [49, "MONTGOMERY"],
            [50, "NESHOBA"],
            [51, "NEWTON"],
            [52, "NOXUBEE"],
            [53, "OKTIBBEHA"],
            [54, "PANOLA"],
            [55, "PEARL RIVER"],
            [56, "PERRY"],
            [57, "PIKE"],
            [58, "PONTOTOC"],
            [59, "PRENTISS"],
            [60, "QUITMAN"],
            [61, "RANKIN"],
            [62, "SCOTT"],
            [63, "SHARKEY"],
            [64, "SIMPSON"],
            [65, "SMITH"],
            [66, "STONE"],
            [67, "SUNFLOWER"],
            [68, "TALLAHATCHIE"],
            [69, "TATE"],
            [70, "TIPPAH"],
            [71, "TISHOMINGO"],
            [72, "TUNICA"],
            [73, "UNION"],
            [74, "WALTHALL"],
            [75, "WARREN"],
            [76, "WASHINGTON"],
            [77, "WAYNE"],
            [78, "WEBSTER"],
            [79, "WILKINSON"],
            [80, "WINSTON"],
            [81, "YALOBUSHA"],
            [82, "YAZOO"]
        ];
        foreach ($arrInserts as $vals) {
            DB::table('county_details')->insert([
                'id' => $vals[0],
                'name' => $vals[1],
            ]);
        }
    }

}