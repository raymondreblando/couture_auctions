import {
    isExist, addEventListener, request,
    resetUploadPreview, fetchRealTimeBidders, reload,
    applyUserProductFilters
} from "./utils";

window.addEventListener('DOMContentLoaded', () => {
    const getInTouchForm = document.getElementById('get-in-touch-form');

    const registerForm = document.getElementById('register-form');
    const loginForm = document.getElementById('login-form');

    const productForm = document.getElementById('product-form');
    const updateProductForm = document.getElementById('update-product-form');
    const confirmProductDeleteBtn = document.getElementById('confirm-delete-product');

    const categoryForm = document.getElementById('category-form');
    const updateCategoryForm = document.getElementById('update-category-form');
    const categoryInput = document.getElementById('category-name');
    const categoryWrapper = document.getElementById('category-wrapper');

    const subcategoryForm = document.getElementById('subcategory-form');
    const updateSubCategoryForm = document.getElementById('update-subcategory-form');
    const subCategoryInput = document.getElementById('subcategory-name');
    const subCategoryWrapper = document.getElementById('subcategory-wrapper');

    const confirmBlockAccountBtn = document.getElementById('confirm-block-account');
    const confirmUnblockAccountBtn = document.getElementById('confirm-unblock-account');
    const confirmVerifyUserBtn = document.getElementById('confirm-verify-user');
    const confirmRejectUserBtn = document.getElementById('confirm-reject-user');

    const replyForm = document.getElementById('reply-form');
    const adminSecurityForm = document.getElementById('admin-security-form');

    addEventListener(getInTouchForm, (e) => {
        e.preventDefault();
        request('/get-in-touch', {
            body: new FormData(e.target)
        }, () => {
            getInTouchForm.reset();
        })
    }, 'submit')
    
    addEventListener(registerForm, (e) => {
        e.preventDefault();
        request('/signup', {
            body: new FormData(e.target)
        }, () => { registerForm.reset() })
    }, 'submit')
    
    addEventListener(loginForm, (e) => {
        e.preventDefault();
        request('/login', {
            body: new FormData(e.target)
        }, () => {}, 'auth')
    }, 'submit')
    
    addEventListener(productForm, (e) => {
        e.preventDefault();
        request('/admin/products', {
            body: new FormData(e.target)
        }, () => {
            productForm.reset();
            resetUploadPreview(productForm);
        })
    }, 'submit')
    
    addEventListener(updateProductForm, (e) => {
        e.preventDefault();
        const id = e.target.dataset.id;
        request(`/admin/products/${id}`, {
            body: new FormData(e.target)
        }, () => {})
    }, 'submit')
    
    addEventListener(confirmProductDeleteBtn, (e) => {
        const id = e.target.dataset.id;
        let formData = new FormData();
        formData.append('_method', 'delete');
    
        request(`/admin/products/${id}`, {
            body: formData
        }, () => reload())
    })
    
    addEventListener(categoryForm, (e) => {
        e.preventDefault();
        request('/admin/categories', {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')
    
    addEventListener(categoryWrapper, (e) => {
        if (e.target.classList.contains('update-category')) {
            const id = e.target.dataset.id;
            request(`/admin/categories/${id}`, {
                method: 'GET'
            }, (data) => {
                categoryInput.value = data.category_name;
                updateCategoryForm.dataset.id = data.category_id;
                categoryForm.classList.add('hidden');
                updateCategoryForm.classList.remove('hidden');
            }, 'fetch')
        }
    });
    
    addEventListener(updateCategoryForm, (e) => {
        e.preventDefault();
        const id = e.target.dataset.id;
        request(`/admin/categories/${id}`, {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')
    
    addEventListener(subcategoryForm, (e) => {
        e.preventDefault();
        request('/admin/subcategories', {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')
    
    addEventListener(subCategoryWrapper, (e) => {
        if (e.target.classList.contains('update-subcategory')) {
            const id = e.target.dataset.id;
            request(`/admin/subcategories/${id}`, {
                method: 'GET'
            }, (data) => {
                subCategoryInput.value = data.subcategory_name;
                updateSubCategoryForm.dataset.id = data.subcategory_id;
                subcategoryForm.classList.add('hidden');
                updateSubCategoryForm.classList.remove('hidden');
            }, 'fetch')
        }
    });
    
    addEventListener(updateSubCategoryForm, (e) => {
        e.preventDefault();
        const id = e.target.dataset.id;
        request(`/admin/subcategories/${id}`, {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')
    
    addEventListener(confirmBlockAccountBtn, () => {
        const id = confirmBlockAccountBtn.dataset.id;
        let formData = new FormData();
        formData.append('_method', 'put');
    
        request(`/admin/account/${id}`, {
            body: formData
        }, () => reload())
    })
    
    addEventListener(confirmUnblockAccountBtn, () => {
        const id = confirmUnblockAccountBtn.dataset.id;
        let formData = new FormData();
        formData.append('_method', 'put');
    
        request(`/admin/account/${id}`, {
            body: formData
        }, () => reload())
    })
    
    addEventListener(confirmVerifyUserBtn, () => {
        const id = confirmVerifyUserBtn.dataset.id;
        let formData = new FormData();
        formData.append('_method', 'put');
    
        request(`/admin/identity/verify/${id}`, {
            body: formData
        }, () => reload())
    })
    
    addEventListener(confirmRejectUserBtn, () => {
        const id = confirmRejectUserBtn.dataset.id;
        let formData = new FormData();
        formData.append('_method', 'delete');
    
        request(`/admin/identity/reject/${id}`, {
            body: formData
        }, () => reload())
    })

    addEventListener(replyForm, (e) => {
        e.preventDefault();
        const id = e.target.dataset.id;
        request(`/admin/get-in-touch/${id}`, {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')

    addEventListener(adminSecurityForm, (e) => {
        e.preventDefault();
        request('/admin/setting/password/change', {
            body: new FormData(e.target)
        }, () => {
            adminSecurityForm.reset();
        })
    }, 'submit')
    
    // User
    const bidderContainer = document.getElementById('bidder-container');
    const bidForm = document.getElementById('bid-form');
    const confirmBidBtn = document.getElementById('confirm-bid-btn');
    const cancelBidBtn = document.getElementById('cancel-bid-btn');

    const profileForm = document.getElementById('profile-form');
    const identityForm = document.getElementById('identity-form');
    const changePasswordForm = document.getElementById('change-password-form');

    if (isExist(bidderContainer)) {
        setInterval(() => {
            fetchRealTimeBidders(bidderContainer);
        }, 10000);
    }
    
    addEventListener(bidForm, (e) => {
        e.preventDefault();
        let formData = new FormData(e.target);
        formData.append('product_id', confirmBidBtn.dataset.id);
    
        request('/bid', {
            body: formData
        }, () => {
            fetchRealTimeBidders(bidderContainer);
        })
    }, 'submit')
    
    addEventListener(cancelBidBtn, (e) => {
        e.preventDefault();
        const id = cancelBidBtn.dataset.id;
        let formData = new FormData();
        formData.append('_method', 'delete');
    
        request(`/bid/${id}`, {
            body: formData
        }, () => {
            fetchRealTimeBidders(bidderContainer);
        })
    })

    addEventListener(profileForm, (e) => {
        e.preventDefault();
        request('/profile/update', {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')
    
    addEventListener(identityForm, (e) => {
        e.preventDefault();
        request('/identity/upload', {
            body: new FormData(e.target)
        }, () => reload())
    }, 'submit')

    addEventListener(changePasswordForm, (e) => {
        e.preventDefault();
        request('/password/change', {
            body: new FormData(e.target)
        }, () => {
            changePasswordForm.reset();
        })
    }, 'submit')

    applyUserProductFilters();
})