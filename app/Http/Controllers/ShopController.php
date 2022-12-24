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
    public function productCard($id)
    {
        $item = Eltex::query()->where('id', $id)->first();
        return view('product_card', [
            'item' => $item
        ]);
    }
}