<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $fillable =[
        'title',
        'description',
        'status',
        'due_date',
        'user_id'
    ];
    protected $table = 'todos';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
