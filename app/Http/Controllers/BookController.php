<?php

namespace App\Http\Controllers;


use App\Http\Resources\BookCollection;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a list of all Books.
     *
     * @return Response
     */
    public function index(): Response
    {
        $books = Book::with("author")->get();
        return Response(BookCollection::collection($books),"200");
    }

    /**
     * Save a new Book into database.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|string",
            "author_id" => 'nullable|numeric|exists:Authors,id',
        ]);
        if ($validator->fails()) {
            $errorText = $validator->messages()->first('*');
            return Response($errorText,"422");
        }
        $book = Book::create($request->all());
//        event(new NewBookAddedEvent($product)); // todo
        return Response($book,"200");
    }

    /**
     * Display the Book specified by id.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return Response(new BookCollection(Book::with("author")->find($id)),"200");
    }

    /**
     * Update the Book based on given data.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $validator = Validator::make($request->all(),[
            "author_id" => 'nullable|numeric|exists:Authors,id',
        ]);
        if ($validator->fails()) {
            $errorText = $validator->messages()->first('*');
            return Response($errorText,"422");
        }
        $book = Book::find($id);
        if (!$book){
            return Response("Not found","404");
        }
        $book->update($request->all());
        return Response(new BookCollection($book),"200");
    }

    /**
     * Remove the specified Book from database.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        Book::destroy($id);
        return Response("Successfully deleted",200);
    }
}
