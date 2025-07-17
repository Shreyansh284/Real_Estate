<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

</body>

</html>
<section class="h-100 h-custom" style="background-color: #8fc4b7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                        class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                        alt="Sample photo">

                    <form action="{{ URL::to('/') }}/send_emailhouseier" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body p-5 p-md-5">

                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2"> Houseier Registration Info</h3>


                            @foreach ($std as $re)
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">Name</label>
                                    <div class="form-outline datepicker">
                                        <input type="text" class="form-control" name="name"
                                            id="exampleDatepicker1" value="{{ $re->name }}" readonly/>
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">Email</label>
                                    <div class="form-outline datepicker">
                                        <input type="email" class="form-control" id="exampleDatepicker1"
                                            name="email" value="{{ $re->email }}"  readonly   />
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">Password</label>
                                    <div class="form-outline datepicker">
                                        <input type="password" class="form-control" id="exampleDatepicker1"
                                            name="password" value="{{ old('password') }}" />
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">Confirm Password</label>
                                    <div class="form-outline datepicker">
                                        <input type="password" class="form-control" id="exampleDatepicker1"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}" />
                                        <span class="text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">Mobile.No</label>
                                    <div class="form-outline datepicker">
                                        <input type="number" class="form-control" id="exampleDatepicker1"
                                            name="mobile" value="{{ $re->mobile }}" readonly />
                                        <span class="text-danger">
                                            @error('mobile')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <br>
                            <button type="submit" class="btn btn-success btn-lg mb-2" name="btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
