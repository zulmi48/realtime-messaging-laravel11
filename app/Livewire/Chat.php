<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Chat extends Component
{
    public User $user;
    public $message;

    public function render()
    {
        return view('livewire.chat', [
            'messages' => Message::orderBy('created_at', 'asc')->where(function (Builder $query) {
                $query->where('from_user_id', auth()->id())
                    ->where('to_user_id', $this->user->id);
            })->orWhere(function (Builder $query) {
                $query->where('from_user_id', $this->user->id)
                    ->where('to_user_id', auth()->id());
            })->get(),
        ]);
    }

    function sendMessage()
    {
        Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $this->user->id,
            'message' => $this->message,
        ]);

        $this->reset('message');
    }
}
