<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Json;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'game_id',
        'started_at',
        'ended_at'
    ];
}
