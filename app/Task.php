<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'taskId';
    protected $fillable = ['tasktitle', 'taskDescription', 'isComplete', 'todoId'];
    
    public function todo()
    {
        return $this->belongsTo(Todo::class, 'taskId');
    }

}

    