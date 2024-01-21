@use('App\Helpers\DateHelper')
@use('App\Helpers\StringHelper')

<div class="search-area bg-white rounded-md p-6">
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="finder1 text-sm font-semibold text-dark">
                {{ $getInTouch->fullname }}
            </p>
            <p class="finder2 text-[10px] font-bold text-dark/60">
                {{ $getInTouch->email }}
            </p>
        </div>
        <a href="{{ route('get-in-touch.show', $getInTouch) }}" class="text-xl bg-violet-100 text-primary rounded-full py-2 px-4">
            <i class="ri-chat-1-line"></i>
        </a>
    </div>
    <div class="pt-4">
        <p class="text-xs font-semibold text-dark">Message</p>
        <p class="text-[11px] font-semibold text-dark/60">
            {{ StringHelper::ellipsis($getInTouch->message, 250) }}
        </p>
    </div>
    <div class="flex items-center justify-between gap-4 pt-2">
        <span class="finder3 message-status unread">
            {{ !isset($getInTouch->reply) ? 'Unread' : 'Replied' }}
        </span>
        <p class="text-[11px] font-bold text-dark/60">
            {{ DateHelper::formatDate($getInTouch->created_at) }}
        </p>
    </div>
</div>