<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dictionary;
use App\Http\Requests\DictionaryRequest;

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
    public function store(DictionaryRequest $request)
    {
        Dictionary::create([
            'keyword' => $request->input('keyword'),
            'description' => $request->input('description'),
            'user_id' => Auth::id(),
        ]);
        return redirect('/')->with('message', '登録しました');
    }
    public function index(Request $request)
    {
        $query = Dictionary::query();

        if ($request->filled('keyword')) {
            $search = $request->input('keyword');
            $query->where('keyword', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%");
        }

        $dictionaries = $query->orderBy('updated_at', 'desc')->paginate(4);

        return view('index', compact('dictionaries'));
    }
    public function update(DictionaryRequest $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);

        //本人以外は禁止
        if ($dictionary->user_id !== auth()->id()) {
            abort(403, '権限がありません');
        }

        $dictionary->fill($request->only(['keyword', 'description']));
        $dictionary->save();

        return redirect('/')->with('message', '更新しました');
    }
    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        //本人以外は禁止
        if ($dictionary->user_id !== auth()->id()) {
            abort(403, '権限がありません');
        }
        $dictionary->delete();

        return redirect('/')->with('message', '削除しました');
    }
}
