<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->get();

        if(@empty($books)) {
            return Response::json(['data' => $books], 200);
        } else {
            return Response::json(['message' => '404 Not Found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $author = Book::create($data);

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
    public function show(Book $book)
    {
        $book = Book::find($book->id);

        if(@empty($author)) {
            return Response::json(['data' => $book], 200);
        } else {
            return Response::json(['message' => '404 Not Found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_contact_number'] = $request->country;
        $data['author_country'] = $request->country;
        $data['updated_at'] = Carbon::now();

        $book = Book::where('id', $book->id)->update($data);

        if($book) {
            return Response::json(['data' => 'Author Successfully Updated'], 201);
        } else {
            return Response::json(['message' => 'Something Went Wrong'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
