@extends('user.master')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url({{asset('assets/img/slide/slide-1.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Nyan</span> Restaurant</h2>
                <p class="animate__animated animate__fadeInUp">We invite you to sit back, unwind and delight in the elegant atmosphere of Nyan while our chef takes you on a culinary experience of contemporary, seasonal local cuisine with elements of cooking.</p>
                <div>
                  <a href="{{route('user#menu')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="{{route('user#reservationNewStep1')}}" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-2.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>About</span> Us</h2>
                <p class="animate__animated animate__fadeInUp">
                  A stunning combination of local and internationl fare for Myanmar people, Nyan's restaurant in Tharkayta, Yangon creates a dining experience that is deliciously familiar yet refined and innovative. With elegant indoor and outdoor dining, genuine hospitality and exquisite food Nyan's Restaurant boasts it all.</p>
                <div>
                  <a href="{{route('user#menu')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="{{route('user#reservationNewStep1')}}" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-3.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Nyan</span> Restaurant</h2>
                <p class="animate__animated animate__fadeInUp">

                  Tuesday-Sunday: 9am-8pm <br>
                  Open for Dinner Reservations Only <br>
                  kitchen closes at 10 <br>
                  </p>
                <div>
                  <a href="{{route('user#menu')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="{{route('user#reservationNewStep1')}}" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
   <!-- ======= Footer ======= -->
@endsection

