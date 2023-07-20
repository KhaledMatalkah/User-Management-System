@extends('home')

@section('content')
    <div class="container">
        <h2 style="color: rgb(255, 255, 255); position: relative; left: 25%;">Departments</h2>

        <!-- Create Department Modal Trigger Button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createDepartmentModal">
            Create Department
        </button>

        @if ($departments->isEmpty())
            <p>No departments found.</p>
        @else
            <table id="departmentTable" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <button class="btn btn-danger delete-department" data-department-id="{{ $department->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>

    <!-- Create Department Modal -->
    <div class="modal fade" id="createDepartmentModal" tabindex="-1" role="dialog"
        aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDepartmentModalLabel">Create Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Department Creation Form -->
                    <form id="createDepartmentForm" method="POST" action="{{ route('departments.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajax Script -->
<!-- Ajax Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXX"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    $(document).ready(function() {
        // Set CSRF token for all Ajax requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#createDepartmentForm').submit(function(event) {
            event.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();

            $.ajax({
                url: url,
                type: method,
                data: data,
                dataType: 'json',
                success: function(response) {
                    toastr.success('Department created successfully!');
                    reloadTable();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON.message ||
                        'Error creating department. Please try again.';
                    toastr.error(errorMessage);
                }
            });
        });

        $(document).on('click', '.delete-department', function() {
            var departmentId = $(this).data('department-id');

            // Confirmation dialog
            if (confirm('Are you sure you want to delete this department?')) {
                $.ajax({
                    url: '/departments/' + departmentId,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        toastr.success(response.message);
                        reloadTable();
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON.message || 'Error deleting department.';
                        toastr.error(errorMessage);
                    }
                });
            }
        });

        // Reload Table Ajax Request
        function reloadTable() {
            var url = '{{ route('departments.index') }}';

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    var table = $(data).find('#departmentTable');
                    $('#departmentTable').replaceWith(table);
                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to reload the table. Please refresh the page.');
                }
            });
        }
    });
</script>


@endsection
