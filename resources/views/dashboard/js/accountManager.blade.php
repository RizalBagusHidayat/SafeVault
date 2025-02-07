@push('scripts')
    <script>
        $("#saveAccount").click(function(e) {
            e.preventDefault();
            const form = document.getElementById("addAccountForm");
            const formData = new FormData(form);

            $.ajax({
                url: `/api/account`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    closeModal("addAccountModal");
                    loadAccountManager();
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan.");
                },
            });
        });
        $("#savePlatform").click(function(e) {
            const form = document.getElementById("addPlatformForm");
            const formData = new FormData(form);
            const myDropzone = Dropzone.forElement("#dropzone-basic");

            const icon = myDropzone.getAcceptedFiles()[0];
            if (icon) {
                formData.append("icon", icon);
            }

            $.ajax({
                url: `/api/platform`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // alert('Platform berhasil ditambahkan!');
                    closeModal("addPlatformModal");
                    loadAccountManager();
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan.");
                },
            });
        });

        function detailAccount(name) {
            $("#PinModal").removeClass("hidden");

            $("#confirmPinModal").click(function(e) {
                e.preventDefault();
                const pin = $("#pin1").val() + $("#pin2").val() + $("#pin3").val() + $("#pin4").val() + $("#pin5")
                    .val() + $("#pin6").val();

                if (pin.length !== 6) {
                    alert('PIN harus terdiri dari 6 digit.');
                    return;
                }

                $.ajax({
                    url: `{{ route('verifyPin') }}`,
                    type: 'POST',
                    data: {
                        pin: pin,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {

                        if (response.status === true) {
                            window.location.href = `/account-manager/${name}`;
                        } else {
                            alert('Terjadi kesalahan, coba lagi.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan, coba lagi.');
                    }
                });
            });

            $('#cancelConfirmPinModal').click(function() {
                $("#PinModal").addClass("hidden");
            });
        }

        function loadAccountManager() {
            $.ajax({
                url: `/api/platform`,
                type: "GET",
                success: function(response) {
                    const container = $("#account-list");
                    container.empty();

                    // Periksa apakah data kosong atau null
                    if (!response.data || response.data.length === 0) {
                        const noDataMessage = `
                    <div class="text-center pt-5 text-gray-600 dark:text-gray-300">
                        Tidak ada data akun, silahkan tambahkan akun terlebih dahulu
                    </div>
                `;
                        container.append(noDataMessage);
                        return;
                    }

                    response.data.forEach(function(platform) {
                        const iconPath =
                            platform.is_editable == 0 ?
                            `assets/images/icons/${platform.icon}` :
                            `assets/images/icons/users/${platform.icon}`;

                        const html = `
                    <button class="p-2 lg:p-4 hover:shadow-lg hover:bg-gray-100 hover:transform hover:scale-105 transition-all duration-300 border-b" onclick="detailAccount('${platform.name}')">
                        <div class="flex items-center justify-between py-5">
                            <div class="flex gap-2">
                                <span class="flex items-center justify-center rounded-full">
                                    <img src="${iconPath}" width="24px" height="24px" alt="Logo-${platform.name}" />
                                </span>
                                <h5 class="ml-4 text-lg text-gray-600 dark:text-gray-300 font-semibold">${platform.name}</h5>
                            </div>
                            <div>
                                <i class="ti ti-chevron-right mt-1 text-gray-600 dark:text-gray-200"></i>
                            </div>
                        </div>
                    </button>
                `;
                        container.append(html);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                },
            });
        }

        $("#btn-newPlatform").click(function(e) {
            e.preventDefault();
            $("#platformName").val("");
            const myDropzone = Dropzone.forElement("#dropzone-basic");
            myDropzone.removeAllFiles();
            closeModal("addAccountModal");
            openModal("addPlatformModal");
        });
        $("#btn-newAccount").click(function(e) {
            e.preventDefault();
            $("#customFieldsContainer").empty();

            $.ajax({
                url: `/api/platform/${$("#user-id").val()}`,
                type: "GET",
                success: function(response) {
                    $("#accountType").empty();
                    $("#accountType").append(
                        '<option value="" disabled selected hidden>Pilih platform</option>'
                    );
                    $.each(response.data, function(index, platform) {
                        $("#accountType").append(
                            `<option value="${platform.id}">${platform.name}</option>`
                        );
                    });
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan saat mengambil data platform.");
                },
            });
            openModal("addAccountModal");
        });


        $(document).ready(function() {
            loadAccountManager();
            const myDropzone = new Dropzone("#dropzone-basic", {
                url: "/upload",
                paramName: "icon",
                maxFiles: 1,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                dictDefaultMessage: "Letakkan file di sini atau klik untuk mengunggah.",
                dictRemoveFile: "<i class='ti ti-trash text-danger text-xl'></i>",
                success: function(file, response) {
                    console.log("File uploaded successfully:", response);
                },
                error: function(file, errorMessage) {
                    console.error("Upload error:", errorMessage);
                },
            });
        });
    </script>
@endpush
