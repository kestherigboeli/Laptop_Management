<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $added_by = User::where('id', $this->added_by)->first();
        return [
            'id' => $this->id,
            'renewal_date' => $this->renewal_date,
            'returned_date' => $this->returned_date,
            'added_by' => $added_by->first_name. ' '. $added_by->last_name
//            'requested_by' => $this->user->first_name. ' ' .$this->user->last_name,
        ];
    }
}
