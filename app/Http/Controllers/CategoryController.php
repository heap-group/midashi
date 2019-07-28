<?php

namespace MIDASHI\Http\Controllers;

use Illuminate\Http\Request;
use MIDASHI\Category;

class CategoryController extends Controller
{
    //
    public function remove(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/post');
    }
}
