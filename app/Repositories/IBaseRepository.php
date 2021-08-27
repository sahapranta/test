<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository{

    public function create(array $attributes): Model;
    public function update(int $id, array $attributes): bool;
    public function find($id);
    public function deleteById($id);
    public function all(): Collection;
    public function with(...$with): Builder;
    public function where(...$where): Builder;
    public function get(): Collection;
}