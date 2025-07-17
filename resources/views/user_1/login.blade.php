
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>


<section style="background-color: #8fc4b7; height:100%;  ">


    <div class="container py-5 h-100">

      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
              class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
              alt="Sample photo">

              <div class="card-body p-4 p-md-5">


            @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!! </strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Info</h3>

              <form class="px-md-2" method="post" action="{{URL::to('/')}}/login_validate">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Email</label>

                      <div class="form-outline datepicker">
                        <input type="email" class="form-control" id="exampleDatepicker1" name="email" />
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
                        <input type="password" class="form-control" id="exampleDatepicker1" name="password" />
                        <span class="text-danger">
                          @error('password')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>

                    <a href="registration" class="form-label" style="text-decoration: none; color:rgb(0, 128, 100)" >Create An Account</a>
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
</body>
</html>
