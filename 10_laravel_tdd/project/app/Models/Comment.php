<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;

    public $table="comments";

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

}
