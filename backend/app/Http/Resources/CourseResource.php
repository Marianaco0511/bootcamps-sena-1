<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CourseResource extends JsonResource
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
            'title' =>Str::upper($this ->title),
            'id' => $this -> id , 
            'description' => $this-> description,
            'weeks' => $this->enroll_cost,
            'minimum_skill' => $this->minimum_skill,
            'bootcamp_id'  => $this->boorcamp_id
          ];
    }
}
