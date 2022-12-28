@extends('admin.master')
@section('mycontent')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
    @if(session('storeSuccess'))
    <div class="alert alert-primary alert-dismissible fade show col-12 mt-2" role="alert">
        {{session('storeSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('deleteSuccess'))
    <div class="alert alert-danger alert-dismissible fade show col-12 mt-2" role="alert">
        {{session('deleteSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('updateSuccess'))
    <div class="alert alert-warning alert-dismissible fade show col-12 mt-2" role="alert">
        {{session('updateSuccess')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mt-2 text-end">
        <a href="{{route('admin#newTable')}}">
            <button class="btn btn-sm btn-primary">New Table</button>
        </a>
    </div>
    <div class="row">

    <table class="table align-middle mb-0 bg-white mt-2" >
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Guest Number</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($table as $t)
          <tr>
            <td>
                {{$t->name}}
            </td>
            <td>
              {{$t->guest_number}}
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{route('admin#tableEdit',$t->id)}}"><button type="button" class="btn btn-success btn-sm me-1">
                        Edit
                      </button></a>

                    <a href="{{route('admin#tableDelete',$t->id)}}">
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                    </a>
                  </div>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection
