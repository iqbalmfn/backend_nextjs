<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {

        $books = Book::query()
            ->with('category')
            ->search($request->search)
            ->when($request->category, fn ($q) => $q->whereCategoryId($request->category))
            ->orderByDesc('id')
            ->paginate($request->perPage);

        // $data = BookResource::collection($books);

        return $this->sendResponse($books, "Successfully get books");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "category_id" => "required|numeric",
            "name"        => "required|min:4",
            "description" => "required|min:10|max:300",
            "price"       => "required",
            "image"       => "nullable|image|max:2048",
        ]);

        if ($validator->fails()) {
            return $this->sendError("Validation error", $validator->errors());
        }
        $input = $request->all();

        if ($request->image) {
          $uploadFile = $request->image;
          $filename = uniqid().".".$uploadFile->getClientOriginalExtension();
          $uploadFile->move(public_path(). '/images', $filename);
          $input['image'] = $filename;
        }
        $store = Book::create($input);

        return $this->sendResponse($store->load('category'), "Successfully add books");
    }

    public function show(Book $book)
    {
        return $this->sendResponse($book, "Successfully get book");
    }

    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            "category_id" => "required|numeric",
            "name"        => "required|min:4",
            "description" => "required|min:10|max:300",
            "price"       => "required"
        ]);

        if ($validator->fails()) {
            return $this->sendError("Validation error", $validator->errors());
        }

        $book->update($request->all());

        return $this->sendResponse($book->load('category'), "Book has been updated");
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return $this->sendResponse($book, "Book has been deleted");
    }
}
