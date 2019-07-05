<?php

namespace BaseRepository\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Find all records that match a give conditions
     *
     * @param array $conditions
     *
     * @return Model[]
     */
    public function find(array $conditions = []);

    /**
     * Find a specific record that matches a give conditions
     *
     * @param array $conditions
     *
     * @return Model
     */
    public function findOne(array $conditions);

    /**
     * Find a specific record by its ID
     *
     * @param int $id
     *
     * @return Model
     */
    public function findById(int $id);

//    public function create(array $attributes);
//
//    public function update(Model $model, array $attributes = []);
//
//    public function save(Model $model);
//
//    public function delete(Model $model);
//
//    public function get($query);
//
//    public function destroy(array $ids);
//
//    public function findCount(array $conditions);
//
//    public function toBase($query);

    /**
     * Get Model
     *
     * @return Model
     */
    public function model();

    /**
     * Make new Model
     *
     * @return Model
     */
    public function makeModel();

    /**
     * Reset model query
     *
     * @return void
     */
    public function resetModel();
}