<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;

class DictionaryController extends Controller
{
    // public function index()
    // {
    //     $dictionaries = Dictionary::orderBy('updated_at', 'desc')->get();
    //     return view('index', compact('dictionaries'));
    // }
    public function create()
    {
            return view('create');
    }
    public function store(Request $request)
    {
        Dictionary::create([
            'keyword' => $request->input('keyword'),
            'description' => $request->input('description'),
            'user_id' => 1,
        ]);
        return redirect('/');
    }
    public function index(Request $request)
    {
        $query = Dictionary::query();

        if ($request->filled('keyword')) {
            $search = $request->input('keyword');
            $query->where('keyword', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%");
        }

        $dictionaries = $query->orderBy('updated_at', 'desc')->get();

        return view('index', compact('dictionaries'));
    }
    public function update(Request $request, $id)
    {
        $dictionay = Dictionary::findOrFail($id);

        $dictionay->fill($request->only(['keyword', 'description']))->save();

        return redirect()->route('dictionaries.index');
    }
}
