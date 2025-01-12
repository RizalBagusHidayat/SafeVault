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

            // Wrapper untuk setiap field
            const customField = document.createElement('div');
            customField.classList.add('mb-4', 'p-2', 'border', 'rounded-md', 'bg-gray-50');

            // Input label
            const labelInput = document.createElement('input');
            labelInput.type = 'text';
            labelInput.name = `customLabel[${fieldCount}]`;
            labelInput.placeholder = 'Label (Contoh: Email)';
            labelInput.required = true;
            labelInput.classList.add('block', 'mt-1', 'w-full', 'rounded-md', 'border-gray-300', 'shadow-sm',
                'focus:border-blue-500', 'focus:ring', 'focus:ring-blue-200', 'focus:ring-opacity-50', 'mb-2');

            // Input value
            const valueInput = document.createElement('input');
            valueInput.type = 'text';
            valueInput.name = `customValue[${fieldCount}]`;
            valueInput.placeholder = 'Value (Contoh: user@example.com)';
            valueInput.required = true;
            valueInput.classList.add('block', 'mt-1', 'w-full', 'rounded-md', 'border-gray-300', 'shadow-sm',
                'focus:border-blue-500', 'focus:ring', 'focus:ring-blue-200', 'focus:ring-opacity-50', 'mb-2');

            // Wrapper untuk hidden dan tombol hapus
            const actionsWrapper = document.createElement('div');
            actionsWrapper.classList.add('flex', 'justify-between', 'items-center', 'mt-2');

            // Checkbox untuk hidden
            const hiddenCheckbox = document.createElement('input');
            hiddenCheckbox.type = 'checkbox';
            hiddenCheckbox.id = `hiddenCheckbox-${fieldCount}`;
            hiddenCheckbox.name = `customHidden[${fieldCount}]`;
            hiddenCheckbox.value = '1';
            hiddenCheckbox.title = 'Sembunyikan Input';

            const hiddenLabel = document.createElement('label');
            hiddenLabel.textContent = 'Sembunyikan Value';
            hiddenLabel.setAttribute('for', `hiddenCheckbox-${fieldCount}`);
            hiddenLabel.classList.add('text-sm', 'text-gray-600');

            // Tombol hapus
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Hapus';
            removeButton.classList.add('text-red-500', 'hover:text-red-700', 'text-sm');
            removeButton.id = `removeButton-${fieldCount}`;
            removeButton.onclick = () => customField.remove();

            // Gabungkan checkbox dan tombol ke dalam actionsWrapper
            const checkboxWrapper = document.createElement('div');
            checkboxWrapper.classList.add('flex', 'items-center', 'gap-2');
            checkboxWrapper.appendChild(hiddenCheckbox);
            checkboxWrapper.appendChild(hiddenLabel);

            actionsWrapper.appendChild(checkboxWrapper);
            actionsWrapper.appendChild(removeButton);

            // Gabungkan elemen-elemen ke dalam customField
            customField.appendChild(labelInput);
            customField.appendChild(valueInput);
            customField.appendChild(actionsWrapper);

            // Tambahkan customField ke container utama
            container.appendChild(customField);
        }
    </script>
@endpush
<form id="updateAccountForm" class="space-y-4">
    @csrf
    <input type="hidden" name="accountId" id="accountId">
    <input type="hidden" name="_method" value="PUT">
    <div>
        <label for="accountType" class="block text-sm font-medium text-gray-700">Jenis Akun</label>
        <select id="accountType" name="accountType"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">

        </select>
    </div>
    <div>
        <h4 class="text-sm font-medium text-gray-700">Data</h4>
        <div id="customFieldsContainer" class="space-y-2">
            <!-- Custom fields will be appended here -->
        </div>
        <button type="button"
            class="mt-2 px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            onclick="addCustomField()">+ Tambah Data</button>
    </div>
    <div>
        <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
        <textarea id="notes" name="notes" rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
    </div>
</form>
