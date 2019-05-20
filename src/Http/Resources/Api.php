<?php

namespace Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Api\Contracts\ResourceContract;

abstract class Api extends JsonResource implements ResourceContract
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
