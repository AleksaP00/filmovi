<?php

namespace App\Http\Resources;

use App\Models\Film;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjekcijaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $film = Film::find($this->filmID);

        return [
            'id' => $this->id,
            'film' => $film->naziv,
            'datum' => $this->datum,
            'sala' => $this->sala
        ];
    }
}
