<?php
namespace App\UseCases\Tweet;

use App\Models\User;
use App\Repositories\TweetRepositoryInterface;

class DeleteTweet {

    private $tweetRepository;

    public function __construct(TweetRepositoryInterface $tweetRepository) {
        $this->tweetRepository = $tweetRepository;
    }

    public function __invoke(int $deleteId): void {
        $this->tweetRepository->delete($deleteId);
    }
}

