@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('updateUser', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="name">First Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{$user->f_name}}" class="form-control @error('name') is-invalid @enderror" name="f_name" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="name">Last Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{$user->l_name}}" class="form-control @error('name') is-invalid @enderror" name="l_name" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>
                                <div class="col-md-6">
                                    <input type="radio" id="male" name="gender" value="Male" {{ $user->gender === 'Male' ? 'checked' : '' }}>
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="gender" value="Female" {{ $user->gender === 'Female' ? 'checked' : '' }}>
                                    <label for="female">Female</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>
                                <div class="col-md-6">
                                    <select name="department" id="department" class="form-control">
                                        <option value="" selected>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ $user->department_id === $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="password">Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="password" id="password" required placeholder="Password" value="" oninvalid="this.setCustomValidity('Please Enter a Password')" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="images">Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="images" id="images" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary m-3">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
