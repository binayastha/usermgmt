<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;


class BaseRepository
{

    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}
