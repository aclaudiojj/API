<?php

namespace Api\Repositories;

use Api\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Api\Http\Resources\Api as ApiResource;
use Api\Http\Resources\ApiCollection as ApiResources;
use Illuminate\Database\Eloquent\Collection;
use Fouladgar\EloquentBuilder\EloquentBuilder;
use Illuminate\Support\Facades\Input;

abstract class Repository implements RepositoryContract
{

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @var array
     */
    protected $data;

    /**
     *
     * @return \Fouladgar\EloquentBuilder\EloquentBuilder
     */
    private function getBuilder()
    {
        return app()->make(EloquentBuilder::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function getModel()
    {
        return get_class($this->model);
    }

    /**
     *
     * @return array
     */
    private function getFilters()
    {
        return Input::except('page');
    }

    /**
     *
     * @return self
     */
    public function init(array $data)
    {
        $this->data = $data;

        $this->model = $this->model->newInstance($data);

        return $this;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return $this->resources($this->getBuilder()->to($this->getModel(), $this->getFilters())->paginate()->appends($this->getFilters()));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->model->save();

        return $this->resource($this->model);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->find($id) ?? $this->model;
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->resource($this->find($id));
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $id)
    {
        $model = $this->find($id)->fill($data);

        if (! $model->exists) {
            throw new \Symfony\Component\HttpKernel\Exception\BadRequestHttpException('Invalid resource');
        }

        $model->save();

        return $this->resource($model);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Api\Http\Resources\Api
     */
    abstract public function resource(Model $model) : ApiResource;

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Api\Http\Resources\ApiCollection
     */
    abstract public function resources(Collection $model) : ApiResources;
}
