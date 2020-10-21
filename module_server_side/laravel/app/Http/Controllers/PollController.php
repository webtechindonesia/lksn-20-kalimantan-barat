<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $param['created_by'] = 1;

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
    }

    public function vote(Poll $poll, Choice $choice)
    {
    }

    public function delete(Poll $poll)
    {
        $poll->delete();

        return response()->json(['message' => 'delete succes'], 200);
    }
}
