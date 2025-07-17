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

        <div class="row">
            @foreach ($idata as $item)
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle  mt-4" src="{{ URL::to('/') }}/image/{{ $item->image }}"
                            width="90"><span class="font-weight-bold">{{ $item->name }}</span><span
                            class="text-black-50">{{ $item->email }}</span>

                    </div>
                </div>
            @endforeach
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i
                                class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a href="edithouseier" style="text-decoration: none">
                                <h6>Back to Profile</h6>
                            </a>
                        </div>
                        <h6 class="text-right">Change Password</h6>
                    </div>

                    <form action="{{ URL::to('/') }}/change_password_u4" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-2">
                            <div class="col-md-12"><input type="password" class="form-control"
                                    placeholder="Current Password" name="password" value="{{ old('password') }}"></div>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6"><input type="password" class="form-control" placeholder="New Password"
                                    name="new_password" value="{{ old('new_password') }}">
                                <span class="text-danger">
                                    @error('new_password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-6"><input type="password" class="form-control"
                                    placeholder="Confirm New Password" name="confirm_new_password"
                                    value="{{ old('confirm_new_password') }}">
                                <span class="text-danger">
                                    @error('confirm_new_password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                type="submit">Change
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>
