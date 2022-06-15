<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear table
        Pokemon::truncate();

        // Open CSV file
        $csvFile = fopen('./database/data/pokemon.csv', 'r');

        // Define header row variable to skip first line
        $isHeaderRow = true;

        // Loop through pokemon CSV file and insert into table
        while (($csvData = fgetcsv($csvFile)) !== false) {
            // Skip header row
            if (!$isHeaderRow) {
                Pokemon::create([
                    'name' => $csvData[1],
                    'type_1' => $csvData[2],
                    'type_2' => $csvData[3],
                    'total' => $csvData[4],
                    'hp' => $csvData[5],
                    'attack' => $csvData[6],
                    'defense' => $csvData[7],
                    'sp_atk' => $csvData[8],
                    'sp_def' => $csvData[9],
                    'speed' => $csvData[10],
                    'generation' => $csvData[11],
                    'legendary' => (int) str_replace(
                        array('FALSE', 'TRUE'),
                        array(0, 1),
                        strtoupper($csvData[12])
                    )
                ]);
            }
            $isHeaderRow = false;
        }

        // Close CSV file
        fclose($csvFile);
    }
}
