<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'game_id' => $this->game_id,
            'name' => $this->name,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'winner_id' => $this->winner_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
