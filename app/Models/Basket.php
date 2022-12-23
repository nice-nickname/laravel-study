<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public $table = 'basket';
    public $timestamps = false;
    public $fillable = ['user_id', 'book_id'];

    public function book() {
        return $this->belongsTo(Books::class, 'book_id', 'id');
    }
}
