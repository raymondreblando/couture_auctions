<x-layout>
    <x-slot:title>
        Identity Verification
    </x-slot:title>

    <x-dialog 
        id="verify-dialog"
        heading="Verify User Identity"
        message="verify this user's identity"
        selector="confirm-verify-user"
    />

    <x-dialog 
        id="reject-dialog"
        heading="Reject User Identity"
        message="reject this user's identity"
        selector="confirm-reject-user"
    />

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Identity Verification'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="w-[min(65rem,100%)]">
                <div class="flex justify-between items-center bg-white rounded-t-md gap-4 p-8 mb-2">
                    <div>
                        <p class="text-sm md:text-base font-semibold text-dark leading-none">
                            {{ $user->fullname }}
                        </p>
                        <p class="text-[11px] md:text-xs font-medium text-dark/60">
                            is requesting for identity verification.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        @if (! $user->is_verified && ! empty($user->identity))
                            <button 
                                type="button" 
                                class="reject-btn flex items-center gap-1 text-[10px] md:text-xs text-white bg-red-500 py-3 px-6 rounded-md transition-all"
                                data-id="{{ $user->user_id }}"
                                data-target="#reject-dialog"
                            >
                                Reject
                            </button>
                            <button 
                                type="button" 
                                class="verify-btn flex items-center gap-1 text-[10px] md:text-xs text-white bg-primary py-3 px-6 rounded-md transition-all"
                                data-id="{{ $user->user_id }}"
                                data-target="#verify-dialog"
                            >
                                Verify
                            </button>
                        @endif
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-2">
                    <div class="bg-white p-4 rounded-md">
                        <img 
                            src="{{ asset('storage/id_fronts/' . $user->identity->id_front) }}" 
                            alt="id front" 
                            class="w-full"
                        >
                    </div>
                    <div class="bg-white p-4 rounded-md">
                        <img 
                            src="{{ asset('storage/id_backs/' . $user->identity->id_back) }}" 
                            alt="id back" 
                            class="w-full"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>