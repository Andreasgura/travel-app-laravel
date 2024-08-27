<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Day;


class Travel extends Model
{
    use HasFactory;

    public function days()
    {
        return $this->hasMany(Day::class);
    }
}
