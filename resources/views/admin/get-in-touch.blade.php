<x-layout>
    <x-slot:title>
        Get in Touch
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Get in Touch'])

        <div class="w-full min-h-screen pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="flex flex-col-reverse md:flex-row md:items-center justify-between gap-4 mb-4">
                <div class="flex-1 md:flex-initial flex items-start md:items-center justify-between md:justify-start gap-2">
                    <x-tick-box data-value="">All</x-tick-box>
                    <x-tick-box data-value="Unread">Unread</x-tick-box>
                    <x-tick-box data-value="Replied">Replied</x-tick-box>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-3">
                @foreach ($messages as $message)
                    <x-get-in-touch-card :get-in-touch="$message" />
                @endforeach
            </div>
        </div>
    </div>
</x-layout>