<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Items;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::all()->toArray();
        return array_reverse($items);      
    }
    public function store(Request $request)
    {
        $item = new Items([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $item->save();
        return response()->json('Items created!');
    }
    public function show($id)
    {
        $item = Items::find($id);
        return response()->json($item);
    }
    public function update($id, Request $request)
    {
        $item = Items::find($id);
        $item->update($request->all());
        return response()->json('Items updated!');
    }
    public function destroy($id)
    {
        $item = Items::find($id);
        $item->delete();
        return response()->json('Items deleted!');
    }
}
