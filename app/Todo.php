<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $primaryKey = 'todoId';
    public $table = "todolist";
    protected $fillable = ['todoId','taskTitle','taskDescription','isComplete'];
    public function tasks()
    {
        return $this->hasMany(Task::class, 'todoId');

    }
    
    
}


