<?php


namespace App\Http\Controllers;


use App\QuisAnswers;
use App\QuisQuestions;
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
            'quis' => $quis
        ]);
    }

    public function showQuis($id)
    {
        $quis = Quis::query()
            ->where('id', $id)
            ->first();
        return view('quis', [
            'quis' => $quis
        ]);
    }

    public function saveResult(Request $request)
    {
        $result = $request->all();
        $json = json_encode($result);
        $newResult = new Result();
        $newResult->result = $json;
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
        return redirect('quis');
    }

    public function editQuis($id)
    {
        $quis = Quis::query()
            ->where('id', $id)
            ->first();
        return view('editQuis', [
            'quis' => $quis
        ]);
    }

    public function editQuest($id)
    {
        $quest = QuisQuestions::query()
            ->where('id', $id)
            ->first();
        return view('edit_questions', [
            'quest' => $quest
        ]);
    }

    public function saveQuest(Request $request)
    {
        $quest = QuisQuestions::query()
            ->where('id', $request->id)
            ->first();
        $quest->text = $request->editQuest;
        $quest->save();
        return redirect('quis');
    }

    public function editAnswers($id)
    {
        $answers = QuisAnswers::query()
            ->where('id', $id)
            ->first();
        return view('edit_answers', [
            'answers' => $answers
        ]);
    }

    public function saveAnswers(Request $request)
    {
        $answers = QuisAnswers::query()
            ->where('id', $request->id)
            ->first();
        $answers->text = $request->editAnswers;
        $answers->save();
        return redirect('quis');
    }

    public function createQuis()
    {
        return view('create_quis');
    }

    public function saveNewQuis(Request $request)
    {
        $newQuis = new Quis();
        $newQuis->name = $request->createQuis;
        $newQuis->save();
        return redirect('quis');
    }

    public function createQuest($quis_id)
    {
        $quis = Quis::query()
            ->where('id', $quis_id)
            ->first();
        return view('create_quest', [
            'quis' => $quis
        ]);
    }

    public function saveNewQuest(Request $request)
    {
        $newQuest = new QuisQuestions();
        $newQuest->text = $request->createQuest;
        $newQuest->quis_id = $request->quis_id;
        $newQuest->save();
        return redirect('quis');
    }
    public function createAnswer($quis_questions_id)
    {
        $questions = QuisQuestions::query()
            ->where('id', $quis_questions_id)
            ->first();
        return view('create_answer', [
            'questions' => $questions
        ]);
    }

    public function saveNewAnswer(Request $request)
    {
        $newAnswer = new QuisAnswers();
        $newAnswer->text = $request->createAnswer;
        $newAnswer->quis_questions_id = $request->questions_id;
        $newAnswer->save();
        return redirect('quis');
    }
}