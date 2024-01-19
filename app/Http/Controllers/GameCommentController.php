<?php

namespace App\Http\Controllers;

use App\Models\GameComment;
use App\Services\ProfanityFilter;
use Illuminate\Http\Request;

class GameCommentController extends Controller
{
    public function store(Request $request)
    {
        $profanityFilter = new ProfanityFilter();

        $request->validate([
            'body' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['body'] = $profanityFilter->filter($input['body']);
        GameComment::create($input);

        return back();
    }
}
