<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'director' => $this->director,
            'releaseDate' => $this->release_date,
            'synopsis' => $this->synopsis,
            'imgPath' => $this->img_path,
            'numOfVote' => $this->num_of_vote,
            'voteValue' => $this->vote_value,
            'categories' => $this->categories->pluck('id')->toArray(),
            'ratings' => $this->ratings->pluck('rate_value')->toArray(),
        ];
    }
}
