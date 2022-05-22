<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Json;

class Game extends Model
{
    use HasFactory;

    protected string $name;
    protected DateTime $created_at;

    public function getName()
    {
        return $this->name;
    }
}