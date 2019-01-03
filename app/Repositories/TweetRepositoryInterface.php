<?php

namespace App\Repositories;

use App\Entities\Eloquents\Tweet;
use Illuminate\Database\Eloquent\Collection;


/**
 * Interface TweetRepositoryInterface.
 *
 * @package namespace App\Repositories;
 */
interface TweetRepositoryInterface
{

    public function findAll(): Collection;

    public function add(array $data, int $memberId): void;

    public function delete(int $id): void;

    public function findById(int $id): Tweet;

    public function save(string $data, int $id): void;

}
