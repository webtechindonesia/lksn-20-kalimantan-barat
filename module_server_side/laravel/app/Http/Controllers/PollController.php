<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Vote;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Choice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth as JWTAuthJWTAuth;

class PollController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'string|required',
            'description' => 'string|required',
            'deadline' => 'date|required',
        ]);

        if ($validate->fails() || count($request->choices) < 2)
            return response()->json(['message' => 'Invalid field'], 422);

        $param = $request->only(['title', 'description', 'deadline']);

        $param['created_by'] = Auth::user()->id;

        $poll = Poll::create($param);

        foreach ($request->choices as $choice) {
            Choice::create([
                'poll_id' => $poll->id,
                'choice' => $choice
            ]);
        }

        return response()->json($poll, 200);
    }

    public function show(Poll $poll)
    {
        return $poll->with('choices')->find($poll->id);
    }

    public function vote(Poll $poll, Choice $choice)
    {
        if (Auth::user()->role == 'admin') return response()->json(['message' => 'unauthoized'], 401);

        $check = Vote::where([
            'user_id' => Auth::user()->id,
            'poll_id' => $poll->id
        ])->first();

        if ($check)
            return response()->json(['message' => 'already voted'], 422);

        if (Carbon::parse($poll->deadline)->isAfter(now()))
            return response()->json(['message' => 'voting deadline']);

        Vote::create([
            'choice_id' => $choice->id,
            'user_id' => Auth::user()->id,
            'poll_id' => $poll->id,
            'division_id' => Auth::user()->division_id,
        ]);

        return response()->json(['message' => 'voting success'], 200);
    }

    public function destroy(Request $request, Poll $poll)
    {
        if (Auth::user()->role != 'admin') return response()->json(['message' => 'unauthoized'], 401);
        $poll->delete();

        return response()->json(['message' => 'delete succes'], 200);
    }
}
