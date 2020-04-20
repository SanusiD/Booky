<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $primaryKey = 'noteId';

    protected $fillable = [
        'title', 'description'
    ];
}
