<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo(Authors::class, 'author_id', 'id');
    }

    public function categories() {
        return $this->hasManyThrough(Categories::class, BookCategories::class, 'book_id', 'id', 'id', 'category_id');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'book_id', 'id');
    }


    protected $appends = ['rate', 'actual'];

    public function getActualAttribute() {
        return $this->price * (100 - $this->discount) / 100;
    }

    public function getRateAttribute() {
        $positive = Comments::all()->where('recommend', '=', '1')->where('book_id', '=', $this->id)->count();
        $negarive = Comments::all()->where('recommend', '=', '0')->where('book_id', '=', $this->id)->count();
        if ($negarive == 0 && $positive == 0) {
            return 100;
        }
        if ($negarive == 0) {
            return 100;
        }
        if ($positive == 0) {
            return 0;
        }
        
        return intval($positive / ($positive + $negarive) * 100);
    }
}
