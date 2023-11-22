<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagControllerAPI extends Controller
{
    // Retrieve all tags
    public function index()
    {
        $tags = Tag::all();

        return response()->json($tags);
    }

    // Create a new tag
    public function store(Request $request)
    {
        $tag = Tag::create($request->all());

        return response()->json(['status' => 'Success', 'message' => 'Tag created', 'data' => $tag]);
    }

    // Retrieve a specific tag
    public function show(Tag $tag)
    {
        return response()->json($tag);
    }

    // Update a tag
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return response()->json(['status' => 'Success', 'message' => 'Tag updated']);
    }

    // Delete a tag
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json(['status' => 'Success', 'message' => 'Tag deleted']);
    }
}
