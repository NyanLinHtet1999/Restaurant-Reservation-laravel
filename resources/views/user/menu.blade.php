@extends('user.master')
@section('content')
  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container mt-lg-0 mt-md-5 mt-5">

      <div class="d-flex justify-content-between align-items-center">
        <ol>
          <li>Enjoy the meal!</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->



      <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu"  style="min-height: 600px">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <a href="{{route('user#menu')}}"><li class="{{ (request()->is('user/menu')) ? 'filter-active' : '' }}">Show All</li></a>
              @foreach ($category as $c)
              <a href="{{route('user#categoryFilter',$c->id)}}"><li class="{{ (request()->segment(5) == $c->id) ? 'filter-active' : '' }}">{{$c->name}}</li></a>

              @endforeach
            </ul>
          </div>
        </div>

        <div class="row menu-container" >


            @foreach ($menu as $m)
            <div class="col-lg-6 menu-item filter-starters">
                    <div class="menu-content">
                        <a href="{{route('user#food',$m->id)}}">{{$m->name}}</a><span>${{$m->price}}</span>
                      </div>
                      <div class="menu-ingredients">
                        {{Str::words($m->description,10,'...')}}
                      </div>
            </div>
            @endforeach



          </div>
      </div>
    </section><!-- End Menu Section -->
@endsection
