<?php
namespace App\UseCases\Tweet;

use App\Models\User;
use App\Repositories\TweetRepositoryInterface;

class AddTweet {

    private $tweetRepository;

    public function __construct(TweetRepositoryInterface $tweetRepository) {
        $this->tweetRepository = $tweetRepository;
    }

    public function __invoke(array $tweetData, User $user): void {
        $this->tweetRepository->add($tweetData, $user->id);
    }
}

