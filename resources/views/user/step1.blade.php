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

    <!-- ======= Step1 Section ======= -->
    <section>
        <div class="container">

          <div class="section-title">
            <h2>Make a reservation</h2>
          </div>
          @if(session('storeSuccess'))
          <div class="alert alert-warning alert-dismissible fade show mt-2 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12" role="alert">
              {{session('storeSuccess')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">step 1</div>
                  </div>
            </div>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 mt-5 mb-5">
                <form action="{{route('user#reservationNewStep1Btn')}}" method="get">
                    @csrf
                   <div class="mb-4">
                    <label for="" class='form-label'>Reservation Date And Time</label>
                    <input type="datetime-local" class="form-control @error('resDate') is-invalid @enderror" name="resDate" value="{{old('resDate')}}">
                    <small>Please reserve the time between 6pm to 11pm within next 5 days</small><br>
                    @error('resDate')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                   </div>
                   <div class="mb-2">
                    <label for="" class='form-label'>Guest Number</label>
                    <input type="number" class="form-control @error('guestNumber') is-invalid @enderror" name="guestNumber" value="{{old('guestNumber')}}">
                    @error('guestNumber')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                   </div>
                   <button class="btn btn-sm" type="submit" style="background-color: #ffb03b">Check tables</button>

                </form>
            </div>
          </div>
        </div>
      </section><!-- End Contact Section -->
@endsection
