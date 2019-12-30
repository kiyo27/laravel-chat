<?php

namespace App\Http\Controllers;

use App\Events\MessageRecived;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(MessageBuilder $builder, Request $request)
    {
        $request->validate([
            'friendId' => 'required|integer',
            'text' => 'required|max:255',
        ]);

        $userMessage = $builder->user($request->friendId, $request->text);
        $demoMessage = $builder->demo($request->text);

        $messages = [$userMessage];

        if ($demoMessage) {
            $messages[] = $demoMessage;
        }

        event(new MessageRecived($messages));

        return response()->json($messages);
    }
}
