<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="user_2/css/profil.css">

</head>

<body>
    <div class="container rounded bg-white mt-5">
        <form  method="post" action="{{ URL::to('/') }}/edit_u2"   enctype="multipart/form-data">
            @csrf
            @foreach ($idata as $item)
                <div class="row">

                    <div class="col-md-4 border-right">
                        <br><br>
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                 src="{{ URL::to('/') }}/image/{{ $item->image }}" style="border-radius: 50%"   height="200px" width="200px"><span
                                class="font-weight-bold">{{ $item['name'] }}</span><span
                                class="text-black-50">{{ $item['email'] }}</span>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i
                                        class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <a href="index_u2" style="text-decoration: none">
                                        <h6>Back to home</h6>
                                    </a>
                                </div>
                                <h6 class="text-right">Edit Profile</h6>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control"
                                        placeholder="first name" value="{{ $item['name'] }}" name="name"
                                     >
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6"><input type="email" class="form-control" placeholder="Email"
                                        value="{{ $item['email'] }}" disabled></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><input type="number" class="form-control" value="{{ $item['mobile'] }}"
                                        placeholder="Phone number" name="mobile" ><span
                                        class="text-danger">
                                        @error('mobile')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                <div class="col-md-6">
                                    <input type="text" name="gender" id="" value="male"
                                        class="form-control" placeholder="Gender" disabled>
                                </div>

                            </div>
                            <div class="row mt-3">  <div class="col-md-6">
                                <input type="file" name="image" id="" value="{{ $item["image"] }}"
                                    class="form-control" >
                            </div></div>
                            <div class="mt-5 text-right">
                                <a href="change_password"><button
                                        class="btn btn-primary profile-button" type="button">Change
                                        Password</button></a>
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </form>
    </div>
</body>

</html>
