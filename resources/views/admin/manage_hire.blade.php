@extends('/admin/master')
@section('master')
<br>

    <div class="offset-sm-8 col-sm-4">
            <div class="row">
                <div class="col">
                    <a href="reg_hire"><button class="btn btn-danger">Add Member</button></a>
                </div>
            </div>
        </div>
        <br><br>
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Manage Hire</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>

                                            <th scope="col">Full Name</th>

                                            <th scope="col">Email</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Experiance</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">status</th>

                                            <th scope="col">edit</th>
                                            <th scope="col">status</th>



                                        </tr>
@foreach ($std as $re )


        <tr>
            <td> {{$re->name}}</td>
            <td>{{$re->email}} </td>
            <td>{{$re->mobile}}</td>
            <td>{{$re->experience}} </td>
            <td>{{$re->gender}} </td>
            <td> {{$re->status}}</td>






            <td> <a href="{{ URL::to('/') }}/edithire/{{ $re['email'] }}"><button class="btn btn-warning" style="width:70px">Edit</button></a>
            </td>

            <td>
                @if ($re['status'] == 'not approved')
                    <a href="{{ URL::to('/') }}/approve/{{ $re['email'] }}"><input type="button"
                            class="btn btn-success" value="approve"></a>

                @elseif ($re['status'] == 'approved')
                    <a href="{{ URL::to('/') }}/not_approved/{{ $re['email'] }}"><input type="button"
                            class="btn btn-secondary" value="not approved"></a>
                @endif
            </td>



        </tr>
        @endforeach
</table>
                            </div>
                        </div>
                    </div>


                            </div>
                        </div>
                    </div>


@endsection

