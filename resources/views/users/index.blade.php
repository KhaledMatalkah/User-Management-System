@extends('home')

@section('content')
    <div class="container">
        <h2 style="position: relative; left: 45%; color: white;">Users</h2>

        <!-- Search Form -->
        <form action="{{ route('users.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by email, first name, or last name">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->f_name }}</td>
                            <td>{{ $user->l_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
