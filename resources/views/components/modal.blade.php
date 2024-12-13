<div id="{{ $id }}"
    class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center transition-opacity duration-300 ease-in-out"
    onclick="closeModalOnOutsideClick(event, '{{ $id }}')">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            <button class="text-gray-500 hover:text-gray-700" onclick="closeModal('{{ $id }}')">
                <i class="ti ti-x"></i>
            </button>
        </div>
        <!-- Modal Body -->
        <div class="p-6">
            {!! $slot !!}
        </div>
        <!-- Modal Footer -->
        <div class="flex justify-end border-t p-4">
            <button
                class="btn-outline-primary mr-2 rounded-lg shadow-md transition transform hover:scale-105 hover:bg-gray-100 hover:shadow-lg 
                focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50
                active:scale-95"
                onclick="closeModal('{{ $id }}')">{{ $cancelButtonText ?? 'Batal' }}</button>
            <button
                class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md 
                transition transform hover:scale-105 hover:bg-blue-700 hover:shadow-lg 
                focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50
                active:scale-95"
                onclick="{{ $onSave ?? 'submitModalForm' }}">{{ $saveButtonText ?? 'Simpan' }}</button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function closeModalOnOutsideClick(event, id) {
        const modalContent = document.querySelector(`#${id} .bg-white`);
        if (!modalContent.contains(event.target)) {
            closeModal(id);
        }
    }
</script>
    