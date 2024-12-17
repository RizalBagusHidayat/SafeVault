@push('scripts')
    <script>
        let fieldCount = 0;

        function customInput() {
            fieldCount = 0;
            $('#customFieldsContainer').empty();
            addCustomField();
        }

        function addCustomField() {
            const container = document.getElementById('customFieldsContainer');
            fieldCount++;

            const customField = document.createElement('div');
            customField.classList.add('flex', 'gap-2', 'items-center');

            const labelInput = document.createElement('input');
            labelInput.type = 'text';
            labelInput.name = `customLabel[${fieldCount}]`;
            labelInput.placeholder = 'Label (Contoh: Email)';
            labelInput.required = true;
            labelInput.classList.add('block', 'mt-1', 'w-1/3', 'rounded-md', 'border-gray-300', 'shadow-sm',
                'focus:border-blue-500', 'focus:ring', 'focus:ring-blue-200', 'focus:ring-opacity-50');

            const valueInput = document.createElement('input');
            valueInput.type = 'text';
            valueInput.name = `customValue[${fieldCount}]`;
            valueInput.placeholder = 'Value (Contoh: user@example.com)';
            valueInput.required = true;
            valueInput.classList.add('block', 'mt-1', 'w-2/3', 'rounded-md', 'border-gray-300', 'shadow-sm',
                'focus:border-blue-500', 'focus:ring', 'focus:ring-blue-200', 'focus:ring-opacity-50');

            // Tambahkan tombol hapus
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Hapus';
            removeButton.classList.add('text-red-500', 'hover:text-red-700', 'text-sm', 'ml-2', 'mt-1');
            removeButton.id = `removeButton-${fieldCount}`;
            removeButton.onclick = () => customField.remove();

            // Gabungkan semuanya ke dalam satu elemen
            customField.appendChild(labelInput);
            customField.appendChild(valueInput);
            customField.appendChild(removeButton);

            // Tambahkan ke container
            container.appendChild(customField);
        }
    </script>
@endpush
<form id="addAccountForm" class="space-y-4">
    @csrf
    <button type="button"
        class="mb-2 px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm w-full hover:bg-gray-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        id="btn-newPlatform">
        Tambah Platform Baru
    </button>
    <div>
        <label for="accountType" class="block text-sm font-medium text-gray-700">Jenis Akun</label>
        <select id="accountType" name="accountType"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            
        </select>
    </div>
    <div>
        <h4 class="text-sm font-medium text-gray-700">Custom Input</h4>
        <div id="customFieldsContainer" class="space-y-2">
            <!-- Custom fields will be appended here -->
        </div>
        <button type="button"
            class="mt-2 px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            onclick="addCustomField()">+ Tambah Input</button>
    </div>
</form>
