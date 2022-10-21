<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class WorkerController extends Controller
{
public function index() {
    $workers=Worker::get();
    return view('create_worker', [
        'workers' => $workers
    ]);
}
public function saveWorker(Request $request) {
    $newWorker=new Worker();
    $newWorker->name=$request->name;
    $newWorker->profession_id=$request->profession_id;
    $newWorker->save();
    return redirect('/workers_list');
}
public function deleteWorker($id) {
    $worker=Worker::find($id);
    $worker->delete();
    return redirect('/workers_list');
}
}