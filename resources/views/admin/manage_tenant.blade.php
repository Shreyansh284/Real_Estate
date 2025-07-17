@extends('/admin/master')
@section('master')
<br>
    <div class="offset-sm-8 col-sm-4">
            <div class="row">
                <div class="col">
                    {{-- <a href="reg_buyer"><button class="btn btn-danger">Add Buyer</button></a> --}}
                </div>
            </div>
        </div>
        <br><br>
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Manage Rent House</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>

                                            <th scope="col">Property ID</th>
                                            <th scope="col">Owner_Of_Property </th>
                                            <th scope="col">Name of Tenant </th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone No.</th>

                                            <th scope="col">status</th>




                                        </tr>

        @foreach ($idata as $re)



        <tr>
            <td>{{$re->property_id}}</td>
            <td>{{$re->owner_of_property}}</td>
            <td>{{$re->name}} </td>
            <td>{{$re->email}}</td>
            <td> {{$re->mobile}}</td>


            <td>{{$re->status}}</td>

            <td>
                {{-- @if ($re['status'] == 'pending')
                    <a href="{{ URL::to('/') }}/buyer_pending/{{ $re['email'] }}"><input type="button"
                            class="btn btn-success" value="Pending"></a> --}}

                @if ($re['status'] == 'pending')
                    <a href="{{ URL::to('/') }}/buyer_approved/{{ $re['property_id'] }}"><input type="button"
                            class="btn btn-secondary" value="Sell"></a>
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

