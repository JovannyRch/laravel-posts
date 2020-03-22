<?php

namespace App\Http\Controllers\api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return response()->json($categories, 200);
    }

    public function all(){
        $categories = Category::all();
        return response()->json($categories, 200);
    }
}
