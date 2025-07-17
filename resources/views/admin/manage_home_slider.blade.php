@extends('/admin/master')
@section('master')
<br>
    <div class="offset-sm-8 col-sm-4">
            <div class="row">
                <div class="col">
                    <a href="/admin/reg.php"><button class="btn btn-danger">Add Home Slider</button></a>
                </div>
            </div>
        </div>
        <br><br>
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Manage Home Slider</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>

                                            <th scope="col">Proparty Id</th>
                                            <th scope="col">Proparty Picture</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Price</th>

                                            <th scope="col">status</th>
                                            <th scope="col">edit</th>
                                            <th scope="col">status</th>
                                            <th scope="col">delete</th>


                                        </tr>

        <tr>
            <td>buy 1</td>
            <td><img src="user_1/img/property-1.jpg"  height="100" width="100" alt=""></td>
            <td>Rk prime</td>
            <td>9000</td>
            <td> active</td>

            <td> <a href=""><button class="btn btn-warning" style="width:70px">Edit</button></a>
            </td>




            <td scope="col"><a class="btn btn-primary"
                href="">deactivate</a></td>




            <td scope="col"><a class="btn btn-success"
                href="">activate</a></td>





            <td scope="col"><a class="btn btn-primary"
                href="">reactivate</a></td>



            <td> <a href=""><button class="btn btn-danger" style="width:100px">Delete</button></a></td>
        </tr>

</table>
                            </div>
                        </div>
                    </div>


                            </div>
                        </div>
                    </div>


@endsection

