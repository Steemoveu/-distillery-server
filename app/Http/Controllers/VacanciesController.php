<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;

class VacanciesController extends Controller
{
    public function index()
    {
        $vacancies = Vacancies::all();
        foreach($vacancies as $item)
        {
            $item->tests;
        }
        return $vacancies;
    }
    public function show($id)
    {
        $vacancies = Vacancies::find($id);
        $vacancies->tests;
        return $vacancies;
    }
    public function create(Request $request)
    {
        $vacancies = Vacancies::create([
            'text' => $request->name,
        ]);
        
        return $vacancies;
    }

    public function delete(Request $request)
    {
        $vacancies = Vacancies::delete([
            'id' => $request->vacancies_id,
        ]);
    }
}
