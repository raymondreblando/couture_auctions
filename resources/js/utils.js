import { emptyHistory, bidderCard, emptyProduct, productCard } from "./template";

export async function request(endpoint, options = {}, onSuccess, type = 'create') {
    const defaultOptions = {
        method: 'POST',
        body: null,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    };

    const statusException = [200, 401, 422];

    const requestOptions = { ...defaultOptions, ...options };

    try {
        const response = await fetch(endpoint, requestOptions);

        if (!response.ok && !statusException.includes(response.status)) {
            return toast('error', 'An error occur. Try again');
        }

        const data = await response.json();

        if (data.hasOwnProperty('errors')) {
            return toast('error', data.message);
        }

        if (type === 'auth') {
            return location.href = data.message;
        }

        if (type === 'fetch') {
            return onSuccess(data.message);
        }

        toast('success', data.message);
        onSuccess(data.message);
        // console.log(data)
    } catch (error) {
        // toast('error', 'An error occur. Try again');
        console.log(error)
    }
}

export function isExist(element) {
    return Array.isArray(element) ? element.length > 0 : element !== null;
}

export function addEventListener(element, callback, type = 'click') {
    if (!isExist(element)) return
    element.addEventListener(type, callback);
}

export function toast(type, message) {
    const toast = document.querySelector('.toast'),
        toastMessage = document.querySelector('.toast-message');
    
    toastMessage.textContent = message;
    toast.classList.add(type);

    setTimeout(() => {
        toast.classList.remove(type);
    }, 1500);
}

export function reload() {
    setTimeout(() => {
        location.reload();
    }, 1300);
}

export function previewUpload(e) {
    const accepted = ['image/png', 'image/jpeg', 'image/webp'];
    if (!accepted.includes(e.target.files[0].type)) {
        return toast('error', 'Upload a png,jpg,webp file');
    }

    const parent = e.target.parentNode;
    const imagePreview = parent.querySelector('.upload-preview');
    const icon = parent.querySelector('.icon');

    const fileReader = new FileReader();

    fileReader.onload = (e) => {
        icon.setAttribute('hidden', '');
        imagePreview.src = e.target.result;
        imagePreview.removeAttribute('hidden');
    }

    fileReader.readAsDataURL(e.target.files[0]);
}

export function resetUploadPreview(form) {
    const uploadPreviews = form.querySelectorAll('.upload-preview');
    const icons = form.querySelectorAll('.icon');

    uploadPreviews.forEach((uploadPreview, index) => {
        uploadPreview.setAttribute('hidden', '');
        icons[index].removeAttribute('hidden');
    })
}

export function timeRemaining(dateString) {
    const bidEndDate = new Date(dateString);
    const now = new Date();

    const timeDiff = bidEndDate - now;

    const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

    if (days > 0) {
        return days + 'd ' + hours + 'h';
    } else if (hours > 0) {
        return hours + 'h ' + minutes + 'm';
    } else if (minutes > 0) {
        return minutes + 'm ' + seconds + 's';
    } else {
        return seconds + 's';
    }
}

export function isTimeEnded(dateString) {
    const bidEndDate = new Date(dateString);
    const now = new Date();

    return now > bidEndDate;
}

export function toggleDialog(dialogElement, id, type = 'show') {
    const dialog = document.querySelector(dialogElement);
    const confirmBtn = dialog.querySelector('.confirm-btn');

    confirmBtn.setAttribute('data-id', id);
    type === 'show' ?
    dialog.classList.remove('hidden') :
    dialog.classList.add('hidden');
}

export function fetchRealTimeBidders(element) {
    const id = element.dataset.id;
    
    request(`/bid/${id}`, {
        method: 'GET',
        body: null
    }, (datas) => {
        updateDOM(element, datas, emptyHistory, bidderCard);
    }, 'fetch')
}

export function applyUserProductFilters() {
    const categoryRadios = document.querySelectorAll('.category-radio');
    const subcategoryRadios = document.querySelectorAll('.subcategory-radio');
    const priceRadios = document.querySelectorAll('.price-radio');

    let formData = new FormData();
    formData.append('category', null);
    formData.append('subcategory', '');
    formData.append('price', '');

    categoryRadios.forEach(categoryRadio => {
        addEventListener(categoryRadio, () => {
            resetStyling(categoryRadios, 'selected');
            categoryRadio.classList.add('selected');
            formData.set('category', categoryRadio.dataset.value);
            filterProductRequest(formData);
        })
    })

    subcategoryRadios.forEach(subcategoryRadio => {
        addEventListener(subcategoryRadio, () => {
            resetStyling(subcategoryRadios, 'selected');
            subcategoryRadio.classList.add('selected');
            formData.set('subcategory', subcategoryRadio.dataset.value);
            filterProductRequest(formData);
        })
    })

    priceRadios.forEach(priceRadio => {
        addEventListener(priceRadio, () => {
            resetStyling(priceRadios, 'selected');
            priceRadio.classList.add('selected');
            formData.set('price', priceRadio.dataset.value);
            filterProductRequest(formData);
        })
    })
}

export function search(value, type){
  const searchAreas = document.querySelectorAll('.search-area');
  const matcher = new RegExp(value, 'i');

  searchAreas.forEach(searchArea => {
    const finders = searchArea.querySelectorAll('.finder1, .finder2, .finder3, .finder4, .finder5, .finder6, .finder7, .finder8, .finder9');
    let shouldHide = true;

    finders.forEach(finder => {
      if (matcher.test(finder.textContent)) {
        shouldHide = false;
      }
    });

    if (shouldHide) {
      searchArea.style.display = 'none';
    } else {
      type === "table" ?
       searchArea.style.display = 'table-row' 
       : searchArea.style.display = 'block';
    }
  });
}

export function resetStyling(elements, style) {
    elements.forEach(element => element.classList.remove(style));
}

function updateDOM(element, datas, emptyState, template) {
    element.innerHTML = '';

    if (datas.length < 1) {
        return element.innerHTML = emptyState();
    }

    let html = '';
    datas.forEach((data, index) => html += template(index, data));
    element.innerHTML = html;
}

function filterProductRequest(formData) {
    const productWrapper = document.getElementById('product-wrapper');
    request('/product/filter', {
        body: formData
    }, (datas) => {
        updateDOM(productWrapper, datas, emptyProduct, productCard);
    }, 'fetch')
}