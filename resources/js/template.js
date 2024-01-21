import { timeRemaining, isTimeEnded } from "./utils";
// function updateBidderList(element, datas) {
//     element.innerHTML = '';

//     if (datas.length < 1) {
//         return element.innerHTML = emptyHistory();
//     }

//     let html = '';
//     datas.forEach((data, index) => html += bidderCard(index, data));
//     element.innerHTML = html;
// }

export function emptyHistory() {
    return `
        <div class="h-[300px] flex flex-col items-center justify-center">
            <img src="/images/empty-history.svg" alt="empty" class="w-28 h-28">
            <p class="text-[10px] md:text-xs font-medium text-dark/60">No bidding history found</p>
        </div>
    `;
}

export function bidderCard(index, data) {
    return `
        <div class="flex items-center justify-between hover:bg-ash-gray gap-4 py-3 px-0 lg:px-2 transition-all duration-200">
            <div class="flex items-center gap-2">
                <span class="text-xs md:text-sm font-bold
                    ${index + 1 === 1 ? 'bg-violet-100 text-primary' : 'bg-ash-gray text-dark'}
                    grid place-items-center w-8 md:w-10 h-8 md:h-10 rounded-md"
                >
                    ${index + 1}
                </span>
                    ${data.user.profile !== null ?
                        `<img 
                            src="/storage/profiles/${data.user.profile.image}}}" 
                            alt="${data.user.fullname}" 
                            class="w-8 md:w-10 h-8 md:h-10 object-cover rounded-full"
                        >` :
                        `<div class="grid place-content-center w-8 md:w-10 h-8 md:h-10 text-primary font-semibold bg-purple-100 rounded-full">
                            ${data.user.fullname.substring(0, 1)}
                        </div>`
                    }
                <div>
                    <p class="text-[11px] md:text-[13px] font-semibold text-dark">
                        ${data.user.fullname}
                    </p>
                    <p class="text-[9px] md:text-xs font-medium text-dark/60">
                        ${data.user.username}
                    </p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-[9px] md:text-[11px] font-medium text-dark/60">Current Bid</p>
                <p class="text-[11px] md:text-xs font-bold text-dark">
                    ₱${data.amount}
                </p>
            </div>
        </div>
    `;
}

export function emptyProduct() {
    let placeholder = '';
    for (let index = 0; index < 8; index++) {
        placeholder += `
            <div class="product-placeholder bg-white rounded-md overflow-hidden">
                <div class="aspect-[4/5.3] w-full bg-gray-100 rounded-md"></div>
                <div class="py-4">
                <div class="px-6">
                    <div class="w-32 h-3 bg-gray-100 rounded-md mb-[5px]"></div>
                    <div class="w-20 h-2 bg-gray-100 rounded-md mb-4"></div>
                    <div class="w-16 h-3 bg-gray-100 rounded-md mb-[3px]"></div>
                    <div class="w-12 h-2 bg-gray-100 rounded-md mb-4"></div>
                </div>
                <div class="flex items-center justify-between gap-3 border-t-2 border-t-ash-gray pt-3 px-6">
                    <div>
                    <div class="w-12 h-2 bg-gray-100 rounded-md mb-[3px]"></div>
                    <div class="w-16 h-3 bg-gray-100 rounded-md"></div>
                    </div>
                    <div class="w-16 h-8 bg-gray-100 rounded-sm"></div>
                </div>
                </div>
            </div>
        `;
    }
    return placeholder;
}

export function productCard(index, data) {
    return `
        <div class="h-max bg-white rounded-md overflow-hidden">
            <img 
                src="/storage/product_images/${data.product_image.image}" 
                alt="${data.product_name}" 
                class="w-full object-contain rounded-md"
            >
            <div class="py-4">
                <div class="px-6">
                    <a href="/product/${data.product_id}" class="block text-xs md:text-sm text-dark font-semibold leading-none">
                        ${data.product_name.substring(0, 18)}
                    </a>
                    <p class="text-[10px] md:text-xs font-medium text-dark/60 mb-3">
                        ${data.category.category_name}
                    </p>
                    <p class="text-[10px] md:text-xs font-medium text-dark/60">Starting Price</p>
                    <p class="text-xs md:text-sm font-bold text-dark mb-2">
                        ₱${data.starting_price}
                    </p>
                </div>
                <div class="flex items-center justify-between gap-3 border-t-2 border-t-ash-gray pt-3 px-6">
                    <div>
                        ${isTimeEnded(data.bid_end_date) ? `
                            <p class="text-[10px] md:text-xs font-medium text-dark/60">Bidding was</p>
                            <p class="text-xs md:text-sm font-bold text-dark">Completed</p>
                        ` : `
                            <p class="text-[10px] md:text-xs font-medium text-dark/60">Ends in</p>
                            <p class="text-xs md:text-sm font-bold text-dark">
                                ${timeRemaining(data.bid_end_date)}
                            </p>
                        `}
                    </div>
                    ${!isTimeEnded(data.bid_end_date) ? `
                        <a href="/product/${data.product_id}" class="text-[10px] md:text-xs text-white bg-primary rounded-sm py-2 px-4">
                            Place a bid
                        </a>
                    ` : ``}
                </div>
            </div>
        </div>
    `;
}