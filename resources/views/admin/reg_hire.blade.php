@extends('/admin/master')
@section('master')
<form action="{{ URL::to('/') }}/send_emailhire" method="post" enctype="multipart/form-data" >
    @csrf
                <div class="card-body p-5 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2"> Job Registration Info</h3>



             <div class="row">

                        <div class="col-md-6 mb-4">
                      <label for="exampleDatepicker1" class="form-label">Name</label>

                    <div class="form-outline datepicker">
                      <input type="text" class="form-control" name="name" id="exampleDatepicker1"  value="{{ old('name') }}" />
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
                      <input type="email" class="form-control" id="exampleDatepicker1" name="email"  value="{{ old('email') }}" />
                      <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                    </div>

                  </div>


                      <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Mobile.No</label>

                      <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="mobile"  value="{{ old('mobile') }}" />
                        <span class="text-danger">
                            @error('mobile')
                            {{ $message }}
                            @enderror
                        </span>
                      </div>
                    </div>


                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Experiance</label>

                      <div class="form-outline datepicker">
                        <input type="text" class="form-control" name="experience" id="exampleDatepicker1"  value="{{ old('experience') }}"/>
                        <span class="text-danger">
                            @error('experience')
                            {{ $message }}
                            @enderror
                        </span>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Select gender</label>
                        <br>
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




      <br>
                    <button type="submit" class="btn btn-success btn-lg mb-2" name="btn">Submit</button>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
