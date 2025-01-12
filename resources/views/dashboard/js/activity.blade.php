@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true, // Menampilkan indikator loading
                serverSide: true, // Aktifkan server-side processing
                ajax: "", // URL endpoint untuk fetch data
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'activity',
                        name: 'activity'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
            });
        });
    </script>
@endpush
