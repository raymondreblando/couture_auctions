<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    <div class="min-h-screen grid place-items-center bg-ash-gray py-12">
        <div class="w-[min(23rem,90%)] 2xl:w-[min(28rem,90%)] flex flex-col gap-2">
            <div class="flex items-center justify-between gap-4 bg-white p-4 rounded-t-md">
                <x-logo-link />
                <x-redirect-link href="{{ route('signup') }}">
                    Join now
                </x-redirect-link>
            </div>
            <div class="bg-white rounded-b-md p-8">
                <x-heading>
                    Welcome Back <br> Access Your Bidding Account
                </x-heading>
                <x-subheading>
                    Log in to continue your journey through exclusive auctions, personalized offers, and more. Your style, your bids, all in one place.
                </x-subheading>
                
                <form 
                    method="POST"
                    id="login-form"
                    autocomplete="off"
                >
                    @csrf
                    <x-forms.label for="#username">
                        Username
                    </x-forms.label>
                    <x-forms.input 
                        id="username"
                        name="username"
                        placeholder="Enter your username"
                        class="mb-4"
                    />
                    <x-forms.label for="#password">
                        Password
                    </x-forms.label>
                    <div class="relative w-full h-12 2xl:h-16 bg-ash-gray rounded-md mb-4">
                        <x-forms.input 
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Account password"
                            class="mb-4"
                        />
                        <x-forms.input-icon class="toggle-password ri-eye-line" />
                    </div>
                    <x-forms.button>
                        Log In
                    </x-forms.button>
                </form>
            </div>
        </div>
    </div>
</x-layout>