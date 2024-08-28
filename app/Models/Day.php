<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stage;
use App\Models\Travel;

class Day extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

}
