@push('scripts')
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}" />
    <script>
        
    </script>
@endpush

<form id="addPlatformForm" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label for="platformName" class="block text-sm font-medium text-gray-700">Nama Platform</label>
        <input type="text" id="platformName" name="name" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            placeholder="Contoh: Twitter" />
    </div>

    <div class="mt-4">
        <label for="platformIconDropzone" class="block text-sm font-medium text-gray-700 mb-1">Upload Icon</label>
        <div class="dropzone" id="dropzone-basic">
            <div class="dz-message flex flex-col items-center gap-4">
                <i class="ti ti-upload" style="font-size: 50px"></i>
                <span>Letakkan file di sini atau klik untuk mengunggah.</span>
            </div>
        </div>
        <input type="hidden" id="uploadedIconPath" name="uploadedIconPath">
    </div>
</form>
