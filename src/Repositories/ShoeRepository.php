<?php

namespace Api\Repositories;

use Api\Entities\Shoe;
use Illuminate\Database\Eloquent\Model;
use Api\Http\Resources\Shoe as ShoeResource;
use Api\Http\Resources\Shoes as ShoesResource;
use Api\Http\Resources\Api as ApiResource;
use Api\Http\Resources\ApiCollection as ApiResources;
use Illuminate\Database\Eloquent\Collection;

class ShoeRepository extends Repository
{   

    /**
     *
     * @param  \Api\Entities\Shoe $shoe
     */
    public function __construct(Shoe $shoe)
    {
        $this->model = $shoe;
    }

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Api\Http\Resources\Api
     */
    public function resource(Model $shoe) : ApiResource
    {
        return new ShoeResource($shoe);
    }

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Api\Http\Resources\ApiCollection
     */
    public function resources($shoes) : ApiResources
    {
        return new ShoesResource($shoes);
    }

}