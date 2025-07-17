@extends('/admin/master')
@section('master')
<form action="{{ URL::to('/') }}/update_feedback" method="post" enctype="multipart/form-data" >
    @csrf
                <div class="card-body p-5 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2"> Feedback Form</h3>



             <div class="row">
                @foreach ($std as $re )



                        <div class="col-md-6 mb-4">
                      <label for="exampleDatepicker1" class="form-label">Name</label>

                    <div class="form-outline datepicker">
                      <input type="text" class="form-control" name="name" id="exampleDatepicker1" value="{{$re->name}}" />
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
                      <input type="email" class="form-control" id="exampleDatepicker1" name="email"   value="{{$re->email}}" readonly/>
                      <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                    </div>

                  </div>




                    <div class="col-md-12  mb-4 ">
                        <label for="exampleDatepicker1" class="form-label">Review</label>

                      <div class="form-outline datepicker">
                        <textarea name="review" id="" cols="100" rows="10" >{{$re->feedback}}</textarea>
                        <span class="text-danger">
                            @error('review')
                            {{ $message }}
                            @enderror
                        </span>

                      </div>

                    </div>
                    @endforeach
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
