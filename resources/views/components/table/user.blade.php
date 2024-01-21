@use('App\Helpers\StringHelper')

<div class="w-max flex items-center gap-2">
    @if (empty($profile))
        <div class="grid place-content-center w-10 h-10 text-primary font-semibold bg-purple-100 rounded-full">
            {{ StringHelper::acronym($user->fullname) }}
        </div>
    @else
        <img 
            src="{{ asset('storage/profiles/' . $profile->image) }}" 
            alt="{{ $user->fullname }}" 
            class="w-10 h-10 object-cover rounded-full"
        >
    @endif
    <div>
        <p class="finder1 text-[10px] md:text-xs font-semibold text-dark">
            {{ $user->fullname }}
            @if ($user->is_verified)
                <i class="ri-checkbox-circle-fill text-emerald-600" title="Verified Account"></i>  
            @endif
            <span hidden class="finder9">{{ $user->is_verified ? '1111' : '2222' }}</span>
        </p>
        <p class="finder2 text-[8px] md:text-[10px] font-bold text-dark/60">
            {{ $user->username }}
        </p>
    </div>
</div>