<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Dashboard'])

        <div class="w-full min-h-screen grid grid-cols-1 2xl:grid-cols-[auto_22rem] gap-8 pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div>
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <p class="text-sm md:text-base font-semibold text-dark">Trending</p>
                        <p class="text-[10px] md:text-xs font-medium text-dark/60">Hottest product auctions</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="text-[10px] md:text-xs font-semibold uppercase text-dark">View All</a>
                </div>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-4 mb-4">
                    @for ($index = 0; $index < 6; $index++)
                        @isset($trendings[$index])
                            <x-dashboard.trending-card 
                                :product="$trendings[$index]"
                                :category="$trendings[$index]->category->category_name"
                                :image="$trendings[$index]->productimage->image"
                                :bids="$trendings[$index]->bids"
                                :count="$trendings[$index]->bids_count"
                            />
                        @endisset
                        @empty($trendings[$index])
                            <x-dashboard.trending-card-placeholder />
                        @endempty
                    @endfor
                </div>
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <p class="text-sm md:text-base font-semibold text-dark">Recent Sign-ups</p>
                        <p class="text-[10px] md:text-xs font-medium text-dark/60">Newest members of our bidding family</p>
                    </div>
                    <a href="{{ route('accounts') }}" class="text-[10px] md:text-xs font-semibold uppercase text-dark">View All</a>
                </div>
                <div class="bg-white overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead class="border-b border-b-gray-300/40">
                        <th class="border-none">Bidder</th>
                        <th class="border-none">Gender</th>
                        <th class="border-none">Email</th>
                        <th class="border-none">Contact No</th>
                        <th class="border-none">Address</th>
                    </thead>
                    <tbody>
                        @for ($index = 0; $index < 3; $index++)
                            @isset($recentSignups[$index])
                                <tr class="border-b last:border-b-0 border-b-gray-300/40">
                                    <td>
                                        <x-table.user 
                                            :user="$recentSignups[$index]"
                                            :profile="$recentSignups[$index]->profile"
                                        />
                                    </td>
                                    <td class="border-none">
                                        {{ $recentSignups[$index]->gender }}
                                    </td>
                                    <td class="border-none">
                                        {{ $recentSignups[$index]->email }}
                                    </td>
                                    <td class="border-none">
                                        {{ $recentSignups[$index]->contact_number }}
                                    </td>
                                    <td class="border-none">
                                        {{ $recentSignups[$index]->address }}
                                    </td>
                                </tr>
                            @endisset
                            @empty($recentSignups[$index])
                                <x-dashboard.table-placeholder />
                            @endempty
                        @endfor
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-4 xl:block">
            <div class="mb-4">
                <div class="mb-4">
                    <p class="text-sm md:text-base font-semibold text-dark">Top Bidders</p>
                    <p class="text-[10px] md:text-xs font-medium text-dark/60">Meet the top bidders</p>
                </div>
                @for ($index = 0; $index < 5; $index++)
                    @isset($topBidders[$index])
                        <x-dashboard.top-bidder 
                            :user="$topBidders[$index]"
                            :profile="$topBidders[$index]->profile"
                            :amount="$topBidders[$index]->bids_sum_amount"
                            :count="$index"
                        />
                    @endisset
                    @empty($topBidders[$index])
                        <x-dashboard.top-bidder-placeholder />
                    @endempty
                @endfor
            </div>
            <div class="mb-4 flex flex-col">
                <div class="mb-4">
                    <p class="text-sm md:text-base font-semibold text-dark">Recent Messages</p>
                    <p class="text-[10px] md:text-xs font-medium text-dark/60">Response to latest messages</p>
                </div>
                @for ($index = 0; $index < 3; $index++)
                    @isset($recentMessages[$index])
                        <x-dashboard.recent-message :get-in-touch="$recentMessages[$index]" />
                    @endisset
                    @empty($recentMessages[$index])
                        <x-dashboard.recent-message-placeholder />
                    @endempty
                @endfor
                <a href="{{ route('get-in-touch') }}" class="block text-[10px] font-semibold text-primary text-center border border-primary rounded-md py-4 px-4 mt-auto">Show all messages</a>
            </div>
            </div>
        </div>
    </div>
</x-layout>