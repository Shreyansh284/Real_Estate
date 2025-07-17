<!DOCTYPE html>
<html lang="en">


@extends('user_1.nav_master_view')
@section('nav_master')
@endsection
<body>


  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">We Do Great Design For Creative Folks</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Home &nbsp;</a>
                </li>
                <li class="" aria-current="page">
                  /&nbsp; About
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= About Section ======= -->
    <section class="section-about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 position-relative">
            <div class="about-img-box">
              <img src="user_1/img/slide-about-1.jpg" alt="" class="img-fluid">
            </div>
            <div class="sinse-box">
              <h3 class="sinse-title">EstateAgency
                <span></span>
                <br> Sinse 2023
              </h3>
              <p>Art & Creative</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- =======Team Section ======= -->
    <section class="section-agents section-t8">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap d-flex justify-content-between">
                <div class="title-box">
                  <h2 class="title-a">Team Heads</h2>
                </div>

              </div>
            </div>
          </div>


          <div class="row">
              @foreach ($std as $re)
            <div class="col-md-4">
              <div class="card-box-d">
                <div class="card-img-d" style="height: 400px" >
                  <img src="{{ URL::to('/') }}/image/{{ $re->image }}" alt="" class="img-d img-fluid"  >
                </div>
                <div class="card-overlay card-overlay-hover">
                  <div class="card-header-d">
                    <div class="card-title-d align-self-center">
                      <h3 class="title-d">
                        <a href="" class="link-two"  style="text-decoration" >{{$re->name}}
                          <br> <p class="nav-link active" style="font-size: 20px; color:rgba(223, 219, 219, 0.793) " >{{$re->post}}</p></a>
                      </h3>
                    </div>
                  </div>
                  <div class="card-body-d">
                    <p class="content-d color-text-a">
                        {{$re->description}}
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>{{$re->mobile}}
                      </p>
                      <p>
                        <strong>Email: </strong> {{$re->email}}
                      </p>
                    </div>
                  </div>
                  <div class="card-footer-d">
                    <div class="socials-footer d-flex justify-content-center">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                          </a>
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
      </section><!-- End Agents Section -->

  </main><!-- End #main -->

{{------------------------ Footer ----------------------}}


@section('master')

@endsection


</body>

</html>
