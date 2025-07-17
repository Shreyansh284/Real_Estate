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
                            <h1 class="title-single">Contact US</h1>
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="bi can bi-envelope"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">Say Hello</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">Email.
                                            <span class="color-a">sm2realestate@gmail.com</span>
                                        </p>
                                        <p class="mb-1">Phone.
                                            <span class="color-a">+91 9875641235</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home &nbsp;</a>
                                </li>
                                <li class=" " aria-current="page">
                                    / &nbsp;Contact
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Contact Single ======= -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-map box">
                            <div id="map" class="contact-map">
                                <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236295.5718656564!2d70.50979654559728!3d22.27350776296432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1696477293621!5m2!1sen!2sin"
                                {{-- src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" --}}
                                    width="100%" height="450" frameborder="0" style="border:0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    {{-- HIRE FORM --}}

                    <div class="col-sm-12 section-t8">
                        <a class="navbar-brand text-brand" href="/"> <span class="color-b">Apply For Job As a
                                Designer</span></a> <br> <br> <br>
                        <div class="row">
                            <div class="col-md-7">
                                <form action="{{ URL::to('/') }}/send_emailhireu1" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg form-control-a"
                                                    placeholder="Your Name" value="{{ old('name') }}">
                                                <span class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input name="email" type="email"
                                                    class="form-control form-control-lg form-control-a"
                                                    placeholder="Your Email" value="{{ old('email') }}">
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input name="mobile" type="number"
                                                    class="form-control form-control-lg form-control-a"
                                                    placeholder="Your Mobile Number" value="{{ old('mobile') }}">
                                                <span class="text-danger">
                                                    @error('mobile')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                Male <input type="radio" name="gender" id="" value="male" @if (old('gender')=='male' ) checked @endif>
                        Female <input type="radio" name="gender" id="" value="female" @if (old('gender')=='female' ) checked
                            @endif>
                        <br>
                        <span class="text-danger">
                            @error('gender')
                            {{ $message }}
                            @enderror
                        </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <textarea name="experience" class="form-control form-control-lg form-control-a"  cols="45"
                                                    rows="8" placeholder="Experience" value="{{ old('experience') }}"></textarea>
                                                <span class="text-danger">
                                                    @error('experience')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>



                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-a">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5 section-md-t3">
                                <div class="icon-box section-b2">
                                    <div class="icon-box-icon">
                                        <span class="bi can bi-envelope"></span>
                                    </div>
                                    <div class="icon-box-content table-cell">
                                        <div class="icon-box-title">
                                            <h4 class="icon-title">Say Hello</h4>
                                        </div>
                                        <div class="icon-box-content">
                                            <p class="mb-1">Email.
                                                <span class="color-a">sm2realestate@gmail.com</span>
                                            </p>
                                            <p class="mb-1">Phone.
                                                <span class="color-a">+91 9875641235</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="icon-box section-b2">
                                    <div class="icon-box-icon">
                                        <span class="bi can bi-geo-alt"></span>
                                    </div>
                                    <div class="icon-box-content table-cell">
                                        <div class="icon-box-title">
                                            <h4 class="icon-title">Find us in</h4>
                                        </div>
                                        <div class="icon-box-content">
                                            <p class="mb-1">
                                                Rajkot,Gujarat
                                                <br> India
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="icon-box">
                                    <div class="icon-box-icon">
                                        <span class="bi can bi-share"></span>
                                    </div>
                                    <div class="icon-box-content table-cell">
                                        <div class="icon-box-title">
                                            <h4 class="icon-title">Social networks</h4>
                                        </div>
                                        <div class="icon-box-content">
                                            <div class="socials-footer">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="link-one">
                                                            <i class="bi can bi-facebook" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="link-one">
                                                            <i class="bi can bi-twitter" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="link-one">
                                                            <i class="bi can bi-instagram" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="link-one">
                                                            <i class="bi can bi-linkedin" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Single-->

    </main><!-- End #main -->

    {{-- ---------------------- Footer -------------------- --}}


    @section('master')
    @endsection

</body>

</html>
