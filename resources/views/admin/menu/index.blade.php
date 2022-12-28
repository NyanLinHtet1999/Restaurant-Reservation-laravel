@extends('admin.master')
@section('mycontent')
<div class="container">
    @if(session('storeSuccess'))
    <div class="alert alert-primary alert-dismissible fade show col-lg-5 col-md-6 col-12 mt-2" role="alert">
        {{session('storeSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('deleteSuccess'))
    <div class="alert alert-danger alert-dismissible fade show col-lg-5 col-md-6 col-12 mt-2" role="alert">
        {{session('deleteSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('updateSuccess'))
    <div class="alert alert-warning alert-dismissible fade show col-lg-5 col-md-6 col-12 mt-2" role="alert">
        {{session('updateSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mt-2 text-end">
        <a href="{{route('admin#newMenu')}}">
            <button class="btn btn-sm btn-primary">New Menu</button>
        </a>
    </div>
    <div class="row">
        <div class="col-12 overflow-scroll">
    <table class="table align-middle mb-0 bg-white mt-2 ">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th></th>
          </tr>
        </thead>
       @foreach ($menu as $m)
       <tbody>
        <tr>
          <td>
              {{$m->name}}
          <td>
            <img src="{{asset('storage/'.$m->image)}}" width="100px">
          </td>
          <td>{{$m->price}}</td>
          <td>
              <div class="d-flex">
                <a href="{{route('admin#menuEdit',$m->id)}}"><button type="button" class="btn btn-success btn-sm me-1">
                    Edit
                  </button></a>

                <a href="{{route('admin#menuDelete',$m->id)}}">
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </a>
              </div>
            </td>
        </tr>
      </tbody>
       @endforeach
      </table>
    </div>
    </div>
</div>
@endsection
