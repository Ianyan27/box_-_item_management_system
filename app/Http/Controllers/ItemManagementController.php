<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemManagementController extends Controller
{

    public function index(){
        $items = Item::all();
        return view('pages.item.dashboard', compact('items'));
    }
        public function getItems(){

        $response = app(DummyDataController::class)->prepareDummyData();

        $data = $response->getData(true);

        foreach($data as $box){
            foreach($box['items'] as $item){
                Item::Create([
                    'id' => $item['id'],
                    'box_id' => $box['id'],
                    'name'=> $item['name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }
        }

        return redirect()->back()->with('success', 'Box API Successfully Synced');
    }
}
