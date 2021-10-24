<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tests;
use App\Models\Questions;
use App\Models\Answers;

class TestsController extends Controller
{
    public function index()
    {
        $tests = Tests::all();

        foreach($tests->questions as $item_questions){
            $item_questions->answers;
            //answers
        }

        return $tests;
    }
    public function show($id)
    {
        $tests = Tests::find($id);

        foreach($tests->questions as $item_questions){
            
            foreach($item_questions->answers as $item_answers)
            {
                $item_answers['isSelected'] = false;
            }
            //answers
        }

        return $tests;
    }
    public function create(Request $request)
    {
        $tests = Tests::create([
            'text' => $request->text,
            'vacancy_id'=> $request->vacancy_id,
            'info'=>$request->info,
        ]);

        foreach($request->questions as $item_questions)
        {
            $question_id = Questions::create([
                'text' => $item_questions['text'],
                'type'=> $item_questions['type'],
                'test_id' => $tests->id
            ])->id;

            if($item_questions['type'] != 'info'){
                foreach($item_questions['answers'] as $item_asr)
                {
                    //return $item_asr;
                    Answers::create([
                    'text'=>$item_asr['text'],
                    'is_correct'=>$item_asr['is_correct'],
                    'question_id'=>$question_id]);
                }
            }
        }
        $tests->questions;
        return $tests;
    }
}