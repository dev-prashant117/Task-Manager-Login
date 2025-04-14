<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'title',       
        'description', 
        'status',      // Same for status or other fields you are using
        'due_date',      // Same for status or other fields you are using
        // 'user_id'
    ];

    // Optionally, disable timestamps if your table doesn't have created_at and updated_at columns
    public $timestamps = true;  // 
}
