<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Profession;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        $newWorker->age = $request->age;
        $newWorker->save();

        return redirect('/');
    }

    public function deleteWorker($id)
    {
        Worker::findOrFail($id)->delete();

        return redirect('/');
    }

    public function editWorker($id)
    {
        $worker = Worker::where("id", $id)->first();
        $profession = Profession::orderBy('created_at', 'asc')->get();
        return view('edit_worker', [
            'worker' => $worker,
            'professions' => $profession
        ]);
    }

    public function store(Request $request)
    {
        $newWorker = Worker::where("id", $request->id)->first();
        $newWorker->name = $request->name;
        $newWorker->profession_id = $request->profession_id;
        $newWorker->age = $request->age;
        $newWorker->save();

        return redirect('/');
    }

    public function test()
    {
        $cars = collect(
            [
                'Артем' => [
                    'name' => 'волга',
                    'year' => 2000
                ],
                'Илья' => [
                    'name' => 'kia',
                    'year' => 2013
                ],
                'Андрей' => [
                    'name' => 'жигуль',
                    'year' => 2010
                ],
                'Алексей' => [
                    'name' => 'toyota',
                    'year' => 2015
                ]]
        );
        dd($cars->sortBy(function ($car, $owner) {
            return -$car['year'];
        }));
    }

    public function rasp()
    {
        $lessons = Lesson::query()
            ->get()
            ->sortBy('day');
        $days = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница'
        ];
        return view('lessons', [
            'lessons' => $lessons,
            'days' => $days
        ]);
    }
}