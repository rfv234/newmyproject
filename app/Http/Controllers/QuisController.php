<?php


namespace App\Http\Controllers;


use App\Result;
use Illuminate\Http\Request;
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
    public function showQuis($id)
    {
        $quis = Quis::query()
            ->where('id', $id)
            ->first();
        return view('quis', [
            'quis'=>$quis
        ]);
    }
    public function saveResult(Request $request)
    {
        $result = $request->all();
        $json = json_encode($result);
        $newResult = new Result();
        $newResult->result=$json;
        $newResult->save();
        return redirect('/quis');
    }
    public function saveQuis(Request $request)
    {
        $quis = Quis::query()
            ->where('id', $request->id)
            ->first();
        $quis->name = $request->newName;
        $quis->save();
    }
    public function editQuis($id)
    {
        $quis = Quis::query()
            ->where('id', $id)
            ->first();
        return view('editQuis', [
            'quis'=>$quis
        ]);
    }
}