<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\UseCases\Tweet\ShowTweet;
use App\UseCases\Tweet\AddTweet;
use App\UseCases\Tweet\DeleteTweet;
use App\UseCases\Tweet\EditTweet;
use App\UseCases\Tweet\UpdateTweet;

class TweetController extends Controller
{
    public function show(Request $request, ShowTweet $useCase) {
        $authenticatedUser = $request->user();
        $tweets = $useCase($authenticatedUser);
        return view('home')->with('tweets', $tweets);
    }

    public function add(TweetRequest $request, AddTweet $useCase) {
        $authenticatedUser = $request->user();
        $tweetData = $request->validated();
        $useCase($tweetData, $authenticatedUser);
        return redirect('home');
    }

    public function delete(Request $request, DeleteTweet $useCase) {
        $deleteID = $request->id;
        $useCase($deleteID);
        return redirect('home');
    }

    public function edit(Request $request, EditTweet $useCase) {
        $editID = $request->id;
        $editTweet = $useCase($editID);
        return view('edit')->with('tweet', $editTweet);
    }

    public function update(Request $request, UpdateTweet $useCase) {
        $saveData = $request->tweet;
        $editId = $request->id;
        $useCase($saveData, $editId);
        return redirect('home');
    }
}
