@extends('/user_4/hmaster')
@section('master')

    <form action="{{ URL::to('/') }}/reg_rent_u4" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body p-5 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-4 px-md-2">Property_rent</h3>



            <div class="row">

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Houseier email</label>

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control" id="exampleDatepicker1" name="email"
                            value="{{ old('email') }}" />
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Picture-1</label>

                    <div class="form-outline datepicker">
                        <input type="file" class="form-control" name="pict[]"
                        multiple id="exampleDatepicker1"
                            value="{{ old('pict') }}" />


                        <span class="text-danger">
                            @error('pict')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                {{-- <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Picture-2</label>

                    <div class="form-outline datepicker">
                        <input type="file" class="form-control" name="picture[]" id="exampleDatepicker1"
                            value="{{ old('picture') }}" />


                        <span class="text-danger">
                            @error('picture[]')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Picture-3</label>

                    <div class="form-outline datepicker">
                        <input type="file" class="form-control" name="picture[]" id="exampleDatepicker1"
                            value="{{ old('picture') }}" />


                        <span class="text-danger">
                            @error('picture[]')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Picture-4</label>

                    <div class="form-outline datepicker">
                        <input type="file" class="form-control" name="picture[]" id="exampleDatepicker1"
                            value="{{ old('picture') }}" />


                        <span class="text-danger">
                            @error('picture[]')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Picture-5</label>

                    <div class="form-outline datepicker">
                        <input type="file" class="form-control" name="picture[]" id="exampleDatepicker1"
                            value="{{ old('picture') }}" />


                        <span class="text-danger">
                            @error('picture[]')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div> --}}



                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Price</label>

                    <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="price"
                            value="{{ old('price') }}" />
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
                        <input type="number" class="form-control" id="exampleDatepicker1" name="bed"
                            value="{{ old('bed') }}" />
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
                        <input type="number" class="form-control" id="exampleDatepicker1" name="bath"
                            value="{{ old('bath') }}" />
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
                        <input type="number" class="form-control" id="exampleDatepicker1" name="area"
                            value="{{ old('area') }}" />
                        <span class="text-danger">
                            @error('area')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>


              

                <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Location</label>

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control" id="exampleDatepicker1" name="location"
                            value="{{ old('location') }}" />
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
                        <input type="text" class="form-control" id="exampleDatepicker1" name="city"
                            value="{{ old('city') }}" />
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

