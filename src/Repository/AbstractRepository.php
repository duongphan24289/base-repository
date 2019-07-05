<?php

namespace BaseRepository\Repository;

use BaseRepository\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function find(array $conditions = [])
    {
        return $this->model->where($conditions)->get();
    }

    /**
     * @inheritDoc
     */
    public function findOne(array $conditions)
    {
        return $this->model->where($conditions)->first();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return get_class($this->model);
    }

    /**
     * @inheritDoc
     */
    public function makeModel()
    {
        $this->model = App::make($this->model());

        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function resetModel()
    {
        return $this->makeModel();
    }
}