<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['text' => 'required|max:280']);

        $order = Message::where('user_id', auth()->id())->max('order') + 1;

        Message::create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'order' => $order
        ]);

        return back();
    }

    public function destroy(Message $message)
    {
        $message->delete();
        
        return back()->with('success', 'Mensagem excluída com sucesso.');
    }

    public function moveUp(Message $message)
    {
        $previousMessage = Message::where('user_id', auth()->id())
                                ->where('order', '<', $message->order)
                                ->orderBy('order', 'desc')
                                ->first();

        if ($previousMessage) {
            $currentOrder = $message->order;
            $message->order = $previousMessage->order;
            $previousMessage->order = $currentOrder;

            $message->save();
            $previousMessage->save();
        }

        return back();
    }

    public function moveDown(Message $message)
    {
        $nextMessage = Message::where('user_id', auth()->id())
                            ->where('order', '>', $message->order)
                            ->orderBy('order', 'asc')
                            ->first();

        if ($nextMessage) {
            $currentOrder = $message->order;
            $message->order = $nextMessage->order;
            $nextMessage->order = $currentOrder;

            $message->save();
            $nextMessage->save();
        }

        return back();
    }

}
