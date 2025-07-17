@extends('/admin/master')
@section('master')
<br>
    <div class="offset-sm-8 col-sm-4">
            <div class="row">
                <div class="col">
                    <a href="reg_feedback"><button class="btn btn-danger">Add Feedback</button></a>
                </div>
            </div>
        </div>
        <br><br>
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Feedbacks</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>

                                            <th scope="col">Full Name</th>

                                            <th scope="col">Email</th>
                                            <th scope="col">Feedback</th>
                                            <th scope="col">status</th>

                                            <th scope="col">edit</th>
                                            <th scope="col">status</th>
                                            <th scope="col">delete</th>


                                        </tr>
@foreach ($std as $re )


        <tr>
            <td>{{$re->name}} </td>
            <td> {{$re->email}}</td>
            <td> {{$re->feedback}}</td>
            <td> {{$re->status}}</td>




            <td>  <a href="{{ URL::to('/') }}/editfeedback/{{ $re['email'] }}"><button class="btn btn-warning" style="width:70px">Edit</button></a>
            </td>


            <td>
                @if ($re['status'] == 'active')
                    <a href="{{ URL::to('/') }}/deactivate_feedback/{{ $re['email'] }}"><input type="button"
                            class="btn btn-success" value="deactivate"></a>
                @elseif($re['status'] == 'inactive')
                    <a href="{{ URL::to('/') }}/activate_feedback/{{ $re['email'] }}"><input type="button"
                            class="btn btn-primary" value="activate"></a>
                @else
                    <a href="{{ URL::to('/') }}/reactivate_feedback/{{ $re['email'] }}"><input type="button"
                            class="btn btn-secondary" value="reactivate"></a>
                @endif
            </td>

            <td> <a href="{{ URL::to('/') }}/delete_feedback/{{ $re->email }}"><button
                class="btn btn-danger" style="width:100px">Delete</button></a></td>
        </tr>
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

