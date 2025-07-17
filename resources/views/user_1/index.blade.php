<!DOCTYPE html>
<html lang="en">


@extends('user_1.nav_master_view')
@section('nav_master')
@endsection

<body>
    <main id="main">
    <!-- ======= Intro Section ======= -->
    <div class="intro intro-carousel swiper position-relative">

        <a href="registration">
            <div class="swiper-wrapper">
                @foreach ($pb as $prb )

                <div class="swiper-slide carousel-item-a intro-item bg-image"
                @php
                $images=explode('|',$prb->picture);
             @endphp
                {{-- <img src="{{ URL::to($images[0])}}" alt="" class="img-a img-fluid"> --}}
                    style="background-image: url({{ URL::to($images[0])}})">
                    <div class="overlay overlay-a"></div>
                    <div class="intro-content display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="intro-body">
                                            <p class="intro-title-top">{{$prb->location}},
<br>{{$prb->city}}
                                            </p>
                                            <h1 class="intro-title mb-4 ">
                                                <span class="color-b">{{$prb->address}} </span>
                                                <br>
                                            </h1>
                                            <p class="intro-subtitle intro-price">
                                                <a href="#"><span class="price-a">Buy | ₹ {{$prb->price}}</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
            </div>
        </a>
        <div class="swiper-pagination"></div>
    </div><!-- End Intro Section -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section class="section-services section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Our Services</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-box-c foo">
                            <div class="card-header-c d-flex">
                                <div class="card-box-ico">
                                    <span class="bi bi-cart"></span>
                                </div>
                                <div class="card-title-c align-self-center">
                                    <h2 class="title-c">Lifestyle</h2>
                                </div>
                            </div>
                            <div class="card-body-c">
                                <p class="content-c">

                                    A view is a scene or vista that's visible from a certain point. If you think your
                                    hotel room has a view of the ocean, it'll be disappointing to open the blinds and
                                    discover your view of a Dumpster instead. The range of what you can see is also
                                    called your view.
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box-c foo">
                            <div class="card-header-c d-flex">
                                <div class="card-box-ico">
                                    <span class="bi bi-calendar4-week"></span>
                                </div>
                                <div class="card-title-c align-self-center">
                                    <h2 class="title-c">Rent</h2>
                                </div>
                            </div>
                            <div class="card-body-c">
                                <p class="content-c">
                                    a payment made periodically by a tenant to a landlord or owner for the occupation or
                                    use of land, buildings, or by a user for the use of other property, such as a
                                    telephone.
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box-c foo">
                            <div class="card-header-c d-flex">
                                <div class="card-box-ico">
                                    <span class="bi bi-card-checklist"></span>
                                </div>
                                <div class="card-title-c align-self-center">
                                    <h2 class="title-c">Sell</h2>
                                </div>
                            </div>
                            <div class="card-body-c">
                                <p class="content-c">
                                    You can sell your property either through a property agent or list it online on a
                                    property portal like Magicbricks.com, where you can connect with buyers. You can
                                    also put your property on sale through advertisements. You can also make some
                                    improvements in your house before selling.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Latest Properties Section ======= -->

            <section class="section-property section-t8">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                    <h2 class="title-a">Latest Properties</h2>
                                </div>
                                <div class="title-link">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="property-carousel" class="swiper">

                        <div class="swiper-wrapper">
                            @foreach ($pb as $prb )

                            <div class="carousel-item-b swiper-slide">

                                <div class="card-box-a card-shadow">
                                    <div class="img-box-a">
                                        @php
                                        $images=explode('|',$prb->picture);
                                     @endphp
                                        <img src="{{ URL::to($images[0])}}" alt="" class="img-a img-fluid">
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-a-content">
                                            <div class="card-header-a">
                                                <h2 class="card-title-a">
                                                    <a href="">{{$prb->address}}</a>
                                                </h2>
                                            </div>
                                            <div class="card-body-a">
                                                <div class="price-box d-flex">
                                                    <a href="registration"> <span class="price-a">buy |
                                                            Rs.{{$prb->price}}</span></a>
                                                </div>

                                            </div>
                                            <div class="card-footer-a">
                                                <ul class="card-info d-flex justify-content-around">
                                                    <li>
                                                        <h4 class="card-info-title">Area</h4>
                                                        <span>{{$prb->area}}
                                                            <sup>2</sup>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title">Beds</h4>
                                                        <span>{{$prb->bed}}</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title">City</h4>
                                                        <span>{{$prb->city}}</span>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End carousel item -->
                            @endforeach


                        </div>

                    </div>

        <div class="propery-carousel-pagination carousel-pagination"></div>

        </div>
        </section><!-- End Latest Properties Section -->

        <!-- ======= Agents Section ======= -->



        <!-- ======= Feedback Section ======= -->
        <section class="section-testimonials section-t8 nav-arrow-a">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Feedbacks</h2>
                            </div>
                        </div>
                    </div>
                </div>

                {{--  --}}

                <div id="testimonial-carousel" class="swiper">


                    <div class="swiper-wrapper">
                        @foreach ($std as $re )

                        <div class="carousel-item-a swiper-slide">
                            <div class="testimonials-box">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="testimonial-img">
                                        <img src="user_1/img/f.png"  alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="testimonial-ico">
                                            <i class="bi bi-chat-quote-fill"></i><br>
                                            <p class="testimonial-ico">
                                                {{$re->name}}
                                            </p>
                                        </div>
                                        <div class="testimonials-content">
                                            <p class="testimonial-text">
                                                {{$re->feedback}}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- End carousel item -->



                        @endforeach
                    </div>
                </div>
                <div class="testimonial-carousel-pagination carousel-pagination"></div>

            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->

    {{-- ---------------------- Footer -------------------- --}}


    @section('master')

    @endsection


</body>

</html>
