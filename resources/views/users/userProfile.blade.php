@extends('home')

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if (Auth::id() == $user->id)
                                @if ($user->images && $user->images->isNotEmpty())
                                <img src="{{ asset('public/images/' . $user->images->last()->name) }}" alt=""
                                    class="rounded-circle" width="150">
                                    @else
                                    <img src="" alt="User Has No Image"
                                    class="rounded-circle" width="150">
                                    @endif
                                @else
                                <img src="{{ asset('public/images/' . $user->images->last()->name) }}" alt=""
                                    class="rounded-circle" width="150">
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $user->f_name }} {{ $user->l_name }}</h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->f_name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->l_name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->gender }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->password }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    @auth
                                        @if (auth()->user()->hasRole('admin'))
                                            <a class="btn btn-info" target=""
                                                href="{{ route('edit', ['id' => $user->id]) }}">Edit</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
