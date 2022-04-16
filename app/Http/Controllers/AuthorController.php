<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorCollection;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a list of all Authors.
     *
     * @return Response
     */
    public function index(): Response
    {
        $authors = Author::all();
        return Response(AuthorCollection::collection($authors),"200");
    }
    /**
     * Save a new Author into database.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|string",
        ]);
        if ($validator->fails()) {
            $errorText = $validator->messages()->first('*');
            return Response($errorText,"422");
        }
        $author = Author::create($request->all());
//        event(new NewAuthorAddedEvent($author)); todo : add event
        return Response($author,"200");
    }

    /**
     * Display the Author specified by id.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $author = Author::find($id);
        if(!$author){
            return Response("Not found!","404");
        }
        return Response(new AuthorCollection($author),"200");
    }

    /**
     * Update the Author based on given data.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {

        $author = Author::find($id);
        if (!$author){
            return Response("Not found","404");
        }
        $author->update($request->all());
        return Response(new AuthorCollection($author),"200");
    }

    /**
     * Remove the specified Author from database.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        Author::destroy($id);
        return Response("Successfully deleted",200);
    }


}
