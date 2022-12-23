<?php


namespace App\Http\Controllers;


use App\Eltex;

class ShopController extends Controller
{
    public function itemsList()
    {
        $items = Eltex::query()->get();
        return view('items_list', [
            'items' => $items
        ]);
    }
}