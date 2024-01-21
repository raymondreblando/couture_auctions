import { isExist, addEventListener, previewUpload, search } from "./utils";

window.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.querySelector('.menu-btn');
    const navMenu = document.querySelector('.nav-menu');

    const showNotification = document.querySelector('.show-notification');
    const notification = document.querySelector('.notification');
    const showMobileNotification = document.querySelector('.mobile-show-notification');
    const mobileNotification = document.querySelector('.mobile-notification');

    const searchBtn = document.querySelector('.search-btn');
    const searchbar = document.querySelector('.searchbar');
    const mobileSearchbtn = document.querySelector('.mobile-search-btn');
    const mobileSearchbar = document.querySelector('.mobile-searchbar');
    const searchInputs = document.querySelectorAll('.search-input');

    const accordions = document.querySelectorAll('.accordion');

    const togglePasswordBtns = document.querySelectorAll('.toggle-password');
    const uploadContainers = document.querySelectorAll('.upload-container');
    
    const editProfileBtn = document.getElementById('edit-profile-btn');
    const profileForm = document.getElementById('profile-form');

    const showFilter = document.querySelector('.show-filter');
    const filterContainer = document.querySelector('.filter-container');

    addEventListener(document.body, () => {
        if (isExist(showNotification)) {
            notification.classList.add('hidden');
        }
        if (isExist(showMobileNotification)) {
            mobileNotification.classList.add('hidden');
        }
        if (isExist(searchbar)) {
            searchBtn.classList.remove('hidden');
            searchbar.classList.add('hidden');
        }
        if (isExist(mobileSearchbar)) {
            mobileSearchbtn.classList.remove('hidden');
            mobileSearchbar.classList.add('hidden');
        }
        if (isExist(filterContainer)) {
            filterContainer.classList.remove('show');
        }
    })

    addEventListener(menuBtn, () => {
        const icon = menuBtn.querySelector('i');
        icon.className = navMenu.classList.contains('show') ? 'ri-menu-5-line' : 'ri-close-fill';
        navMenu.classList.toggle('show');
    })

    addEventListener(showNotification, (e) => {
        e.stopPropagation();
        notification.classList.remove('hidden');
    })

    addEventListener(notification, (e) => e.stopPropagation());

    addEventListener(showMobileNotification, (e) => {
        e.stopPropagation();
        mobileNotification.classList.remove('hidden');
    })

    addEventListener(mobileNotification, (e) => e.stopPropagation());

    addEventListener(searchBtn, (e) => {
        e.stopPropagation();
        searchBtn.classList.add('hidden');
        searchbar.classList.remove('hidden');
    })

    addEventListener(searchbar, (e) => e.stopPropagation());

    addEventListener(mobileSearchbtn, (e) => {
        e.stopPropagation();
        mobileSearchbtn.classList.add('hidden');
        mobileSearchbar.classList.remove('hidden');
    })

    addEventListener(mobileSearchbar, (e) => e.stopPropagation());

    addEventListener(showFilter, (e) => {
        e.stopPropagation();
        filterContainer.classList.add('show');
    })

    addEventListener(filterContainer, (e) => e.stopPropagation());
    
    accordions.forEach(accordion => {
        addEventListener(accordion, () => {
            accordion.classList.toggle('show');
        })
    })

    togglePasswordBtns.forEach(togglePasswordBtn => {
        addEventListener(togglePasswordBtn, () => {
            const parentElement = togglePasswordBtn.parentNode;
            const passwordInput = parentElement.querySelector('input');
            if (passwordInput.type === 'password') {
                togglePasswordBtn.classList.remove('ri-eye-line');
                togglePasswordBtn.classList.add('ri-eye-off-line');
                passwordInput.type = 'text';
            } else {
                togglePasswordBtn.classList.add('ri-eye-line');
                togglePasswordBtn.classList.remove('ri-eye-off-line');
                passwordInput.type = 'password';
            }
        })
    })

    uploadContainers.forEach(uploadContainer => {
        addEventListener(uploadContainer, () => {
            const fileInput = uploadContainer.querySelector('.upload-input');
            fileInput.click();

            addEventListener(fileInput, (e) => {
                previewUpload(e);
            }, 'change');
        })
    })

    addEventListener(editProfileBtn, () => {
        editProfileBtn.classList.add('hidden');
        const disabledInputs = profileForm.querySelectorAll('[disabled]');
        disabledInputs.forEach(disabledInput => disabledInput.removeAttribute('disabled'));
    })

    searchInputs.forEach(searchInput => {
        addEventListener(searchInput, ({ target }) => {
            search(target.value, 'table');
        }, 'keyup')
    })
})