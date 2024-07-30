<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $page = $request->page ?? 0;

        $items = Item::whereHas('options', function($q) use ($request) {

            $arr = [];

            if ($request->properties){
                foreach ($request->properties as $key => $values) {
                    foreach ($values as $k => $value) {
                        $arr[]=[$key, $value];
                    }
                }
            }

            foreach ($arr as $item) {

                $q->orWhere(function ($q) use ($item) {
                    $q->where('key', '=', $item[0]);
                    $q->where('value', '=', $item[1]);
                });
            }

        })
            ->offset($page * 40)
            ->limit(40)
            ->get();

        return $items->toJson();
    }
}
