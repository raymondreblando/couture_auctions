<x-layout>
    <div class="bg-ash-gray">
        @include('partials.nav')

        <section class="min-h-screen flex items-center justify-center bg-white py-28">
            <div class="w-[min(80rem,90%)] mx-auto">
                <h1 class="text-center md:leading-[7rem] text-dark uppercase mb-6">
                <span class="inline-block text-4xl md:text-[3.45rem] text-primary font-semibold leading-normal border-0 md:border border-primary px-6">Elevate</span><span class="inline-block text-4xl md:text-[3.5rem] text-white font-medium leading-normal bg-primary px-6">your style</span> 
                <br>
                <span class="text-5xl md:text-[5rem] font-extrabold">bid for boutique elegance</span></h1>
                <p class="max-w-[650px] text-base md:text-2xl text-center font-medium md:font-normal font-roboto text-dark/70 mb-16 mx-auto">
                    Bid on boutique fashion – elevate your wardrobe with curated Collections and Unique style statements.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-3">
                    <a href="{{ route('signup') }}" class="w-3/4 md:w-max text-xs md:text-base text-white text-center bg-primary rounded-[5px] py-4 px-8">Get started</a>
                    <a href="{{ route('default.products') }}" class="w-3/4 md:w-max font-medium text-xs md:text-base text-primary text-center rounded-[5px] hover:ring-4 hover:ring-violet-100 border border-primary py-4 px-8 transition-all">Browse collections</a>
                </div>
            </div>
        </section>
        <section class="w-[min(80rem,90%)] mx-auto py-24">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-20">
                <div>
                    <p class="text-3xl font-bold text-dark">
                        Product Collections
                    </p>
                    <p class="text-gray-400">Check out the latest product collections.</p>
                </div>
                <span class="text-sm text-primary bg-purple-100 rounded-full py-2 px-4">100 Available Collections</span>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
                @foreach ($products as $product)
                    <x-product.card-v2 
                        :product="$product"
                        :product-image="$product->productimage"
                        :category="$product->category"
                    />
                @endforeach
                
            </div>
        </section>
        <section class="w-[min(80rem,90%)] min-h-screen mx-auto py-24">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-4 mb-20">
                <h3 class="flex-1 text-3xl font-bold text-dark text-center lg:text-left">Discover a unique collections of <br> clothing and accesories</h3>
                <p class="flex-1 text-sm md:text-base text-dark/60 text-center lg:text-left">Discover the art of bidding: Unlock exclusive fashion finds and elevate your wardrobe with boutique treasures.</p>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="h-max relative pt-16">
                    <div class="absolute top-0 left-1/2 md:left-8 -translate-x-1/2 md:-translate-x-0 grid place-items-center w-24 h-24 rounded-full bg-primary">
                        <img src="{{ asset('images/wardrobe.svg') }}" alt="wardrobe" class="w-12">
                    </div>
                    <div class="pt-16 pb-4 px-8 rounded-md bg-white">
                        <h3 class="text-2xl font-semibold text-dark text-center md:text-left leading-tight mb-4">Elevate your wardrobe: unveil trendsetting styles</h3>
                        <p class="text-sm font-medium text-dark/70 text-center md:text-left leading-tight mb-6">Explore the cutting-edge of fashion by bidding on thoughtfully curated collections that redefine your look.</p>
                    </div>
                </div>
                <div class="h-max relative pt-16">
                    <div class="absolute top-0 left-1/2 md:left-8 -translate-x-1/2 md:-translate-x-0 grid place-items-center w-24 h-24 rounded-full bg-primary">
                        <img src="{{ asset('images/compass.svg') }}" alt="discover" class="w-12">
                    </div>
                    <div class="pt-16 pb-4 px-8 rounded-md bg-white">
                        <h3 class="text-2xl font-semibold text-dark text-center md:text-left leading-tight mb-4">Exceptional couture finds, just a bid away</h3>
                        <p class="text-sm font-medium text-dark/70 text-center md:text-left leading-tight mb-6">Embark on a journey of luxury as you immerse yourself in the exhilaration of acquiring exquisite couture pieces. Our exclusive bidding platform offers you the unparalleled opportunity to own these masterfully crafted fashion statements at prices that redefine the boundaries of value.</p>
                    </div>
                </div>
                <div class="h-max relative pt-16">
                    <div class="absolute top-0 left-1/2 md:left-8 -translate-x-1/2 md:-translate-x-0 grid place-items-center w-24 h-24 rounded-full bg-primary">
                        <img src="{{ asset('images/clothes.svg') }}" alt="clothes" class="w-12">
                    </div>
                    <div class="pt-16 pb-4 px-8 rounded-md bg-white">
                        <h3 class="text-2xl font-semibold text-dark text-center md:text-left leading-tight mb-4">Craft your signature look with boutique elegance</h3>
                        <p class="text-sm font-medium text-dark/70 text-center md:text-left leading-tight mb-6">Embrace your unique style with matchless fashion discoveries, bidding on boutique items that exude individuality.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="min-h-screen flex flex-col justify-center py-24 bg-white">
            <div class="w-[min(80rem,90%)] mx-auto">
                <p class="text-4xl font-bold text-dark text-center">Frequently Asked Questions</p>
                <p class="text-sm md:text-base text-gray-400 text-center mb-8">Exploring FAQs - Your Go-To Guide for bidding adventure</p>
                <div class="accordion-wrapper flex flex-col max-w-[900px] mx-auto gap-1">
                    <x-accordion 
                        class-name="show"
                        count="1"
                        question="How does the bidding process work on Cyprid Inspired Closet?"
                        content="At Cyprin Inspired Closet, bidding is easy and fun! Simply browse our fashion auctions, find an item you love, and place your bid. Keep an eye on the bidding activity, and if you have the highest bid when the auction ends, congratulations, the item is yours!"
                    />
                    <x-accordion 
                        count="2"
                        question="Can I track the items I've bid on?"
                        content="Yes, absolutely! Once you've placed a bid, you can easily track your activity in the 'History' section of your account. Here, you'll find information about the items you're bidding on, current bid rank, and auction end times."
                    />
                    <x-accordion 
                        count="3"
                        question="What happens if I win an auction?"
                        content="Upon winning an auction, you'll promptly receive a notification celebrating your victory. Our management team will then contact you via your registered email or phone number to facilitate the next steps. To ensure a seamless experience, we offer convenient payment options, allowing you to settle your winning bid through the ease of GCash or opt for the traditional Cash on Delivery (COD) method. Your fashion find will be on its way to you, and we're here to assist you at every stage of the process."
                    />
                    <x-accordion 
                        count="4"
                        question="Are returns and exchanges allowed?"
                        content="We want you to love your fashion finds! While returns and exchanges are generally not allowed due to the nature of our auctions, we do have a detailed item description and images to help you make informed decisions before bidding. If there are exceptional circumstances, please reach out to our customer support team."
                    />
                    <x-accordion 
                        count="5"
                        question="How can I contact customer support?"
                        content="If you have any questions, concerns, or just want to chat about fashion, our customer support team is here for you. Reach out through the 'Get in Touch Form' page on our website or directly email us on support@cyprininspiredcloset.shop, and we'll get back to you as soon as possible."
                    />
                </div>
            </div>
        </section>
        <section class="min-h-screen flex flex-col justify-center py-24">
            <div class="w-[min(80rem,90%)] mx-auto">
                <p class="text-4xl font-bold text-dark text-center">Get in touch with us</p>
                <p class="text-sm md:text-base text-gray-400 text-center mb-8">Connect with us to embark on a tailored fashion adventure.</p>
                <form 
                    method="POST"
                    id="get-in-touch-form"
                    autocomplete="off" 
                    class="max-w-[750px] mx-auto"
                >
                    @csrf
                    <div class="grid md:grid-cols-2 gap-3 mb-3">
                        <x-forms.input 
                            name="fullname"
                            placeholder="Fullname"
                            class="bg-white border border-gray-200"
                        />
                        <x-forms.input 
                            name="email"
                            placeholder="Email address"
                            class="bg-white border border-gray-200"
                        />
                    </div>
                    <x-forms.text-area 
                        name="message"
                        placeholder="Enter your message"
                        class="bg-white border border-gray-200 mb-4"
                    />
                    <x-forms.button>
                        Submit Message
                    </x-forms.button>
                </form>
            </div>
        </section>
  </div>
</x-layout>