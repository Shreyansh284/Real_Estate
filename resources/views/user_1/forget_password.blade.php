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
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Forget Password</h3>

                        <form class="px-md-2" method="post" action="{{ URL::to('/') }}/forget_password">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">New Password</label>

                                    <div class="form-outline datepicker">
                                        <input type="password" class="form-control" id="exampleDatepicker1"
                                            name="new_password" placeholder="New Password"/>
                                        <span class="text-danger">
                                            @error('new_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="exampleDatepicker1" class="form-label">Confirm New Password</label>

                                    <div class="form-outline datepicker">
                                        <input type="password" class="form-control" id="exampleDatepicker1"
                                            name="confirm_new_password" placeholder="Confirm New Password" />
                                        <span class="text-danger">
                                            @error('confirm_new_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                </div>


                            </div>
                            <br>

                            <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
