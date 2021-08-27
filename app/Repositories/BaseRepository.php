<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository{

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->model->update($attributes);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteById($id)
    {
        return $this->model->find($id)->delete();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function with(...$with): Builder
    {
        return $this->model->with($with);
    }

    public function where(...$where): Builder
    {
        return $this->model->where($where);
    }

    public function get(): Collection
    {
        return $this->model->get();
    }
}