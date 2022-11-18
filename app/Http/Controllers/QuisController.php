<?php


namespace App\Http\Controllers;


use App\Quis;

class QuisController extends Controller
{
    public function index()
    {
        $quises = Quis::query()
            ->get();
        //dd($quises[0]->questions);
        return view('quises', [
            'quises' => $quises
        ]);
    }
    public function second()
    {
        $quis = Quis::query()
            ->get();
        return view('quises', [
            'quis'=>$quis
        ]);
    }
}