<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class BoxManagementController extends Controller
{

    public function index(){
        $boxes = Box::all();
        return view('pages.box.dashboard', compact('boxes'));
    }

    public function getBoxes(){
        $response = app(DummyDataController::class)->prepareDummyData();

        $boxName = app(DummyDataController::class)->getBoxName();

        $data = $response->getData(true);

        foreach($data as $box){
            Box::Create([
                'id'            => $box['id'],
                'name'          => $box['name'],
                'created_at'    => $box['created_at'],
                'updated_at'    => $box['updated_at'],
                'deleted_at'    => $box['deleted_at']
            ]);
        }

        return redirect()->back()->with('success', 'Box API Successfully Synced');
    }

    public function addBox(Request $request){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Box::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Box created successfully!');
    }
}
