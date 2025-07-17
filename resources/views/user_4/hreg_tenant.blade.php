@extends('/user_4/hmaster')
@section('master')
<form action="{{ URL::to('/') }}/regtenant"  method="post" enctype="multipart/form-data" >
    @csrf

                <div class="card-body p-5 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">   Tenant Registration Info</h3>

                  <div class="row">

                    <div class="col-md-6 mb-4">
                  <label for="exampleDatepicker1" class="form-label">Name</label>

                <div class="form-outline datepicker">
                  <input type="text" class="form-control" name="name" id="exampleDatepicker1" value="{{ old('name') }}" />
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
                  <input type="email" class="form-control" id="exampleDatepicker1" name="email" value="{{ old('email') }}" />
                  <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
                </div>

              </div>

              <div class="col-md-6 mb-4">
                <label for="exampleDatepicker1" class="form-label">Name Of Rent-House</label>

              <div class="form-outline datepicker">
                <input type="text" class="form-control" name="housename" id="exampleDatepicker1" value="{{ old('housename') }}" />
                <span class="text-danger">
                    @error('housename')
                    {{ $message }}
                    @enderror
                </span>
              </div>

            </div>


                  <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Mobile.No</label>

                  <div class="form-outline datepicker">
                    <input type="number" class="form-control" id="exampleDatepicker1" name="mobile" value="{{ old('mobile') }}" />
                    <span class="text-danger">
                        @error('mobile')
                        {{ $message }}
                        @enderror
                    </span>
                  </div>
                </div>

                </div>



      <br>
                    <button type="submit" class="btn btn-success btn-lg mb-2" name="btn">Buy</button>

                  </form>

                </div>

   @endsection
