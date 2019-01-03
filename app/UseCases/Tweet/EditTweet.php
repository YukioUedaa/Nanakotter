<?php
namespace App\UseCases\Tweet;

use App\Models\User;
use App\Entities\Eloquents\Tweet;
use App\Repositories\TweetRepositoryInterface;

class EditTweet {

    private $tweetRepository;

    public function __construct(TweetRepositoryInterface $tweetRepository) {
        $this->tweetRepository = $tweetRepository;
    }

    public function __invoke(int $editId): Tweet {
        return $this->tweetRepository->findById($editId);
    }
}

