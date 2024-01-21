<div class="relative p-3 border border-gray-200 rounded-full">
    <div class="relative">
        <img 
            src="{{ asset('images/notification.svg') }}" 
            alt="notification" 
            role="button" 
            class="{{ $classNames[0] }} w-4 h-4"
        >
        @if (count($user->unreadNotifications) > 0)
            <span class="animate-ping absolute top-0 right-[7px] min-w-[10px] min-h-[10px] rounded-full bg-primary border-2 border-white pointer-events-none z-[2]"></span>
            <span class="absolute top-0 right-[7px] min-w-[10px] min-h-[10px] rounded-full bg-primary border-2 border-white pointer-events-none"></span>
        @endif
    </div>
    <div class="{{ $classNames[1] }} hidden absolute top-[130%] -right-20 md:right-0 w-[17rem] bg-white border border-gray-200 rounded-xl shadow-lg py-4 z-[2]">
        <div class="px-6 pb-2 border-b border-b-gray-300/40">
            <p class="text-[11px] md:text-sm font-semibold text-black leading-none">Notifications</p>
            <p class="text-[9px] md:text-[10px] font-semibold text-black/60">Be notified of important updates</p>
        </div>
        <div class="custom-scroll max-h-[210px] overflow-y-auto">
            @foreach ($user->notifications as $notification)
                <a href="{{ route('notification', $notification) }}" class="notif 
                    {{ empty($notification->read_at) ? 'unread' : '' }}
                ">
                    <img src="{{ $notification->data['icon'] }}" alt="icon" class="w-7 h-7">
                    <span role="button" class="text-[9px] md:text-[10px] font-semibold text-black/60 leading-snug">{{ $notification->data['message'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>