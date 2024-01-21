<x-layout>
    <x-slot:title>
        Settings
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Settings'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="w-[min(45rem,100%)]">
                <div class="bg-white p-8 rounded-md">
                    <p class="text-xs md:text-base font-semibold text-dark leading-none">System Security</p>
                    <p class="text-[10px] md:text-sm font-medium text-dark/60 mb-4">Manage the system password</p>
                    <form 
                        method="POST"
                        id="admin-security-form"
                        class="flex flex-col" 
                        autocomplete="off"
                    >
                        @csrf
                        @method('put')
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
                        <x-forms.button class="px-6">
                            Change Password
                        </x-forms.button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>