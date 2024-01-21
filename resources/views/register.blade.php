<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="min-h-screen grid place-items-center bg-ash-gray py-16">
        <div class="w-[min(30rem,90%)] 2xl:w-[min(35rem,90%)] flex flex-col gap-2">
            <div class="flex items-center justify-between gap-4 bg-white p-4 rounded-t-md">
                <x-logo-link />
                <x-redirect-link href="{{ route('login') }}">
                    Login
                </x-redirect-link>
            </div>
            <div class="bg-white rounded-b-md p-8">
                <x-heading>
                    Join and Participate
                </x-heading>
                <x-subheading>
                    Join our community of fashion enthusiasts. Sign up to unlock access to <br> curated auctions and start your bidding adventure.
                </x-subheading>

                <form 
                    method="POST"
                    id="register-form"
                    autocomplete="off"
                >
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4 mb-3">
                        <div>
                            <x-forms.label for="#fullname">
                                Fullname
                            </x-forms.label>
                            <x-forms.input 
                                id="fullname"
                                name="fullname"
                                placeholder="Enter your fullname"
                            />
                        </div>
                        <div>
                            <x-forms.label for="#username">
                                Username
                            </x-forms.label>
                            <x-forms.input 
                                id="username"
                                name="username"
                                placeholder="Account username"
                            />
                        </div>
                        <div class="sm:col-span-2">
                            <x-forms.label for="#email">
                                Email
                            </x-forms.label>
                            <x-forms.input 
                                id="email"
                                name="email"
                                placeholder="Enter email address"
                            />
                        </div>
                        <div>
                            <x-forms.label for="#gender">
                                Gender
                            </x-forms.label>
                            @php
                                $options = (object) [
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                ];
                            @endphp 
                            <x-forms.select 
                                id="gender"
                                name="gender"
                                title="Gender"
                                :$options
                            />
                        </div>
                        <div>
                            <x-forms.label for="#contact-number">
                                Contact Number
                            </x-forms.label>
                            <x-forms.input 
                                id="contact-number"
                                name="contact_number"
                                placeholder="Contact number"
                                maxlength="11"
                            />
                        </div>
                        <div class="sm:col-span-2">
                            <x-forms.label for="#address">
                                Address
                            </x-forms.label>
                            <x-forms.input 
                                id="address"
                                name="address"
                                placeholder="Enter your complete address"
                            />
                        </div>
                        <div>
                            <x-forms.label for="#password">
                                Password
                            </x-forms.label>
                            <div class="relative w-full h-12 2xl:h-16 bg-ash-gray rounded-md mb-4">
                                <x-forms.input 
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Account password"
                                />
                                <x-forms.input-icon class="toggle-password ri-eye-line" />
                            </div>
                        </div>
                        <div>
                            <x-forms.label for="#confirm-password">
                                Confirm Password
                            </x-forms.label>
                            <div class="relative w-full h-12 2xl:h-16 bg-ash-gray rounded-md mb-4">
                                <x-forms.input 
                                    type="password"
                                    id="confirm-password"
                                    name="password_confirmation"
                                    placeholder="Confirm password"
                                />
                                <x-forms.input-icon class="toggle-password ri-eye-line" />
                            </div>
                        </div>
                    </div>
                    <x-forms.button>
                        Register
                    </x-forms.button>
                </form>
            </div>
        </div>
  </div>
</x-layout>