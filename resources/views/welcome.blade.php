
@extends('layout.app')


<!-- page specific styles -->
@section('styles')
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
@endsection

<!-- end page specific styles -->

@section('content')

    <h2> Customer Records </h2>
    <table class="table table-striped  " id="table">
        <thead>

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Bio</th>
        </tr>
        </thead>
    </table>

    @endsection

<!-- page specific js -->
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src=" "></script>
    <script>
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',

                buttons: [
                    {
                        extend: 'pdf',
                        text: 'Export to PDF',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },


                ],
                ajax: '{{ route('customer.fetch.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'bio', name: 'bio' }
                ]
            });
        });
    </script>
@endsection
