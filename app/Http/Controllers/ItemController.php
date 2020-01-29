<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::get();
        return view('items', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }

    /* Dynamic search */
    public function search(Request $request)
    {
            $output = "";
            // Get search result from DB matching item name or item type
            $items = Item::where('name', 'LIKE', '%' . $request->search . "%")
            ->orWhere('type', 'LIKE', '%' . $request->search . "%")->get();

            // if request is type ajax and $items is defined
            if ($request->ajax() && $items) {
                foreach ($items as $key => $item) {
                    $output .= '<tr>' .
                        '<td>' . $item->name . '</td>' .
                        '<td>' . $item->description . '</td>' .
                        '<td>' . $item->type . '</td>' .
                        '<td>' . $item->price . '</td>' .
                        '<td>' . $item->quantity . '</td>' .
                        '</tr>';
                }
                return ($output);
            } else {
                // Return the search result in JSON when using the direct search path
                return response()->json($items, 200, array(), JSON_PRETTY_PRINT);
            }
    }
}
