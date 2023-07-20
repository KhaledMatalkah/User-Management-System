@extends('home')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <h4></h4>
                <div class="card-header-action">
                    <a href="{{route('createUser')}}" id="btn-create" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
            <div id="all-table" class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-user">
                        <thead>
                        <tr>
                            <th id="t" class="text-center">ID</th>
                            <th id="t">First Name</th>
                            <th id="t">Last Name</th>
                            <th id="t">Email</th>
                            <th id="t">Gender</th>
                            <th id="t">Created At</th>
                            <th id="t">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $(function () {
        var table = $('#table-user').DataTable({
            ajax: '{{route("usertable")}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'f_name', name: 'f_name' },
                { data: 'l_name', name: 'l_name' },
                { data: 'email', name: 'email' },
                { data: 'gender', name: 'gender' },
                { data: 'created_at', name: 'created_at' },
                { data: 'actions', name: 'actions' },
            ],

            initComplete: function () {
                $("table").on("click", "#actionDelete", function () {
                    let url = $(this).data("url");
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        method: "POST",
                        success: function () {
                            table.ajax.reload(null, false);
                        }
                    });
                });
            }
        });

        App.reloadTable = function () {
            table.ajax.reload();
        };
    });
});
</script>

@endsection
