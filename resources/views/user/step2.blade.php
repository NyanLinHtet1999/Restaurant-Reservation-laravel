@extends('user.master')
@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container mt-lg-0 mt-md-5 mt-5">

      <div class="d-flex justify-content-between align-items-center">
        <ol>
          <li>You can book a tabel for dinner!</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

   <!-- ======= Book A Table Section ======= -->
   <section id="book-a-table" class="book-a-table">
    <div class="container ">
        <div class="section-title">
            <h2>Make a reservation</h2>
            @if (count($table)== 0)
            <span class="text-danger">No tabel is left for that day!Please choose another day!</span>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">step 2</div>
                  </div>
            </div>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 mt-5 mb-5">
                <form action="{{route('user#reservationNewStep2Btn')}}" method="post" >
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
                        <input type="datetime-local" value="{{$resDate}}" name="resDate" id="" hidden>
                    </div>
                    <div class="mb-2">
                        <input type="number" value="{{$guestNumber}}" name="guestNumber" id="" hidden>
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
                    <div class="d-flex justify-content-between">
                        <input type="button" value="Previous" onclick="history.back()" class="btn btn-sm" style='background-color:#ffb03b;'>
                        <button class="btn btn-sm " style='background-color:#ffb03b;' type="submit">Book</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
  </section><!-- End Book A Table Section -->
@endsection
