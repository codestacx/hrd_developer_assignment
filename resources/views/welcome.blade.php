
@extends('layout.app')


<!-- page specific styles -->
@section('styles')
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
@endsection

<!-- end page specific styles -->

@section('content')

    <!-- bootstrap page load model -->

    <div class="alert alert-success" id="error_log">
        Internet is required to fetch the assets required to run the Yajra Datatables properly. <br>
        Please make sure to have active internet connection.
    </div>
    <!-- end of modal -->
    <h2> Customer Records </h2>
    <table class="table table-striped table-bordered" id="table" style="width: 100%">
        <thead>

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Bio</th>
        </tr>
        </thead>
    </table>

    @endsection

<!-- page specific js  -->

<!-- js files especially required for Yajra Datatables -->

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

    <script>
        setTimeout(()=>{
            document.getElementById('error_log').style.display='none'
        },5000)
        $(function() {
            $('#table').DataTable({

                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv',
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        pageSize:'LEGAL',
                        filename:'Customer Data_version' + Math.floor(new Date().getTime()/1000),
                        messageTop:'Customer Data',
                        messageBottom:'\n\nAll rights reserved @ Developed by Muhammad Atif',



                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        pageSize:'LEGAL',
                        filename:'Customer Data_version' + Math.floor(new Date().getTime()/1000),
                        messageTop:'Customer Data',
                        messageBottom:'\n\nAll rights reserved @ Developed by Muhammad Atif',



                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }
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
