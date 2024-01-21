<x-layout>
    <x-slot:title>
        Accounts
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Accounts'])

        <x-dialog 
          id="block-account-dialog"
          heading="Block Account"
          message="block this account"
          selector="confirm-block-account"
        />

        <x-dialog 
          id="unblock-account-dialog"
          heading="Unblock Account"
          message="unblock this account"
          selector="confirm-unblock-account"
        />

        <div class="w-full min-h-screen pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="flex flex-col-reverse md:flex-row md:items-center justify-between gap-4 mb-4">
                <div class="flex-1 md:flex-initial flex items-start md:items-center justify-between md:justify-start gap-2">
                    <x-tick-box data-value="">All</x-tick-box>
                    <x-tick-box data-value="1111">Verified</x-tick-box>
                    <x-tick-box data-value="2222">Not Verified</x-tick-box>
                </div>
                <div class="flex-1 md:flex-initial flex items-start md:items-center justify-between md:justify-start gap-2">
                    <x-tick-box data-value="active">Active</x-tick-box>
                    <x-tick-box data-value="blocked">Blocked</x-tick-box>
                </div>
            </div>
            <div class="bg-white overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                    <th>Bidder</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th width="10%"></th>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="search-area">
                                <td>
                                    <x-table.user 
                                        :user="$user"
                                        :profile="$user->profile"
                                    />
                                </td>
                                <td class="finder4">{{ $user->gender }}</td>
                                <td class="finder5">{{ $user->email }}</td>
                                <td class="finder6">{{ $user->contact_number }}</td>
                                <td class="finder7">{{ $user->address }}</td>
                                <td>
                                    <x-table.status-indicator 
                                        :is-active="$user->is_active" 
                                    />
                                </td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        @isset($user->identity)
                                            <a href="{{ route('identity', $user) }}" class="grid place-items-center w-6 md:w-8 h-6 md:h-8 hover:bg-gray-100 border-2 border-gray-300/40 rounded-full transition-all duration-200" title="View Valid ID">
                                                <img src="{{ asset('images/card-linear.svg') }}" alt="id" class="w-3 md:w-4 h-3 md:h-4">
                                            </a>
                                        @endisset
                                        @if ($user->is_active)
                                            <x-table.button 
                                                class-name="block-btn"
                                                title="Block"
                                                icon="slash-linear.svg"
                                                :id="$user->user_id"
                                                target="#block-account-dialog"
                                            />
                                        @else
                                            <x-table.button 
                                                class-name="unblock-btn"
                                                title="Unblock"
                                                icon="tick-circle-linear.svg"
                                                :id="$user->user_id"
                                                target="#unblock-account-dialog"
                                            />
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    No user's were found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- <div class="flex justify-center md:justify-between items-center gap-2 mt-4">
            <p class="hidden md:block text-[10px] text-grey font-medium bg-white py-[7px] px-4 rounded-md">Showing 1 / 20</p>
            <div class="flex items-center gap-2">
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">Prev</a>
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">1</a>
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">2</a>
                <li class="list-none text-xs text-dark/60 font-medium py-[7px] px-4 bg-white rounded-md cursor-default">...</li>
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">Next</a>
            </div>
            </div> --}}
        </div>
    </div>
</x-layout>