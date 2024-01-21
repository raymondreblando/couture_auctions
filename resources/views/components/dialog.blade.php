<div class="fixed inset-0 hidden flex justify-center items-center bg-black/70 z-50" id="{{ $id }}">
    <div class="w-[min(25rem,95%)] bg-white rounded-lg p-8">
        <p class="text-lg text-red-500 font-semibold mb-4">
            {{ $heading }}
        </p>
        <p class="text-sm text-dark font-medium mb-2">
            Kindly confirm if you really want to {{ $message }}
        </p>
        <p class="text-xs text-gray-400 mb-6">
            Note: This action cannot be undone.
        </p>
        <div class="flex gap-3">
            <button type="button" id="{{ $selector }}"
                class="confirm-btn w-full text-sm text-primary font-medium bg-purple-100 rounded-md py-3 px-4">
                Confirm
            </button>
            <button 
                type="button"
                class="close-dialog w-full  text-sm text-dark font-medium bg-gray-100 rounded-md py-3 px-4" 
                data-target="#{{ $id }}"
            >
                Cancel
            </button>
        </div>
    </div>
</div>
