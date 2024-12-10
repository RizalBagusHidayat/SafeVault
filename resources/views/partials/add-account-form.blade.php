<form id="addAccountForm" class="space-y-4">
    <button type="button"
        class="mb-2 px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm w-full hover:bg-gray-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        onclick="addNewAccountType()">
        Tambah Platform Baru
    </button>
    <div>
        <label for="accountType" class="block text-sm font-medium text-gray-700">Jenis Akun</label>
        <select id="accountType" name="accountType"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="" disabled selected hidden>Pilih platform</option>
            <option value="google">Google</option>
            <option value="facebook">Facebook</option>
        </select>
    </div>
</form>
