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



}
