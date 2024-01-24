<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagApiRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $tags = Tag::paginate($perPage);

        return $tags;
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function store(TagApiRequest $request)
    {
        $tag = Tag::create($request->all());

        return $tag;
    }

    public function update(TagApiRequest $request, Tag $tag)
    {
        $tag->update($request->all());

        return $tag;
    }

    // Delete a tag
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
