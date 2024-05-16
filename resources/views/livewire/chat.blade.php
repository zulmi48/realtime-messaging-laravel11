<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div wire:poll class="mb-3">
                        @foreach ($messages as $message)
                            <div class="chat {{ $message->from_user_id == auth()->id() ? 'chat-end' : 'chat-start' }}">
                                <div class="chat-image avatar">
                                    <div class="w-10 rounded-full">
                                        <img alt="Tailwind CSS chat bubble component"
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                    </div>
                                </div>
                                <div class="chat-header">
                                    {{ $message->fromUser->name }}
                                </div>
                                <div class="chat-bubble">{{ $message->message }}</div>
                                <div class="chat-footer">
                                    <time
                                        class="mt-2 text-xs opacity-50">{{ $message->created_at->diffForHumans() }}</time>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="form-control">
                        <form wire:submit.prevent="sendMessage">
                            <textarea wire:model="message" class="textarea textarea-bordered w-full bg-white"
                                placeholder="Enter your message . . ."></textarea>
                            <button type="submit" class="btn btn-outline mt-5">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
