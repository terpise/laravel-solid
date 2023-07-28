<?php

namespace Terpise\Solid\Contracts;

use Illuminate\Support\Collection;

/**
 * (I) Interface segregation principle
 * Only communicate with the database
 * Interface RepositoryInterface
 */
interface RepositoryInterface
{
    /**
     * Model
     *
     * @return Collection|array
     */
    public function getModel();

    /**
     * Table name
     *
     * @return Collection|array
     */
    public function getTable();

    /**
     * Model
     *
     * @return Collection|array
     */
    public function newQuery();

    /**
     * Retrieve data array for populate field select
     *
     * @param  string  $column
     * @param  string|null  $key
     * @return Collection|array
     */
    public function lists($column, $key = null);

    /**
     * Retrieve data array for populate field select
     * Compatible with Laravel 5.3
     *
     * @param  string  $column
     * @param  string|null  $key
     * @return Collection|array
     */
    public function pluck($column, $key = null);

    /**
     * Sync relations
     *
     * @param  bool  $detaching
     * @return mixed
     */
    public function sync($id, $relation, $attributes, $detaching = true);

    /**
     * SyncWithoutDetaching
     *
     * @return mixed
     */
    public function syncWithoutDetaching($id, $relation, $attributes);

    /**
     * Retrieve all data of repository
     *
     * @param  array  $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Retrieve all data of repository, paginated
     *
     * @param  null  $limit
     * @param  array  $columns
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*']);

    /**
     * Retrieve all data of repository, simple paginated
     *
     * @param  null  $limit
     * @param  array  $columns
     * @return mixed
     */
    public function simplePaginate($limit = null, $columns = ['*']);

    /**
     * Find data by id
     *
     * @param  array  $columns
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * Find data by field and value
     *
     * @param  array  $columns
     * @return mixed
     */
    public function findByField($field, $value, $columns = ['*']);

    /**
     * Find data by multiple values in one field
     *
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = ['*']);

    /**
     * Find data by excluding multiple values in one field
     *
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = ['*']);

    /**
     * Find data by between values in one field
     *
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereBetween($field, array $values, $columns = ['*']);

    /**
     * Save a new entity in repository
     *
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a entity in repository by id
     *
     *
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * Update or Create an entity in repository
     *
     *
     * @return mixed
     *
     * @throws ValidatorException
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Delete a entity in repository by id
     *
     *
     * @return int
     */
    public function delete($id);

    /**
     * Order collection by a given column
     *
     * @param  string  $column
     * @param  string  $direction
     * @return $this
     */
    public function orderBy($column, $direction = 'asc');

    /**
     * Load relations
     *
     *
     * @return $this
     */
    public function with($relations);

    /**
     * Load relation with closure
     *
     * @param  string  $relation
     * @param  closure  $closure
     * @return $this
     */
    public function whereHas($relation, $closure);

    /**
     * Add subselect queries to count the relations.
     *
     * @param  mixed  $relations
     * @return $this
     */
    public function withCount($relations);

    /**
     * Set hidden fields
     *
     *
     * @return $this
     */
    public function hidden(array $fields);

    /**
     * Set visible fields
     *
     *
     * @return $this
     */
    public function visible(array $fields);

    /**
     * Query Scope
     *
     *
     * @return $this
     */
    public function scopeQuery(\Closure $scope);

    /**
     * Reset Query Scope
     *
     * @return $this
     */
    public function resetScope();

    /**
     * Get Searchable Fields
     *
     * @return array
     */
    public function getFieldsSearchable();

    /**
     * Retrieve first data of repository, or return new Entity
     *
     *
     * @return mixed
     */
    public function firstOrNew(array $attributes = []);

    /**
     * Retrieve first data of repository, or create new Entity
     *
     *
     * @return mixed
     */
    public function firstOrCreate(array $attributes = []);

    /**
     * Trigger static method calls to the model
     *
     *
     * @return mixed
     */
    public static function __callStatic($method, $arguments);

    /**
     * Trigger method calls to the model
     *
     * @param  string  $method
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($method, $arguments);
}
