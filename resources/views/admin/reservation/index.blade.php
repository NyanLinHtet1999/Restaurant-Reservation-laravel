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
        <a href="{{route('admin#newReservation')}}">
            <button class="btn btn-sm btn-primary">New Reservation</button>
        </a>
    </div>
    <div class="row">
        <div class="col-12 overflow-scroll">
    <table class="table align-middle mb-0 bg-white mt-2" style="min-width: 850px; overflow-x:scroll;">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Table</th>
            <th>Guests</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservation as $r)
          <tr>
            <td>
               {{$r->name}}
            </td>
            <td>
                {{$r->email}}
            <td>
              {{date('d-m-Y h:i A', strtotime($r->res_date))}}
            </td>
            <td>
                {{$r->table_name}}({{$r->table_guest_number}} @if ($r->table_guest_number > 1)
                    Guests
                @else
                    Guest
                @endif)
            </td>
            <td>
                {{$r->guest_number}}
            </td>
            <td>
                <div class="d-flex">
                  <a href="{{route('admin#reservationEdit',$r->id)}}"><button type="button" class="btn btn-success btn-sm me-1">
                      Edit
                    </button></a>

                  <a href="{{route('admin#reservationDelete',$r->id)}}">
                          <button type="button" class="btn btn-sm btn-danger">Delete</button>
                  </a>
                </div>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>
@endsection
