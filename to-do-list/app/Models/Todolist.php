<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $fillable = [
     'content',
     'completed',
     'deadline',
     'overdue',
    ];
    public function getFormattedDueDateAttribute()
    {
        return optional($this->due_date)->format('Y-m-d H:i:s'); // Adjust the format as needed
    }
}
