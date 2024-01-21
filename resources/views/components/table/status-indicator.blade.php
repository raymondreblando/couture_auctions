@use('Illuminate\Support\Str')

<div class="flex items-center gap-2">
    <div class="status-indicator {{ $isUserActive() }}"></div>
    <span class="finder8 status-{{ $isUserActive() }}">
        {{ Str::ucfirst($isUserActive()) }}
    </span>
</div>