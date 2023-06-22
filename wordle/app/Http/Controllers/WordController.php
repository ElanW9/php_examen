<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use App\Rules\ValidWord;
use App\Models\Word;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();
        return view('words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('words.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'word' => ['required', 'size:5'],
            // 'word' => ['required', 'size:5', new ValidWord],
            'sheduled_at' => ['required', 'date', 'after_or_equal:today', Rule::unique('words', 'sheduled_at')],
        ]);

        $sheduledDate = date('Y-m-d', strtotime($request->get('sheduled_at')));

        $word = new Word([
            'word' => $request->get('word'),
            'sheduled_at' => $sheduledDate,
        ]);

        $word->save();

        return redirect('words')->with('success', 'Word saved!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $word = Word::find($id);
        return view('words.edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'word' => 'required|size:5',
            // 'word' => ['required', 'size:5', new ValidWord],
            'sheduled_at' => ['required', 'date', 'after_or_equal:today', Rule::unique('words', 'sheduled_at')],
        ]);

        $sheduledDate = date('Y-m-d', strtotime($request->get('sheduled_at')));

        $word = Word::find($id);
        $word->word = $request->get('word');
        $word->sheduled_at = $sheduledDate;

        $word->save();

        return redirect('/words')->with('success', 'Word updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $word = Word::find($id);
        $word->delete();
        return redirect('/words')->with('success', 'Word deleted!');
    }
}
