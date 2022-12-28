@extends('admin/master')
@section('mycontent')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class='text-center'>Admin Info</h2>
                <form action="{{route('admin#update')}}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="" class='form-label'>Name</label>
                        <input type="text" name="name" id="" class='form-control' value="{{Auth::user()->name}}">
                    </div>
                    <div>
                        <label for="" class='form-label'>Email</label>
                        <input type="text" name="email" id="" class='form-control' value="{{Auth::user()->email}}">
                    </div>
                    <div class="text-end">
                        <button type='submit' class="btn btn-primary mt-2">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
