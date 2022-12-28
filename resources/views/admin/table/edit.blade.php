@extends('admin.master')
@section('mycontent')
    <div class="container">
        <div class="row m-2">
            <div class="col-lg-6 offset-lg-3">
                <div class='mb-3'>
                    <a href="{{route('admin#table')}}">
                        <button class='btn btn-sm btn-dark'>Table Index</button>
                    </a>
                </div>
                <form action="{{route('admin#tableUpdate',$table->id)}}" method="post" >
                    @csrf
                    <div class="mb-2">
                        <label for="" class="formlabel">Name</label>
                        <input type="text" value="{{old('name',$table->name)}}" name="name" id="" class="form-control @error('name')     is-invalid @enderror">
                        @error('name')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="formlabel">Guest number</label>
                        <input type="number" value="{{old('guestNumber',$table->guest_number)}}" name="guestNumber" id="" class="form-control @error('guestNumber')     is-invalid @enderror">
                        @error('guestNumber')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
