<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $fillable = ['title', 'status_id', 'start_date', 'due_date', 'priority', 'user_id', 'description', 'created_by', 'asssigned_to'];
}
