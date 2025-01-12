@extends('layouts.client')
@section('css')
    <style>
        /* .tab-one{
            img{
                max-width: 250px;
            }
        } */
    </style>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-white text-white">
                        <h4>My Account</h4>
                    </div>
                    <div class="card-body">
                        {{-- <div class="mb-3 text-center">
                            <img src="{{Storage::}}" alt="User Avatar" class="rounded-circle">
                        </div> --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Gender:</th>
                                    <td>{{ $user->gioi_tinh == 1 ? 'Male' : ($user->gioi_tinh == 2 ? 'Female' : 'Other') }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
