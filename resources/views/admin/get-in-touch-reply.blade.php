<x-layout>
    <x-slot:title>
        Message
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Message'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="w-[min(60rem,100%)]">
                <div class="bg-white py-4 rounded-t-md mb-2">
                    <div class="flex flex-col-reverse md:flex-row items-start md:items-center justify-between gap-4 pb-3 border-b border-b-gray-300/40 px-6">
                        <div>
                            <p class="text-xs font-semibold text-dark/60 mb-1">A message from</p>
                            <p class="text-xl font-semibold text-dark leading-none">
                                {{ $getInTouch->fullname }}
                            </p>
                            <p class="text-sm font-semibold text-dark/60">
                                {{ $getInTouch->email }}
                            </p>
                        </div>
                        <div class="md:text-right">
                            <span class="message-status unread">{{ !isset($getInTouch->reply) ? 'Unread' : 'Replied' }}</span>
                            <p class="text-xs font-bold text-dark/60 mt-1">Aug 27, 2023 03:21 PM</p>
                        </div>
                    </div>
                    <div class="pt-4 px-6">
                        <p class="text-sm font-semibold text-dark leading-none mb-2">Message</p>
                        <p class="text-xs font-semibold text-dark/60">
                            {{ $getInTouch->message }}
                        </p>
                    </div>
                </div>
                @empty($getInTouch->reply)
                    <form 
                        method="POST"
                        id="reply-form"
                        class="bg-white p-6 rounded-b-md"
                        autocomplete="off"
                        data-id="{{ $getInTouch->get_in_touch_id }}"
                    >
                        @csrf
                        @method('put')
                        <div class="flex items-center justify-between gap-4 mb-4">
                            <div>
                                <p class="text-xs font-semibold text-dark/60 mb-1">Send a reply to</p>
                                <p class="text-sm font-semibold text-dark leading-none">
                                    {{ $getInTouch->fullname }}
                                </p>
                            </div>
                            <x-forms.button
                                class="w-max flex items-center gap-2 px-6"
                            >
                                Send
                                <img src="{{ asset('images/send-bold.svg') }}" alt="send" class="w-4 h-4">
                            </x-forms.button>
                        </div>
                        <x-forms.text-area 
                            name="reply"
                            placeholder="Type some reply"
                        ></x-forms.text-area>
                    </form>
                @endempty

                @isset($getInTouch->reply)
                    <div class="bg-white p-6 rounded-b-md">
                        <p class="text-sm font-semibold text-dark leading-none mb-2">Reply</p>
                        <p class="text-xs font-semibold text-dark/60">
                            {{ $getInTouch->reply }}
                        </p>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</x-layout>