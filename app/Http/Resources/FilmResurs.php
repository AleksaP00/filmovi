<?php

namespace App\Http\Resources;

use App\Models\Zanr;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $zanr = Zanr::find($this->zanrID);

        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'zanr' => $zanr->zanr,
            'reditelj' => $this->reditelj
        ];
    }
}
