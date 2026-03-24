<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyDataController extends Controller
{
    public function prepareDummyData(){
        return response()->json([
            [
                "id" => 1,
                "name" => "Vegetables",
                "items" => [
                    [
                        "id" => 1,
                        "name" => "Carrot",
                        "created_at" => "2024-01-01 01:00:00:00:00",
                        "updated_at" => NULL,
                        "deleted_at" => NULL
                    ],
                    [
                        "id" => 2,
                        "name" => "Spinach",
                        "created_at" => "2024-01-01 01:00:00:00:00",
                        "updated_at" => NULL,
                        "deleted_at" => NULL
                    ],
                ],
                "created_at" => "2024-01-01 01:00:00:00:00",
                "updated_at" => NULL,
                "deleted_at" => NULL
            ]
        ]);
    }

    public function getBoxName(){

        $boxName = [];

        $response = $this->prepareDummyData();

        $data = $response->getData(true);

        foreach($data as $box){
            $boxName[] = $box['name'];
        }

        return $boxName;
    }

    public function getItems(){
        $itemName = [];

        $response = $this->prepareDummyData();

        $data = $response->getData(true);

        foreach($data as $box){
            foreach($box['items'] as $items){
                $itemName[] = $items['name'];
            }
        }

        return $itemName;
    }
}
