@extends('admin/master')
@section('mycontent')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class='text-center'>Change Password</h2>
                @if (session('oldPasswordError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('oldPasswordError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (session('passwordChangeMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('passwordChangeMessage')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <form action="{{route('admin#changePassword')}}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="" class='form-label'>Old Password</label>
                        <input type="password" name="oldPassword" id="" class='form-control @error('oldPassword') is-invalid  @enderror' >
                        @error('oldPassword')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="" class='form-label'>New Password</label>
                        <input type="password" name="newPassword" id="" class='form-control @error('newPassword') is-invalid  @enderror' >
                        @error('newPassword')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="" class='form-label'>Comfirmed Password</label>
                        <input type="password" name="comfirmedPassword" id="" class='form-control @error('oldPassword') is-invalid  @enderror' >
                        @error('comfirmedPassword')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type='submit' class="btn btn-primary mt-2">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

