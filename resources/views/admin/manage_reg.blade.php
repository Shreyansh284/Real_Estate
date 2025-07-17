@extends('/admin/master')
@section('master')
    <br>
    <div class="offset-sm-8 col-sm-4">
        <div class="row">
            <div class="col">
                <a href="register"><button class="btn btn-danger">Add User</button></a>
            </div>
        </div>
    </div>
    <br><br>



    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Registration</strong>
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Password</th>
                            <th scope="col">Gender</th>

                            <th scope="col">Profile</th>
                            <th scope="col">user_roll</th>
                            <th scope="col">Status</th>
                            <th scope="col">edit</th>
                            <th scope="col">status</th>
                            <th scope="col">delete</th>


                        </tr>

                        @foreach ($std as $re)



                            <tr>
                                <td>{{ $re->name }} </td>
                                <td>{{ $re->email }} </td>
                                <td>{{ $re->mobile }} </td>
                                <td>{{ $re->password }} </td>
                                <td>{{ $re->gender }}</td>
                                <td><img src="{{ URL::to('/') }}/image/{{ $re->image }}" alt="" srcset=""
                                        style="width:100px"> </td>
                                <td>{{ $re->role }} </td>
                                <td>{{ $re->status }} </td>

                                <td>  <a href="{{ URL::to('/') }}/editreg/{{ $re['email'] }}"><button class="btn btn-warning" style="width:70px">Edit</button></a>
                                </td>


                                <td>
                                    @if ($re['status'] == 'active')
                                        <a href="{{ URL::to('/') }}/deactivate/{{ $re['email'] }}"><input type="button"
                                                class="btn btn-success" value="deactivate"></a>
                                    @elseif($re['status'] == 'inactive')
                                        <a href="{{ URL::to('/') }}/activate/{{ $re['email'] }}"><input type="button"
                                                class="btn btn-primary" value="activate"></a>
                                    @else
                                        <a href="{{ URL::to('/') }}/reactivate/{{ $re['email'] }}"><input type="button"
                                                class="btn btn-secondary" value="reactivate"></a>
                                    @endif
                                </td>

                                <td> <a href="{{ URL::to('/') }}/delete_user/{{ $re->email }}"><button
                                    class="btn btn-danger" style="width:100px">Delete</button></a></td>
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
