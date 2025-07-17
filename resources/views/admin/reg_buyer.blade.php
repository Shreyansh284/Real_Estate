@extends('/admin/master')
@section('master')



                  <form action="{{ URL::to('/') }}/regbuy" method="post" enctype="multipart/form-data"   >
<<<<<<< HEAD
                    @csrf
=======
                    @
>>>>>>> 3fb01e92743acc303b77f06ba17299088ee2e713
                <div class="card-body p-5 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">   Buyer Registration Info</h3>



             <div class="row">

                        <div class="col-md-6 mb-4">
                      <label for="exampleDatepicker1" class="form-label">Name</label>

                    <div class="form-outline datepicker">
                      <input type="text" class="form-control" name="name" id="exampleDatepicker1" />
                    </div>

                  </div>

                  <div class="col-md-6 mb-4">
                      <label for="exampleDatepicker1" class="form-label">Email</label>

                    <div class="form-outline datepicker">
                      <input type="email" class="form-control" id="exampleDatepicker1" name="email" />
                    </div>

                  </div>

                  <div class="col-md-6 mb-4">
                    <label for="exampleDatepicker1" class="form-label">Name Of House</label>

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" name="housename" id="exampleDatepicker1" />
                  </div>

                </div>


                      <div class="col-md-6 mb-4">
                        <label for="exampleDatepicker1" class="form-label">Mobile.No</label>

                      <div class="form-outline datepicker">
                        <input type="number" class="form-control" id="exampleDatepicker1" name="number" />
                      </div>
                    </div>

                    </div>





      <br>
                    <button type="submit" class="btn btn-success btn-lg mb-2" name="btn">Buy</button>

                  </form>
              </div>


@endsection
