<!DOCTYPE html>
<html lang="en">

{{-- ------------------------ Header Section ------------------- --}}
@extends('user_2.nav_master_view_u2')
@section('nav_bar')
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<body>



    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Our Amazing Properties</h1>
                            <span class="color-text-a">Grid Properties</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index_u2">Home &nbsp;</a>
                                </li>
                                <li class="" aria-current="page">
                                    /&nbsp; Rent
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->
        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="grid-option">
                            <form action="">
                                <input type="text"  name="search"  class="price-a" style="background-color:black" placeholder="Search City Or Area" >

                                <button type="submit" class="price-a" style="background-color:black" >Search</button>
                            </form>
                        </div>
                    </div>

                 @foreach ($data as $re)


                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                @php
                                $images=explode('|',$re->picture);
                             @endphp
                                <img src="{{ URL::to($images[0])}}" alt="" class="img-a img-fluid"  height="300px" width="200px" >
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="#">{{$re->location}}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <a href="{{ URL::to('/') }}/rent_property_single/{{ $re['id'] }}"> <span class="price-a">View More</span></a>                                       </div>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">City</h4>
                                                <span>{{$re->city}}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span>{{$re->bed}}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Rent</h4>
                                                <span>{{$re->price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Property Grid Single-->

    </main><!-- End #main -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryId = this.value;
                $('#state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id='+countryId,
                    type: 'get',
                    success: function (res) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(res, function (key, value) {
                            $('#state').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            // $('#state').on('change', function () {
            //     var stateId = this.value;
            //     $('#city').html('');
            //     $.ajax({
            //         url: '{{ route('getCities') }}?state_id='+stateId,
            //         type: 'get',
            //         success: function (res) {
            //             $('#city').html('<option value="">Select City</option>');
            //             $.each(res, function (key, value) {
            //                 $('#city').append('<option value="' + value
            //                     .id + '">' + value.name + '</option>');
            //             });
            //         }
            //     });
            // });
        });
    </script>

    {{-- ---------------------- Footer -------------------- --}}


    @section('master')
    @endsection

</body>

</html>
