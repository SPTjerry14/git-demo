<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Repositories
 * @author Joker20 <manh.kiddihub@gmail.com>
 */
class Repository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Find records
     *
     * @param array|Closure $where Conditions to find suitable records
     * @param string $select Fields will be selected
     * @param integer|null $paginate Paginate all records
     * @return \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function find($where, $select = "*", int $paginate = null)
    {
        return $this->safe(function () use ($where, $select, $paginate) {
            $query = $this->model->select($select)->where($where);
            return is_null($paginate) ? $query->get() : $query->paginate($paginate);
        });
    }

    /**
     * Find first record match conditions
     *
     * @param array|Closure $where Conditions to find suitable record
     * @param string|array $select Fields will be selected
     * @param bool $firstOrFail If true, throw CustomException in case not found
     * @return \Illuminate\Database\Eloquent\Model|null
     * @throws \App\Exceptions\CustomException
     */
    public function first($where, $select = "*", $firstOrFail = true)
    {
        return $this->safe(function () use ($where, $select, $firstOrFail) {
            $query = $this->model->select($select)->where($where);
            return $firstOrFail ? $query->firstOrFail() : $query->first();
        });
    }

    /**
     * Create a record
     * @param array $params Parameters to create a record base on type of record
     */
    public function store(array $params): \Illuminate\Database\Eloquent\Model
    {
        return $this->safe(function () use ($params) {
            $record = $this->model->create($params);
            return $record;
        });
    }

    public function show(int $id, string $idName = 'id'): \Illuminate\Database\Eloquent\Model
    {
        return $this->model->where($idName, '=', $id)->first();
    }

    public function update(array $params, int $id, string $idName = 'id'): int
    {
        return $this->safe(function () use ($params, $id, $idName) {
            return $this->model->where($idName, '=', $id)->update($params);
        });
    }

    public function destroy($id): int
    {
        return $this->safe(function () use ($id) {
            return $this->model->where('id', $id)->delete();
        });
    }

    public function safe(\Closure $callback)
    {
        try {
            return $callback();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new \App\Exceptions\CustomException('NOT_FOUND');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode()==1062||$e->getCode()==23000) {
                throw new \App\Exceptions\CustomException('EXISTED');
            }
        }
    }
}
