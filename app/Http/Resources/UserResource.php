<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'country' => $this->country_id,
            'state' => $this->state_id,
            'user_type'   => $this->user_type_id,
            'email'       => $this->email,
            'is_active'      => $this->is_active,
        ];
    }
}
