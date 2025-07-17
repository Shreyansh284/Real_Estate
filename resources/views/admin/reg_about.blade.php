@extends('/admin/master')
@section('master')

<form action="{{ URL::to('/') }}/regabout"   method="post" enctype="multipart/form-data" >
    @csrf

                <div class="card-body p-5 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-4 px-md-2">About</h3>




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
                    <label for="exampleDatepicker1" class="form-label">Head Of</label>

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" name="post" id="exampleDatepicker1"  value="{{ old('post') }}" />
                    <span class="text-danger">
                      @error('post')
                      {{ $message }}
                      @enderror
                  </span>
                  </div>

                </div>

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Email</label>

                  <div class="form-outline datepicker">
                    <input type="email" class="form-control" name="email" id="exampleDatepicker1"  value="{{ old('email') }}" />
                    <span class="text-danger">
                      @error('email')
                      {{ $message }}
                      @enderror
                  </span>
                  </div>

                </div>


                    <div class="col-md-6 mb-4">
                  <label for="exampleDatepicker1" class="form-label">Mobile No.</label>

                <div class="form-outline datepicker">
                  <input type="number" class="form-control" name="mobile" id="exampleDatepicker1"  value="{{ old('mobile') }}" />
                  <span class="text-danger">
                    @error('mobile')
                    {{ $message }}
                    @enderror
                </span>
                </div>

              </div>
              <div class="col-md-6 mb-4">
                <label for="exampleDatepicker1" class="form-label">Picture</label>

                <div class="form-outline datepicker">
                    <input type="file" name="image" id=""  value="{{ old('image') }}">
                   </div>
               </div>

               <div class="col-md-6 mb-4">
                   <label for="exampleDatepicker1" class="form-label">Description</label>

                   <div class="form-outline datepicker">
                       <textarea name="description" id="" cols="100" rows="10"></textarea>
                       <span class="text-danger">
                           @error('description')
                           {{ $message }}
                           @enderror
                       </span>
                     </div>
               </div>


             </div></div>
    <button type="submit" class="btn btn-success btn-lg mb-2" name="btn">Submit</button>

                  </form>

                </div>
@endsection
