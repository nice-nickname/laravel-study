<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Basket;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Favorites;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    public function books(Request $req) {
        $authors = $req->input('authors', Authors::all('id'));
        $categories = $req->input('categories', Categories::all('id'));
        $discount = $req->input('with_discount', "false");
        $hasComments = $req->input("with_comments", "false");
        $highRate = $req->input('with_high_rating', "false");
        $search = $req->input('search', '');

        $sort = $req->input('order_type', 'name');
        $by = $req->input('order_by', 'asc');

        $pageSize = $req->input('page_size', 12);
        $currentPage = $req->input('current_page', 0);

        $result = Books::with(['categories', 'author', 'comments', 'comments.user'])
                ->where('discount', $discount == "false" ? ">=" : ">", 0)
                ->whereIn('author_id', $authors)
                ->whereHas('categories', fn($q) => $q->whereIn('categories.id', $categories))
                ->whereHas('comments',  null, $hasComments == "false" ? ">=" : ">", 0)
                ->orderBy($sort, $by)
                ->get()
                ->filter(fn ($b) => $b->rate >= ($highRate == "false" ? 0 : 70))
                ->filter(fn ($b) => $search != '' ? Str::contains($b->name, $search) : true)
                ->skip($pageSize * $currentPage)
                ->take($pageSize)
                ;
        if ($search != '') {
            
        }

        return view("books")->with('books', $result);
    }

    public function book(Request $req) {
        $res = Books::with(['author', 'comments'])->find($req->query('id'));
        $isInBasket = false;
        $isInFavorite = false;
        if (Auth::check()) {
            $isInFavorite = Favorites::all()->where('book_id', '=', $res->id)->where('user_id', '=', Auth::user()->id)->count() != 0;
            $isInBasket = Basket::all()->where('book_id', '=', $res->id)->where('user_id', '=', Auth::user()->id)->count() != 0;
        }

        return view('book')->with(['book' => $res, 'isInFavorite' => $isInFavorite, 'isInBasket' => $isInBasket]);
    }

    public function post_comment(Request $req) {
        $redirect_url = $req->input('redirect_url');
        $text = $req->input('text', '');
        $recommend = $req->input('recommend');
        $bookId = $req->input('book_id');
        
        if (Str::length($text) == 0) {
            return redirect($redirect_url)->withErrors(['text' => 'Комментарий не должен быть пустым!']);
        }

        Comments::create([
            'user_id' => Auth::user()->id,
            'book_id' => $bookId,
            'comment' => $text,
            'recommend' => $recommend
        ]);

        return redirect($redirect_url);
    }

    public function mark_favorite(Request $req) {
        $redirect_url = $req->input('redirect_url');
        $id = $req->query('id');
        $userId = Auth::user()->id;
        $delete = $req->input('delete', false);

        $f = Favorites::all()->where('user_id', '=', $userId)->where('book_id', '=', $id);

        if ($f->count() != 0) {
            if (!$delete) {
                Favorites::destroy($f);    
            }
            return redirect($redirect_url);
        }

        Favorites::create([
            'user_id' => Auth::user()->id,
            'book_id' => $id
        ]);

        return redirect($redirect_url);
    }

    public function mark_basket(Request $req) {
        $redirect_url = $req->input('redirect_url');
        $id = $req->query('id');
        $userId = Auth::user()->id;

        $b = Basket::all()->where('user_id', '=', $userId)->where('book_id', '=', $id);
        if ($b->count() != 0) {
            Basket::destroy($b);
            return redirect($redirect_url);
        }

        Basket::create([
            'user_id' => $userId,
            'book_id' => $id
        ]);

        return redirect($redirect_url);
    }
}
