<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniqueTests;
use App\Models\UniqueTestsResults;
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
            return array('is_completed'=>$is_completed,'results'=>$utest->results);
        }
        else{
            $utest_result = UniqueTestsResult::create([
                'owner_id' => $request->owner_id, //Auth
                'test_id' => $utest->id,
                //'questions_id' => $request->questions_id,
                //'answers' => $request->answers,
                'is_completed'=>false,
            ]);
            $utest->update(['is_completed'=>true])->save();
            $utest->results;
            return $utest;
        }
    }


    
}