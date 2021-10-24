<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniqueTests;
use App\Models\UniqueTestsResults;
use App\Models\Answers;
use Illuminate\Support\Str;

class UniqueTestsController extends Controller
{    
    /*
    public function index()
    {
        $vacancies = UniqueTests::all();
        foreach($vacancies as $item)
        {
            $item->tests;
        }
        return $vacancies;
    }*/
    public function show($id)
    {
        return interaction($request);
    }
    public function create(Request $request)
    {
        $utest = UniqueTests::create([
            'owner_id' => $request->owner_id, //Auth
            'test_id' => $request->test_id,
            'hash'=> Str::random($length = 32),
            'is_completed'=>false,
        ]);
        return $utest;
    }

    public function update(Request $request)
    {
        return interaction($request);
    }
    public function interaction(Request $request)
    {
        $utest = UniqueTests::find($request->hash);
        if($utest->is_completed)
        {
            return array('is_completed'=>$is_completed, 'score' => $utest->score,'results'=>$utest->results);
        }
        else{
            /*$uscore = 0;
            foreach($request->data->questions as $item)
            {
                foreach($ite->answers as $item_answer) 
                {
                    if($item_answer->isSelector){
                        if($item_answer->isSelector == Answers::find($item->id)->is_correct) $uscore++;
                    }
                }
            }*/


            $utest_result = UniqueTestsResult::create([
                'unique_test_id' => $utest->id,
                'score' => $uscore,
                'data' => $request->data,
            ]);


            $utest->update(['is_completed'=>true])->save();
            $utest->results;
            return $utest;
        }
    }
}