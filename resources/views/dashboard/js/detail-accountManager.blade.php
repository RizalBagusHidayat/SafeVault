@push('scripts')
    <script>
        $('#updateAccount').click(function(e) {
            e.preventDefault();
            const form = document.getElementById("updateAccountForm");
            const formData = new FormData(form);
            const accountId = $('#accountId').val();
            console.log(accountId);

            $.ajax({
                url: `{{ route('account.update', ':account') }}`.replace(':account', accountId),
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                success: function(response) {
                    closeModal("updateAccountModal");
                    loadDetailAccount();
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan.");
                },
            });
        });




        function loadDetailAccount() {
            const provider = $('input[name="provider"]').val();
            const url = `{{ route('account.show', ['account' => ':provider']) }}`.replace(':provider', provider);
            $.ajax({
                url,
                type: "GET",
                success: function(response) {
                    if (response.status === true) {
                        const container = $(".table-container");
                        container.empty();

                        response.data.forEach((account) => {
                            const details = JSON.parse(account.account_details);
                            const iconPath = account.platform.is_editable == 0 ?
                                `{{ asset('assets/images/icons/${account.platform.icon}') }}` :
                                `{{ asset('assets/images/icons/users/${account.platform.icon}') }}`;

                            container.append(`
                        <div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm mb-6">
                            <div class="flex items-center gap-4 p-4 border-b">
                                <img src="${iconPath}" alt="${account.platform.name}" class="w-10 h-10">
                                <h3 class="text-lg font-semibold text-gray-700">${account.platform.name}</h3>
                            </div>
                            <table class="table-auto w-full border-collapse border-gray-300">
                                <tbody class="divide-y divide-gray-200">
                                    ${details.map((detail, index) => `
                                        <tr>
                                            <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">${detail.label}</td>
                                            <td class="px-4 py-3 align-top flex items-center gap-2 text-gray-600">
                                                <span id="detailValue-${account.id}-${index}">${detail.hidden == 1 ? '*****' : detail.value}</span>
                                                ${detail.hidden == 1 
                                                    ? `<button class="text-blue-500 hover:underline" onclick="toggleDetail('${account.id}', ${index}, '${detail.value}')">Lihat</button>` 
                                                    : '<button class ="text-blue-500 hover:underline" onclick="copyToClipboard(\'' + detail.value + '\')">Salin</button>'}
                                            </td>
                                        </tr>`).join("")}
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Catatan</td>
                                        <td class="px-4 py-3 align-top text-gray-500">${account.notes || 'Tidak ada catatan yang ditambahkan'}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="flex justify-end p-4 gap-2">
                                <button class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-blue-600" onclick="editAccount(${account.id})">Edit</button>
                                <button class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600" onclick="deleteAccount(${account.id}, '${details[0].value}')">Hapus</button>
                            </div>
                        </div>
                    `);
                        });
                    } else {
                        alert("Data akun tidak ditemukan.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan saat mengambil data account.");
                },
            });
        }

        function copyToClipboard(text) {
            const tempInput = document.createElement('input');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            alert("Teks berhasil disalin ke clipboard!");
        }

        function toggleDetail(accountId, index, originalValue) {
            const detailSpan = document.getElementById(`detailValue-${accountId}-${index}`);
            const button = event.target;

            if (detailSpan.textContent === "*****") {
                detailSpan.textContent = originalValue;
                button.textContent = "Sembunyikan";
            } else {
                detailSpan.textContent = "*****";
                button.textContent = "Lihat";
            }
        }

        function editAccount(accountId) {
            $("#customFieldsContainer").empty(); // Kosongkan container sebelum mengisi data baru

            $.ajax({
                url: `/api/platform/${$("#user-id").val()}`,
                type: "GET",
                success: function(response) {
                    $("#accountType").empty(); // Kosongkan select
                    $("#accountType").append(
                        '<option value="" disabled selected hidden>Pilih platform</option>'
                    );
                    $.each(response.data, function(index, platform) {
                        $("#accountType").append(
                            `<option value="${platform.id}">${platform.name}</option>`
                        );
                    });
                    $('#accountId').val(accountId);
                    fetchAccountDetails(accountId);
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan saat mengambil data platform.");
                },
            });

            function fetchAccountDetails(accountId) {
                $.ajax({
                    url: `{{ route('account.edit', ':account') }}`.replace(':account', accountId),
                    type: "GET",
                    success: function(response) {
                        if (response.data) {
                            const accountDetails = JSON.parse(response.data.account_details);
                            const platformId = response.data.platform_id;
                            const notes = response.data.notes;

                            $("#accountType").val(platformId).prop('disabled', true);

                            accountDetails.forEach((detail) => {
                                addCustomField();
                                const container = $("#customFieldsContainer");
                                const lastField = container.children()
                                    .last();
                                lastField.find(`input[name="customLabel[${fieldCount}]"]`).val(detail
                                    .label);
                                lastField.find(`input[name="customValue[${fieldCount}]"]`).val(detail
                                    .value);
                                if (detail.hidden === "1") {
                                    lastField.find(`input[name="customHidden[${fieldCount}]"]`).prop(
                                        "checked",
                                        true
                                    );
                                }
                            });

                            $("#notes").val(notes);
                        } else {
                            alert("Data tidak ditemukan atau kosong.");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan saat mengambil data akun.");
                    },
                });
            }

            openModal('updateAccountModal');
        }

        function deleteAccount(accountId, account) {
            Swal.fire({
                title: 'Keluar',
                text: `Apakah Yakin anda ingin menghapus ${account}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'min-w-24',
                cancelButtonClass: 'min-w-24',
                confirmButtonColor: '#3490dc',
                cancelButtonColor: '#e74c3c',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('account.destroy', ['account' => ':id']) }}".replace(
                            ':id',
                            accountId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == true) {
                                window.location.href = '/account-manager';
                            }
                        }
                    });
                }
            });
        }


        $(document).ready(function() {
            loadDetailAccount();
        });
    </script>
@endpush
