@use('App\Helpers\StringHelper')

<div class="flex items-center gap-2 bg-white rounded-md py-[14px] px-4 mb-1">
    <span class="w-10 h-10 grid place-content-center text-xs md:text-sm font-bold {{ $count + 1 === 1 ? 'text-primary bg-violet-100' : 'text-dark bg-ash-gray' }} rounded-md">
        {{ $count + 1 }}
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
        <p class="text-[10px] md:text-xs font-semibold text-dark">
            {{ $user->fullname }}
            @if ($user->is_verified)
                <i class="ri-checkbox-circle-fill text-emerald-600" title="Verified Account"></i>
            @endif
        </p>
        <p class="text-[8px] md:text-[10px] font-bold text-dark/60">
            {{ $user->username }}
        </p>
    </div>
    <div class="ml-auto text-right">
        <p class="text-[10px] md:text-xs font-semibold text-dark">
            {{ $amount }}
        </p>
        <p class="text-[8px] md:text-[10px] font-semibold text-dark/60">Bid</p>
    </div>
</div>