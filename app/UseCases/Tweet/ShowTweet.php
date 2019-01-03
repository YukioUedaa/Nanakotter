<?php
namespace App\UseCases\Tweet;

use App\Models\User;
use App\Repositories\TweetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ShowTweet
{

    /**
     * @var TweetRepositoryInterface
     */
    private $tweetRepository;

    public function __construct(TweetRepositoryInterface $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    public function __invoke(User $authenticatedUser): Array
    {
        $tweets = $this->tweetRepository->findAll();

        $response = [];
        foreach($tweets as $tweetData){
            $response[$tweetData->id] = [
                'id' => $tweetData->id,
                'user_id' => $tweetData->user_id,
                'name' => $tweetData->user->name,
                'tweet' => $tweetData->tweet,
                'date' => $tweetData->updated_at,
            ];
        }

        return $response;
    }
}
