<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        if(@empty($authors)) {
            return Response::json(['data' => $authors], 200);
        } else {
            return Response::json(['message' => '404 Not Found'], 404);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_contact_number'] = $request->country;
        $data['author_country'] = $request->country;
        $data['created_at'] = Carbon::now();


        $rules = array(
            'author_name' => 'required',
            'author_contact_number' => 'required',
            'author_country' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $validator->errors();
        } else {
            $author = Author::create($data);

            if($author) {
                return Response::json(['data' => 'Author Successfully Created'], 201);
            } else {
                return Response::json(['message' => 'Something Went Wrong'], 404);
            }
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author = Author::find($author->id);

        if(@empty($author)) {
            return Response::json(['data' => $author], 200);
        } else {
            return Response::json(['message' => '404 Not Found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_contact_number'] = $request->country;
        $data['author_country'] = $request->country;
        $data['updated_at'] = Carbon::now();

        $author = Author::where('id', $author->id)->update($data);

        if($author) {
            return Response::json(['data' => 'Author Successfully Updated'], 201);
        } else {
            return Response::json(['message' => 'Something Went Wrong'], 404);
        }
    }

    // Search for an Author
    public function search($term) {
        $author = Author::where('author_name', $term);

        if($author) {
            return Response::json(['data' => $author], 200);
        } else {
            return Response::json(['message' => 'Author Not Found'], 404);
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author = Author::where('id', $author->id())->delete();

        if($author) {
            return Response::json(['data' => 'Author Successfully Deleted'], 200);
        } else {
            return Response::json(['message' => 'Something Went Wrong'], 404);
        }
    }
}
