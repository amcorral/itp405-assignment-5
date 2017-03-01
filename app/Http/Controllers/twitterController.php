<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tweet;
use Validator;

class twitterController extends Controller
{
    public function main()
    {
      // $tweets = tweet::all();
      $tweets = tweet::orderBy('id', 'desc')
      ->get();

      return view ('mainTwitter', [
        'tweets' => $tweets
      ]);
    }

    public function update($tweetID)
    {
      $validator=Validator::make(
        [
          'tweet'=>request('tweet')
        ],
        [
          'tweet'=>'max:140|required'
        ]
        );

      if($validator->passes())
        {
          $tweets = tweet::find($tweetID);
          $tweets->tweet= request('tweet');
          $tweets->save();

          return redirect("/tweets/$tweetID")
            ->with('successStatus', 'Tweet was updated successfully!');
        }
        else {
          return redirect ("/tweets/$tweetID/edit")
          ->withErrors($validator);
        }

    }

    public function store(Request $request)
    {
      $validator=Validator::make(
        [
          'tweet'=>request('tweet')
        ],
        [
          'tweet'=>'max:140|required'
        ]
        );

        if($validator->passes())
        {
          $tweet = new tweet();
          $tweet->tweet = request('tweet');
          $tweet->save();
        return redirect('/')
        ->with('successStatus', 'Tweet successfully created!');
        }
        else {
          return redirect ('/')
          ->withInput()
          ->withErrors($validator);
        }
    }

    public function edit($tweetID)
    {

      $tweets = tweet::find($tweetID);

      return view ('editTweet', [
        'tweets' => $tweets
      ]);
    }

    public function view($tweetID)
    {
      $tweets = tweet::find($tweetID);

      return view ('singleTweet', [
        'tweets' => $tweets
      ]);
    }


    public function destroy($tweetID)
    {
      $tweet = tweet::find($tweetID);
      $tweet->delete();

      return redirect('/')
        ->with('successStatus', 'Tweet was deleted successfully');
    }

}
