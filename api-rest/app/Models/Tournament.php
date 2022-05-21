<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Json;

class Ranking extends Model
{
    use HasFactory;

    protected string $name;
    protected DateTime $started_at;
    protected DateTime $ended_at;
    protected User $winner;

    public function getName()
    {
        return $this->name;
    }

    public function getStartedDateTime()
    {
        return $this->started_at;
    }

    public function getEndedDateTime()
    {
        return $this->ended_at;
    }

    public function setWinner(User $Winner)
    {
        $this->winner = $Winner;
    }

    public function getWinner()
    {
        return $this->winner;
    }
}
