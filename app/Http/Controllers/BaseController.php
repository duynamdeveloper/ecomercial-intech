<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquent\Category;

class BaseController extends Controller
{
    public function __construct()
  {
    //its just a dummy data object.
    $categories = Category::all();

    // Sharing is caring
    View::share('categories', $categories);
  }
}
