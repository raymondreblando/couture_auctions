<x-layout>
    <x-slot:title>
        Bid Winner
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Bid Winner'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="w-[min(50rem,100%)]">
                <div class="bg-white p-4 rounded-t-md mb-2">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <img src="{{ asset('images/product-2.webp') }}" alt="product" class="w-full sm:w-auto h-auto sm:h-[170px] md:h-[320px] object-contain rounded-md">
                        <div class="flex flex-col py-4">
                            <p class="text-sm md:text-xl text-dark font-medium leading-none">Manfinity Hypemode Men Contrast Collar Polo Shirt</p>
                            <p class="text-[10px] md:text-base font-medium text-dark/60 mb-4">Men's Apparel</p>
                            <p class="text-xs md:text-base font-bold text-dark">P300</p>
                            <p class="text-[10px] md:text-xs font-medium text-dark/60 mb-6">Bid Start Price</p>
                            <div class="flex items-center justify-between gap-4 mt-auto">
                                <div>
                                    <p class="text-xs md:text-base font-bold text-dark">P500</p>
                                    <p class="text-[10px] md:text-xs font-medium text-dark/60 mb-2">Highest Bid</p>
                                </div>
                                <div>
                                    <p class="text-xs md:text-base text-right font-bold text-dark">3d 4h</p>
                                    <p class="text-[10px] md:text-xs font-medium text-dark/60 mb-2">Time Remaining</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-t-md mb-2">
                    <div class="flex flex-col-reverse md:flex-row items-start md:items-center justify-between gap-4 pb-3 border-b border-b-gray-300/40">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/profile-2.jpg') }}" alt="profile" class="w-12 h-12 object-cover rounded-full">
                        <div>
                        <p class="text-xs md:text-base font-semibold text-dark leading-none">Dwayne Johnson</p>
                        <p class="text-[11px] md:text-xs font-medium text-dark/60">The Rock</p>
                        </div>
                    </div>
                    <div class="md:text-right">
                        <p class="text-xs md:text-base font-semibold text-dark leading-none">Congratulations</p>
                        <p class="text-[11px] md:text-xs font-medium text-dark/60">Current bidding winner</p>
                    </div>
                    </div>
                    <div class="flex items-center flex-wrap gap-x-8 gap-y-3 pt-4">
                        <div>
                            <p class="text-[10px] md:text-xs font-semibold text-dark/60">Contact Number</p>
                            <p class="text-[11px] md:text-sm font-medium text-dark">09322550100</p>
                        </div>
                        <div>
                            <p class="text-[10px] md:text-xs font-semibold text-dark/60">Email Address</p>
                            <p class="text-[11px] md:text-sm font-medium text-dark">dwaynejohnson@gmail.com</p>
                        </div>
                        <div>
                            <p class="text-[10px] md:text-xs font-semibold text-dark/60">Home Address</p>
                            <p class="text-[11px] md:text-sm font-medium text-dark">Zone 4, Balogo, Oas, Albay</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-t-md">
                    <div class="pb-3 border-b border-b-gray-300/40">
                        <p class="text-xs md:text-base font-semibold text-dark leading-none">Bidder Valid ID</p>
                        <p class="text-[11px] md:text-xs font-medium text-dark/60">Bidder card identity</p>
                    </div>
                    <div class="grid md:grid-cols-2 gap-2 pt-4">
                        <img src="{{ asset('storage') }}" alt="id" class="w-full">
                        <img src="../../public/images/id.jpg" alt="id" class="w-full">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>