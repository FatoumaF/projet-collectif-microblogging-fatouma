<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    //

    public function index()
    {

        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }
    public function saveItem(Request $request)
    {
        // \Log::info(json_encode($request->all()));

        $todo = new ListItem();
        $todo->name = $request->listItem;
        $todo->is_complete = 0;
        $todo->save();


        return redirect('/');
    }

    public function markComplete($id)
    {
        $item = ListItem::find($id);
        $item->is_complete = 1;
        $item->save();
        return redirect('/');
    }
}
