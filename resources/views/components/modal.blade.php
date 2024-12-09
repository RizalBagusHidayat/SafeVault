<div id="{{ $id }}"
    class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
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
            <button class="btn-outline-primary mr-2" onclick="closeModal('{{ $id }}')">Batal</button>
            <button class="btn bg-blue-600 text-white" onclick="{{ $onSave ?? 'submitModalForm' }}">Simpan</button>
        </div>
    </div>
</div>
