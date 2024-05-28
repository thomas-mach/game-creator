<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->truncate();
        $data = $this->getCSVData(__DIR__ . '/items.csv');

        foreach ($data as $index => $row) {

            if ($index !== 0) {
                $item = new Item();
                $item->name = $row[0];
                $item->type = $row[2];
                $item->category = $row[3];
                $item->weight = $row[4];
                $item->cost = $row[5];
                $item->damage_dice = $row[6];


                $item->save();
            }
        }
    }
    public function getCSVData(string $path)
    {
        // conterrà tutte le righe che leggiamo dal file CSV
        $data = [];

        $file_stream = fopen($path, 'r');

        if ($file_stream === false) {
            exit('Cannot open the file ' . $path);
        }

        while (($row = fgetcsv($file_stream)) !== false) {
            $data[] = $row;
        }

        fclose($file_stream);

        // ritornaimo le righe
        return $data;
    }
}
