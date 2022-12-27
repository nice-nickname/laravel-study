<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Basket;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Favorites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $req) {
        $pageSize = $req->query('pageSize', 16);
        $currentPage = $req->query('currentPage', 0);
        $books = Books::with('author')->get()->skip($pageSize * $currentPage)->take($pageSize);

        $authors = Authors::all();
        $categories = Categories::all();

        return view("index")->with(['books' => $books, 'authors' => $authors, 'categories' => $categories]);
    }

    public function about() {
        return view("about");
    }

    public function account() {
        $userId = Auth::user()->id;
        $favorites = Favorites::with(['book', 'book.author'])->where('user_id', '=', $userId)->get();
        $basket = Basket::with(['book', 'book.author'])->where('user_id', '=', $userId)->get();

        return view('user.account')->with(['favorites' => $favorites, 'basket' => $basket]);
    }

    public function bucket() {
        $items = Basket::with(['book', 'book.author'])->where('user_id', '=', Auth::user()->id)->get();

        $total = 0;
        foreach ($items as $i) {
            $total += $i->book->actual;
        }

        return view('user.basket')->with(['items' => $items, 'total' => $total]);
    }
}
