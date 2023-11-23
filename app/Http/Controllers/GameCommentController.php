<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use Illuminate\Http\Request;

class GameCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        GameComment::create($input);

        return back();
    }
}
