<?php

namespace App\Repositories;

use App\Entities\Eloquents\Tweet;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class AddressRepository.
 *
 * @package namespace App\Repositories;
 */
class TweetRepository implements TweetRepositoryInterface
{

    private $tweet;

    public function __construct(Tweet $tweet) {
        $this->tweet = $tweet;
    }

    public function findAll(): Collection {
        return $this->tweet
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function add(array $data, int $memberId): void {
        $data['user_id'] = $memberId;
        $this->tweet->create($data);
    }

    public function delete(int $id): void {
        $this->tweet->where('id', $id)->delete();
    }

    public function findById(int $id): Tweet {
        return $this->tweet
        ->where('id', $id)
        ->first();
    }

    public function save(string $tweet, int $id): void {
        $editData = $this->tweet
                    ->where('id',$id)
                    ->first();
        $editData->tweet = $tweet;
        $editData->save();
    }

}
