@extends('admin.master')
@section('mycontent')
<div class="container">
    <div class="row m-2">
        <div class="col-lg-6 offset-lg-3">
            <div class='mb-3'>
                <a href="{{route('admin#category')}}">
                    <button class='btn btn-sm btn-dark'>Category Index</button>
                </a>
            </div>
            <form action="{{route('admin#categoryUpdate',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="" class="formlabel">Name</label>
                    <input type="text" value="{{old('name',$category->name)}}" name="name" id="" class="form-control @error('name')     is-invalid @enderror">
                    @error('name')
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
