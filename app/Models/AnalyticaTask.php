<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticaTask extends Model
{
    protected $table = 'analyticatasks';

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'api_id',
    ];
}
