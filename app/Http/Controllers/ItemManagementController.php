<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItemManagementController extends Controller
{

    public function index(){
        $boxes = Box::all();
        $items = Item::with('box')->get();
        return view('pages.item.dashboard', compact('items', 'boxes'));
    }

    public function getItems(){

        $response = app(DummyDataController::class)->prepareDummyData();

        $items = app(DummyDataController::class)->getItems();

        Log::info($items);

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

    public function addItem(Request $request){

        $request->validate([
            'box_id' => 'required',
            'name' => 'required|string|max:255'
        ]);

        Item::create([
            'box_id' => $request->box_id,
            'name' => $request->name
        ]);

        return back()->with('success', 'Item created successfully!');
    }

    public function updateItem(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $box = Item::findOrFail($id);

        $box->update([
            'box_id' => $request->box_id,
            'name' => $request->name
        ]);

        return back()->with('success', 'Box updated successfully!');
    }

    public function deleteItem($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return back()->with('success', 'Item Deleted Successfully!');
    }
}
