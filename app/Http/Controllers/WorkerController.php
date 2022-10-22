<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;
use App\Profession;

class WorkerController extends Controller
{
    public function index()
    {
        return view('create_worker', [
            'workers' => Worker::orderBy('created_at', 'asc')->get(),
            'professions' => Profession::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function saveWorker(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $newWorker = new Worker;
        $newWorker->name = $request->name;
        $newWorker->profession_id = $request->profession_id;
        $newWorker->save();

        return redirect('/');
    }

    public function deleteWorker($id)
    {
        Worker::findOrFail($id)->delete();

        return redirect('/');
    }
}