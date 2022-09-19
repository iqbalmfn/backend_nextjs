<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
  public function index()
  {
    $books = Book::orderByDesc('id')->get();
    $data = BookResource::collection($books);

    return $this->sendResponse($data, "Successfully get books");
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "name"  => "required|min:4",
      "description" => "required|min:10|max:300",
      "price" => "required"
    ]);

    if ($validator->fails()) {
      return $this->sendError("Validation error", $validator->errors());
    }

    $store = Book::create($request->all());

    return $this->sendResponse($store, "Successfully add books");
  }

  public function show(Book $book)
  {
    //
  }

  public function edit(Book $book)
  {
    //
  }

  public function update(Request $request, Book $book)
  {
    //
  }

  public function destroy(Book $book)
  {
    //
  }
}
