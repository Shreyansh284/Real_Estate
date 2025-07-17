@extends('/admin/master')
@section('master')
<br>
    <div class="offset-sm-8 col-sm-4">
            <div class="row">
                <div class="col">
                    <a href="reg_about"><button class="btn btn-danger">Add About</button></a>
                </div>
            </div>
        </div>
        <br><br>
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Manage About</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>


                                            <th scope="col">Picture</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Head Of</th>
                                            <th scope="col">email</th>
                                            <th scope="col">mobile</th>
                                            <th scope="col">description</th>

                                            <th scope="col">status</th>
                                          
                                            <th scope="col">status</th>
                                            <th scope="col">delete</th>


                                        </tr>
                                        @foreach ($std as $re)



                                        <tr>
                                            <td><img src="{{ URL::to('/') }}/image/{{ $re->image }}" alt="" srcset=""
                                                    style="width:100px"> </td>
                                            <td>{{ $re->name }} </td>
                                            <td>{{ $re->post }} </td>
                                            <td>{{ $re->email }} </td>
                                            <td>{{ $re->mobile }} </td>
                                            <td>{{ $re->description }} </td>

                                            <td>{{ $re->status }} </td>


                                            <td>
                                                @if ($re['status'] == 'active')
                                                    <a href="{{ URL::to('/') }}/deactivate_about/{{ $re['email'] }}"><input type="button"
                                                            class="btn btn-success" value="deactivate"></a>
                                                @elseif($re['status'] == 'inactive')
                                                    <a href="{{ URL::to('/') }}/activate_about/{{ $re['email'] }}"><input type="button"
                                                            class="btn btn-primary" value="activate"></a>
                                                @else
                                                    <a href="{{ URL::to('/') }}/reactivate_about/{{ $re['email'] }}"><input type="button"
                                                            class="btn btn-secondary" value="reactivate"></a>
                                                @endif
                                            </td>

                                            <td> <a href="{{ URL::to('/') }}/delete_user_about/{{ $re->email }}"><button
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

