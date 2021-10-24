<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answers;
use App\Models\Questions;

class QuestionsController extends Controller
{
    //
    public function index()
    {
        $questions = Questions::all();
        foreach($questions as $item)
        {
            $item->answers;
        }
        return $questions;
    }
    public function show($id)
    {
        $questions = Questions::find($id);
        $questions->answers;
        return $questions;
    }
    public function create(Request $request)
    {
        //answers_id
        //text
        //answers
        ///text
        ///is_correct
        

        //$questions_id = Questions::create(['text'->$request->question->text])->id;

        $questions = Questions::create([
            'text' => $request->question,
            'test_id' => $request->test_id
        ]);

        $answers_items = json_decode($request->answers);
        foreach($answers_items as $item_asr)
        {
            //return $item_asr;
            Answers::create([
                'text'=>$item_asr->text,
                'is_correct'=>$item_asr->is_correct,
                'questions_id'=>$questions->id]
            );
        }

        $questions->answers;

        return $questions;
    }
}
