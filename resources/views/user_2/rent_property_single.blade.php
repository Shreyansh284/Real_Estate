<!DOCTYPE html>
<html lang="en">


@extends('user_2.nav_master_view_u2')
@section('nav_master')
@endsection
<body>




  <main id="main">

    @foreach ($reg_data as $re )



    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{$re->location}}</h1>
              <span class="color-text-a">{{$re->city}}</span>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="property-single-carousel" class="swiper">
              <div class="swiper-wrapper">
                    @php
                    // $image=DB::table('property_rents')->first();
                    $images=explode('|',$re->picture);
                @endphp
                @foreach ($images as $ite)
                <div class="carousel-item-b swiper-slide">
                <img src="{{ URL::to($ite)}}" width="200" height="300" alt="">
            </div>

                @endforeach
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">

                        <h5 class="title-c"> &nbsp;&nbsp;&nbsp; ₹{{$re->price}} </h5>
                    </div>
                    <div class="card-title-c align-self-center">
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">

                      <li class="d-flex justify-content-between">
                        <strong>Address:</strong>
                        <span>{{$re->address}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span>{{$re->location}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>City:</strong>
                        <span>{{$re->city}}</span>
                      </li>

                      <li class="d-flex justify-content-between">
                        <strong>Area:</strong>
                        <span>{{$re->area}}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Beds:</strong>
                        <span>{{$re->bed}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Baths:</strong>
                        <span>{{$re->bath}}</span>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    {{$re->property_description}}
                  </p>

                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li>Balcony</li>
                    <li>Outdoor Kitchen</li>
                    <li>Cable Tv</li>

                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 text-center">
            <a href="{{ URL::to('/') }}/send_emailbuyer_to_houseier/{{ $re['id']}}/{{ $re['email']}}"><button type="submit" class="btn btn-a">Buy On Rent</button></a>
          </div>

        </div>
      </div>
    </section><!-- End Property Single-->

    @endforeach
  </main><!-- End #main -->

{{------------------------ Footer ----------------------}}



@section('master')

@endsection

</body>

</html>
