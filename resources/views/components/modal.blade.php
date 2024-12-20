@push('scripts')
    {{-- <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove("hidden");

            setTimeout(() => {
                modal.classList.remove("opacity-0");
                modal.classList.add("opacity-100");
            }, 100);
        }

        function closeModal(id) {
            const modal = document.getElementById(id);

            modal.classList.remove("opacity-100");
            modal.classList.add("opacity-0");

            setTimeout(() => {
                modal.classList.add("hidden");
            }, 300);
        }

        // function closeModalOnOutsideClick(event, id) {
        //     const modalContent = document.querySelector(`#${id} .bg-white`);
        //     if (!modalContent.contains(event.target)) {
        //         closeModal(id);
        //     }
        // }
    </script> --}}
@endpush

<div id="{{ $id }}"
    class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center transition-opacity duration-300 ease-in-out opacity-0"
    onclick="">
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
            <button id="{{ $onSave ?? 'submitModalForm' }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md 
                transition transform hover:scale-105 hover:bg-blue-700 hover:shadow-lg 
                focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50
                active:scale-95">{{ $saveButtonText ?? 'Simpan' }}</button>
        </div>
    </div>
</div>
