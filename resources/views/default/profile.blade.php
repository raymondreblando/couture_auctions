@use('App\Helpers\StringHelper')

<x-layout>
    <x-slot:title>
        My Profile
    </x-slot:title>

    @include('partials.nav')
    <section class="min-h-screen flex items-center bg-ash-gray pt-32 pb-12">
      <div class="w-[min(80rem,90%)] grid lg:grid-cols-2 gap-3 mx-auto">
        <div class="bg-white rounded-md p-8">
            <p class="text-xs md:text-base font-semibold text-dark">Personal Information</p>
            <p class="text-[10px] md:text-xs font-medium text-gray-400 mb-6">Manage your personal information</p>
            <div class="flex items-center justify-between border-b border-b-gray-300/40 gap-4 pb-4">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <input type="file" class="profile-input" hidden>
                        @empty($user->profile)
                            <div class="grid place-content-center w-14 h-14 text-primary font-semibold bg-purple-100 rounded-full">
                                {{ StringHelper::acronym($user->fullname) }}
                            </div>
                        @endempty
                        @isset($user->profile)
                            <img 
                                src="{{ asset('storage/profiles/' . $user->profile->image) }}" 
                                alt="profile" 
                                class="w-14 h-14 object-cover rounded-full"
                            >
                        @endisset
                        <button class="upload-profile absolute bottom-0 -right-1 w-6 h-6 bg-white text-sm border border-gray-300 rounded-full" title="Upload Profile"><i class="ri-upload-cloud-line"></i></button>
                    </div>
                    <div>
                        <p class="text-xs md:text-sm font-semibold text-dark leading-none">
                            {{ $user->fullname }}
                        </p>
                        <p class="text-[10px] md:text-xs font-medium text-dark/60">
                            {{ $user->username }}
                        </p>
                    </div>
                </div>
                <button type="button" id="edit-profile-btn" class="border border-gray-200 w-10 h-10 rounded-full text-sm text-dark/60">
                    <i class="ri-pencil-line"></i>
                </button>
            </div>
            <form 
                method="POST"
                id="profile-form"
                autocomplete="off" 
                class="py-3"
            >
                @csrf
                @method('put')
                <div class="grid md:grid-cols-2 gap-3 mb-3">
                    <div>
                        <x-forms.label for="#fullname">
                            Fullname
                        </x-forms.label>
                        <x-forms.input 
                            id="fullname"
                            class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed"
                            name="fullname"
                            placeholder="Enter your fullname"
                            :value="$user->fullname"
                            disabled
                        />
                    </div>
                    <div>
                        <x-forms.label for="#username">
                            Username
                        </x-forms.label>
                        <x-forms.input 
                            id="username"
                            class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed"
                            name="username"
                            placeholder="Enter your username"
                            :value="$user->username"
                            disabled
                        />
                    </div>
                    <div class="md:col-span-2">
                        <x-forms.label for="#email">
                            Email
                        </x-forms.label>
                        <x-forms.input 
                            id="email"
                            class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed"
                            name="email"
                            placeholder="Enter your email address"
                            :value="$user->email"
                            disabled
                        />
                    </div>
                    <div>
                        @php
                            $options = (object) ['Male' => 'Male', 'Female' => 'Female'];
                        @endphp
                        <x-forms.label
                            for="#gender"
                        >
                            Subcategory
                        </x-forms.label>
                        <x-forms.select 
                            id="gender"
                            class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed"
                            name="gender"
                            title="Gender"
                            :$options
                            :selected="$user->gender"
                            disabled
                        />
                    </div>
                    <div>
                        <x-forms.label for="#contact-number">
                            Contact Number
                        </x-forms.label>
                        <x-forms.input 
                            id="contact-number"
                            class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed"
                            name="contact_number"
                            placeholder="Enter your contact number"
                            :value="$user->contact_number"
                            maxlength="11"
                            disabled
                        />
                    </div>
                    <div class="md:col-span-2">
                        <x-forms.label for="#address">
                            Address
                        </x-forms.label>
                        <x-forms.input 
                            id="address"
                            class="disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed"
                            name="address"
                            placeholder="Enter your address"
                            :value="$user->address"
                            disabled
                        />
                    </div>
                </div>
                <x-forms.button 
                    id="save-info"
                    class="disabled:bg-gray-200 disabled:text-gray-400 disabled:cursor-not-allowed"
                    disabled
                >
                    Save Changes
                </x-forms.button>
            </form>
        </div>
        <div class="bg-white rounded-md p-6">
            <p class="text-xs md:text-base font-semibold text-dark">
                Identity Verification
            </p>
            <p class="text-[10px] md:text-xs font-medium text-gray-400 mb-6">
                To participate in bidding events, kindly verify first your identity.
            </p>
            @if ($user->is_verified)
                <div class="upload-container h-[272px] relative rounded-md cursor-pointer mb-4">
                    <img src="{{ asset('storage/id_fronts/' . $user->identity->id_front) }}" alt="id front" class="upload-preview w-full h-full object-contain pointer-events-none">
                </div>
                <div class="upload-container h-[272px] relative rounded-md cursor-pointer mb-4">
                    <img src="{{ asset('storage/id_backs/' . $user->identity->id_front) }}" alt="id front" class="upload-preview w-full h-full object-contain pointer-events-none">
                </div>
            @else
                <form 
                    class="py-3"
                    method="POST"
                    id="identity-form"
                    autocomplete="off" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="upload-container h-[225px] relative bg-gray-100 rounded-md cursor-pointer mb-4">
                        <input type="file" name="id_front" class="upload-input" hidden>
                        <img src="" alt="id front" class="upload-preview w-full h-full object-contain pointer-events-none" hidden>
                        <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none">
                            <img src="{{ asset('images/id.svg') }}" alt="id" class="w-8 h-8 mx-auto mb-2 pointer-events-none">
                            <p class="text-[10px] md:text-xs font-medium pointer-events-none text-center text-gray-400">
                                Browse ID Front Photo
                            </p>
                        </div>
                    </div>
                    <div class="upload-container h-[225px] relative bg-gray-100 rounded-md cursor-pointer mb-4">
                        <input type="file" name="id_back" class="upload-input" hidden>
                        <img src="" alt="id back" class="upload-preview w-full h-full object-contain pointer-events-none" hidden>
                        <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none">
                            <img src="{{ asset('images/id.svg') }}" alt="id" class="w-8 h-8 mx-auto mb-2 pointer-events-none">
                            <p class="text-[10px] md:text-xs font-medium pointer-events-none text-center text-gray-400">
                                Browse ID Back Photo
                            </p>
                        </div>
                    </div>
                    <x-forms.button>
                        Upload
                    </x-forms.button>
                </form>
            @endif
        </div>
        <div class="lg:col-span-2 bg-white rounded-md p-8">
            <form 
                method="POST"
                id="change-password-form"
                autocomplete="off" 
                class="flex flex-col py-3"
            >
                @csrf
                @method('put')
                <div class="flex justify-between items-center gap-4 mb-6">
                    <div>
                        <p class="text-xs md:text-base font-semibold text-dark">
                            Account Security
                        </p>
                        <p class="text-[10px] md:text-xs font-medium text-gray-400">
                            Manage your account security
                        </p>
                    </div>
                    <x-forms.button class="w-max px-6">
                        Change
                    </x-forms.button>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <x-forms.label for="#current-password">
                            Current Password
                        </x-forms.label>
                        <div class="relative w-full h-12 2xl:h-16 bg-ash-gray rounded-md mb-4">
                            <x-forms.input 
                                type="password"
                                id="current-password"
                                name="current_password"
                                placeholder="Current account password"
                            />
                            <x-forms.input-icon class="toggle-password ri-eye-line" />
                        </div>
                    </div>
                    <div>
                        <x-forms.label for="#new-password">
                            New Password
                        </x-forms.label>
                        <div class="relative w-full h-12 2xl:h-16 bg-ash-gray rounded-md mb-4">
                            <x-forms.input 
                                type="password"
                                id="new-password"
                                name="new_password"
                                placeholder="New account password"
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
                                name="new_password_confirmation"
                                placeholder="Confirm password"
                            />
                            <x-forms.input-icon class="toggle-password ri-eye-line" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </section>
</x-layout>