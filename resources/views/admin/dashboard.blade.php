@extends('admin.layouts.default')
@section('content')
@if(auth()->user()->role == 'admin')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12 d-flex justify-content-end">
        </div>
    </div>
    <div class="row rowmargin">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title">List</h5>
                        </div>
                        <div class="col-auto custom-list d-flex">
                            <div class="form-custom me-2">
                                <div id="tableSearch" class="dataTables_wrapper"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="datatables table table-borderless hover-table" id="admintable">

                            <thead class="thead-light">

                                <tr>
                                    <th>Sr.no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Action</th>


                                </tr>

                            </thead>
                            <tbody>
                         </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="tablepagination" class="dataTables_wrapper"></div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == 'employee')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12 d-flex justify-content-end">
        </div>
    </div>
    <div class="row rowmargin">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title">List</h5>
                        </div>
                        <div class="col-auto custom-list d-flex">
                            <div class="form-custom me-2">
                                <div id="tableSearch" class="dataTables_wrapper"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="datatables table table-borderless hover-table" id="table">

                            <thead class="thead-light">

                                <tr>
                                    <th>Sr.no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Action</th>


                                </tr>

                            </thead>
                            <tbody>
                         </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="tablepagination" class="dataTables_wrapper"></div>
        </div>
    </div>
</div>
@else

@endif
@stop
@push('styles')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script>
           $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                search: ' ',
                searchPlaceholder: "Search...",
                paginate: {
                    next: 'Next <i class="fas fa-chevron-right ms-2"></i>',
                    previous: '<i class="fas fa-chevron-left me-2"></i> Previous'
                }
            },
            "bFilter": true,
            "bInfo": false,
            "bLengthChange": false,
            "bAutoWidth": false,
            "ajax": {
                "url": "{{ route('get.employee') }}",
                "type": "GET",
                "data": function(data){
                    data._token="{!! csrf_token() !!}";
                },
            },
            "columns": [
                { "data": 'id',"name":'id','orderable': false, 'searchable': false,'width':'5%'},
                { "data": "name","name":"name"},
                { "data": "email","name":"v"},
                { "data": "phone","name":"phone"},
                { "data": "age","name":"age"},
                { "data": "address","name":"address"},
                { "data": "action",orderable: false, searchable: false,visible:true},
            ],
            "columnDefs": [
                {render: function (data, type, row, meta) {
                        return meta.row+1;
                    },
                    "targets":0,
                },

            ],
            "aaSorting": [],
            initComplete: (settings, json) => {
                $('.dataTables_paginate').appendTo('#tablepagination');
                $('.dataTables_filter').appendTo('#tableSearch');
            },
        });

        $('#admintable').DataTable({
            "language": {
                search: ' ',
                searchPlaceholder: "Search...",
                paginate: {
                    next: 'Next <i class="fas fa-chevron-right ms-2"></i>',
                    previous: '<i class="fas fa-chevron-left me-2"></i> Previous'
                }
            },
            "bFilter": true,
            "bInfo": false,
            "bLengthChange": false,
            "bAutoWidth": false,
            "ajax": {
                "url": "{{ route('get.all.employee') }}",
                "type": "GET",
                "data": function(data){
                    data._token="{!! csrf_token() !!}";
                },
            },
            "columns": [
                { "data": 'id',"name":'id','orderable': false, 'searchable': false,'width':'5%'},
                { "data": "name","name":"name"},
                { "data": "email","name":"email"},
                { "data": "phone","name":"phone"},
                { "data": "age","name":"age"},
                { "data": "address","name":"address"},
                { "data": "action",orderable: false, searchable: false,visible:true},
            ],
            "columnDefs": [
                {render: function (data, type, row, meta) {
                        return meta.row+1;
                    },
                    "targets":0,
                },

            ],
            "aaSorting": [],
            initComplete: (settings, json) => {
                $('.dataTables_paginate').appendTo('#tablepagination');
                $('.dataTables_filter').appendTo('#tableSearch');
            },
        });
    });
 

    function pack_del(id){
        console.log(id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: 'green',
          cancelButtonColor: 'red',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type:'post',
                url:'{!! route("employee.destroy",'+id+') !!}',
                data:{_token:'{{csrf_token()}}',_method:'delete',id:id},
                success:function(data){
                    Swal.fire('Deleted!','Your Data has been deleted.','success')
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var data=$.parseJSON(jqXHR.responseText);
                    Swal.fire('Error!','Failed','error')
                }
            });


          }
        })
  }
</script>
@endpush