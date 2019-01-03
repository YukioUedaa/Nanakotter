<?php
namespace App\UseCases\Tweet;

use App\Models\User;
use App\Repositories\TweetRepositoryInterface;

class UpdateTweet {

    private $tweetRepository;

    public function __construct(TweetRepositoryInterface $tweetRepository) {
        $this->tweetRepository = $tweetRepository;
    }

    public function __invoke(string $tweet, int $id): void {
        $this->tweetRepository->save($tweet, $id);
    }
}

