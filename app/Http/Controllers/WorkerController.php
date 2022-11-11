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
                'Артем'=>[
                'name' => 'волга',
                'year' => 2000
            ],
                'Илья'=>[
                    'name' => 'kia',
                    'year' => 2013
                ],
                'Андрей'=>[
                    'name' => 'жигуль',
                    'year' => 2010
                ],
                'Алексей'=> [
                    'name' => 'toyota',
                    'year' => 2015
                ]]
        );
        dd($cars->sortBy(function ($car, $owner) {
            return -$car['year'];
        }));
    }
    public function rasp() {
//        $lessons = collect(
//            [
//                '9 класс'=>[
//                    'рус яз',
//                    'алгебра',
//                    'геом',
//                    'геогр'
//                ],
//                '8 класс'=>[
//                    'литер',
//                    'алгебра',
//                    'физ-ра',
//                    'обж'
//                ],
//                '7 класс'=>[
//                    'общество',
//                    'алгебра',
//                    'история'
//                ]
//            ]
//        );
//        dd($lessons->sortByDesc(function ($lesson, $class){
//            return $class;
//        }));
        $lessonsMonday=Lesson::query()
            ->where('day', 1)
            ->get();
        return view('lessons', [
            'lessons'=>$lessonsMonday
        ]);
        $lessonsTuesday=Lesson::query()
            ->where('day', 2)
            ->get();
        return view('lessons', [
            'lessons'=>$lessonsTuesday
        ]);
        $lessonsWednesday=Lesson::query()
            ->where('day', 3)
            ->get();
        return view('lessons', [
            'lessons'=>$lessonsWednesday
        ]);
        $lessonsThursday=Lesson::query()
            ->where('day', 4)
            ->get();
        return view('lessons', [
            'lessons'=>$lessonsThursday
        ]);
        $lessonsFriday=Lesson::query()
            ->where('day', 5)
            ->get();
        return view('lessons', [
            'lessons'=>$lessonsFriday
        ]);
    }
}