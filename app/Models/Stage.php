<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Day;

class Stage extends Model
{
    use HasFactory;
    public $guarded = [];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
    
}
