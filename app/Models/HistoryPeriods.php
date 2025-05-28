<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPeriods extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // Приведення типів полів
    protected $casts = [
    ];

}
