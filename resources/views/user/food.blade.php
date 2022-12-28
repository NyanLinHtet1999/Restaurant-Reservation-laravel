@extends('user.master')
@section('content')
 <!-- ======= Breadcrumbs Section ======= -->
 <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <ol>
          <li><a href="{{route('user#menu')}}" class="text-decoration-color-none">menu</a></li>
          <li><a href="">{{$food->name}}</a></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->
  {{-- food start  --}}
  <section style="min-height: 300px">
    <div class="container mt-lg-0 mt-md-5 mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-8 offset-md-2 col-10 offset-1 mb-4">
                <div class="w-100">
                    <img src="{{asset('storage/'.$food->image)}}" alt="" width="100%">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <h2 class="text-center">{{$food->name}}</h2>
                <p>{{$food->description}}</p>
                <p>Price-{{$food->price}}$</p>
            </div>
        </div>
    </div>
  </section>
  {{-- food end  --}}
@endsection
