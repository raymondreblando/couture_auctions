import { isExist, addEventListener, previewUpload, toggleDialog, resetStyling, search } from "./utils";

window.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.querySelector('.sidebar');
    const showSidebarBtn = document.querySelector('.show-sidebar');

    const uploadContainers = document.querySelectorAll('.upload-container');
    const deleteBtns = document.querySelectorAll('.delete-btn');
    const blockBtns = document.querySelectorAll('.block-btn');
    const unblockBtns = document.querySelectorAll('.unblock-btn');
    const rejectBtn = document.querySelector('.reject-btn');
    const verifyBtn = document.querySelector('.verify-btn');
    const closeDialogBtns = document.querySelectorAll('.close-dialog');

    const filterBoxes = document.querySelectorAll('.filter-box');

    addEventListener(document.body, () => {
        if (isExist(sidebar)) {
            sidebar.classList.remove('show');
        }
    })

    addEventListener(sidebar, (e) => e.stopPropagation());

    addEventListener(showSidebarBtn, (e) => {
        e.stopPropagation();
        sidebar.classList.add('show');
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

    deleteBtns.forEach(deleteBtn => {
        addEventListener(deleteBtn, () => {
            toggleDialog(deleteBtn.dataset.target, deleteBtn.dataset.id);
        })
    })

    blockBtns.forEach(blockBtn => {
        addEventListener(blockBtn, () => {
            toggleDialog(blockBtn.dataset.target, blockBtn.dataset.id);
        })
    })

    unblockBtns.forEach(unblockBtn => {
        addEventListener(unblockBtn, () => {
            toggleDialog(unblockBtn.dataset.target, unblockBtn.dataset.id);
        })
    })

    addEventListener(rejectBtn, () => {
        toggleDialog(rejectBtn.dataset.target, rejectBtn.dataset.id);
    })

    addEventListener(verifyBtn, () => {
        toggleDialog(verifyBtn.dataset.target, verifyBtn.dataset.id);
    })

    closeDialogBtns.forEach(closeDialogBtn => {
        addEventListener(closeDialogBtn, () => {
            toggleDialog(closeDialogBtn.dataset.target, '', 'hide');
        })
    })

    filterBoxes.forEach(filterBox => {
        addEventListener(filterBox, () => {
            resetStyling(filterBoxes, 'active');
            filterBox.classList.add('active');
            search(filterBox.dataset.value, 'table');
        })
    })
})