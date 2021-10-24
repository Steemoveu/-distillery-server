<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniqueTests;
use App\Models\Results;
use App\Models\Answers;
use Illuminate\Support\Str;

class ResultController extends Controller
{    

    public function index()
    {
        $utest = Results::all();

        return $utest;
    }
    public function show($id)
    {
        return Results::find($id);
    }
    public function create(Request $request)
    {
        $utest = Results::create([
            'test_id' => $request->test_id,
            'info'=> $request->info,
        ]);
        return $utest;
    }
}