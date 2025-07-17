@extends('/user_4/hmaster')
@section('master')


<form action="{{ URL::to('/') }}/editreg"   method="post" enctype="multipart/form-data" >
    @csrf

                <div class="card-body p-5 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-4 px-md-2">Registration Info</h3>



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
                        <label for="exampleDatepicker1" class="form-label">Property Picture</label>

                      <div class="form-outline datepicker">
                        <input type="file" name="picture" id=""  value="{{ old('picture') }}">
                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Price</label>

                      <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="price"  value="{{ old('price') }}" />
                        <span class="text-danger">
                          @error('price')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Bed</label>

                      <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="bed"  value="{{ old('bed') }}" />
                        <span class="text-danger">
                          @error('bed')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>


                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Bath</label>

                      <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="bath"  value="{{ old('bath') }}" />
                        <span class="text-danger">
                          @error('bath')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>


                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">area</label>

                      <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="area"  value="{{ old('area') }}" />
                        <span class="text-danger">
                          @error('area')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>


                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Benifits</label>

                      <div class="form-outline datepicker">
                        <input type="text" class="form-control" id="exampleDatepicker1" name="benifits"  value="{{ old('benifits') }}" />
                        <span class="text-danger">
                          @error('benifits')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Location</label>

                      <div class="form-outline datepicker">
                        <input type="text" class="form-control" id="exampleDatepicker1" name="locatioin"  value="{{ old('location') }}" />
                        <span class="text-danger">
                          @error('location')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">City</label>

                      <div class="form-outline datepicker">
                        <input type="text" class="form-control" id="exampleDatepicker1" name="city"  value="{{ old('city') }}" />
                        <span class="text-danger">
                          @error('city')
                          {{ $message }}
                          @enderror
                      </span>
                      </div>

                    </div>

                    <div class="col-md-6  mb-4 ">
                        <label for="exampleDatepicker1" class="form-label">Address</label>

                        <div class="form-outline datepicker">
                            <textarea name="address" id="" cols="75" rows="5" value="{{ old('address') }}"></textarea>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                    </div>

                    <div class="col-md-6  mb-4 ">
                        <label for="exampleDatepicker1" class="form-label">Property Description</label>

                        <div class="form-outline datepicker">
                            <textarea name="property_des" id="" cols="75" rows="5" value="{{ old('property_desc') }}"></textarea>
                            <span class="text-danger">
                                @error('property_desc')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                    </div>



             </div>


      <br>
                    <button type="submit" class="btn btn-success btn-lg mb-2" name="btn">Submit</button>

                  </form>

                </div>
@endsection
