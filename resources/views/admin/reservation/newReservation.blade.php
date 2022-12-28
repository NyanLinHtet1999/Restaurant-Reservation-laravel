@extends('admin.master')
@section('mycontent')
    <div class="container">
        @if(session('errorTable'))
    <div class="alert alert-danger alert-dismissible fade show col-lg-5 offset-lg-3 col-md-6 offset-md-2 col-12 mt-2" role="alert">
        {{session('errorTable')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('tableNotFree'))
    <div class="alert alert-danger alert-dismissible fade show col-lg-5 offset-lg-3 col-md-6 offset-md-2 col-12" role="alert">
        {{session('tableNotFree')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <div class="row m-2">
            <div class="col-lg-6 offset-lg-3">
                <div class='mb-3'>
                    <a href="{{route('admin#reservation')}}">
                        <button class='btn btn-sm btn-dark'>Reservation Index</button>
                    </a>
                </div>
                <form action="{{route('admin#reservationStore')}}" method="post" >
                    @csrf
                    <div class="mb-2">
                        <label for="" class="formlabel">Name</label>
                        <input type="text" value="{{old('name')}}" name="name" id="" class="form-control @error('name')     is-invalid @enderror">
                        @error('name')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="formlabel">Email</label>
                        <input type="email" value="{{old('email')}}" name="email" id="" class="form-control @error('email')     is-invalid @enderror">
                        @error('email')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="formlabel">Phone number</label>
                        <input type="number" value="{{old('phoneNumber')}}" name="phoneNumber" id="" class="form-control @error('phoneNumber') is-invalid @enderror">
                        @error('phoneNumber')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="formlabel">Reservation Date And Time</label>

                        <input type="datetime-local" value="{{old('resDate')}}" name="resDate" id="" class="form-control @error('resDate') is-invalid @enderror">
                        <small>Please reserve the time between 6pm to 11pm within next 5 days</small><br>
                        @error('resDate')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="formlabel">Guest number</label>
                        <input type="number" value="{{old('guestNumber')}}" min=0 name="guestNumber" id="" class="form-control @error('guestNumber')     is-invalid @enderror">
                        @error('guestNumber')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="formlabel mb-1">Table</label>
                        <select name="tableId" id="" class="form-select @error('tableId') is-invalid @enderror">
                            <option value="">Choose table</option>
                            @foreach ($table as $t)
                            <option value="{{$t->id}}">{{$t->name}} ({{$t->guest_number}})</option>
                            @endforeach
                        </select>
                        @error('tableId')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button class="btn btn-sm btn-primary" type="submit">Store</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
