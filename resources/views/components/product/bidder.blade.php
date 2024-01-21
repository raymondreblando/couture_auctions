@use('App\Helpers\StringHelper')
@use('Illuminate\Support\Number')

<div class="flex items-center justify-between hover:bg-ash-gray gap-4 py-3 px-0 lg:px-2 transition-all duration-200">
    <div class="flex items-center gap-2">
        <span class="text-xs md:text-sm font-bold 
            {{ $rank + 1 === 1 ? 'bg-violet-100 text-primary' : 'bg-ash-gray text-dark grid' }} 
            grid place-items-center w-8 md:w-10 h-8 md:h-10 rounded-md"
        >
            {{ $rank + 1 }}
        </span>
        @isset ($profile)
            <img 
                src="{{ asset('storage/profiles/' . $profile->image) }}" 
                alt="{{ $user->fullname }}" 
                class="w-8 md:w-10 h-8 md:h-10 object-cover rounded-full"
            >
        @endisset
        @empty ($profile)
            <div class="grid place-content-center w-8 md:w-10 h-8 md:h-10 text-primary font-semibold bg-purple-100 rounded-full">
                {{ StringHelper::acronym($user->fullname) }}
            </div>
        @endempty
        <div>
            @if (auth()->check() && auth()->user()->isAdmin())
                <a href="bid-winner.html" class="text-[11px] md:text-[13px] font-semibold text-dark">
                    {{ $user->fullname }}
                </a>
            @else
                <p class="text-[11px] md:text-[13px] font-semibold text-dark">
                    {{ $user->fullname }}
                </p>
            @endif
            
            <p class="text-[9px] md:text-xs font-medium text-dark/60">
                {{ $user->username }}
            </p>
        </div>
    </div>
    <div class="text-right">
        <p class="text-[9px] md:text-[11px] font-medium text-dark/60">Current Bid</p>
        <p class="text-[11px] md:text-xs font-bold text-dark">
            {{ Number::currency($bid, in: 'PHP') }}
        </p>
    </div>
</div>