<?php

namespace Api\Contracts;

use Illuminate\Database\Eloquent\Model;
use Api\Http\Resources\Api as ApiResource;
use Api\Http\Resources\ApiCollection as ApiResources;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryContract
{
    public function init(array $data);
    public function index();
    public function store();
    public function find($id);
    public function get($id);
    public function update($data, $id);
    public function destroy($id);
    public function resource(Model $model) : ApiResource;
    public function resources(Collection $model) : ApiResources;
}