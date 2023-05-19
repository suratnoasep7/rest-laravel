@extends('welcome')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pay</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('welcome.create') }}"> Create New Pay</a>
                
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>percentage</th>
            <th>Total</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($pay as $pays)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $pays->name }}</td>
	        <td>{{ $pays->price }}</td>
            <td>{{ $pays->percentage }}</td>
            <td>{{ $pays->total }}</td>
	        <td>
                <a class="btn btn-info" href="{{ route('welcome.show',$pays->id) }}">Show</a>
	        </td>
	    </tr>
	    @endforeach
    </table>

<p class="text-center text-primary"></p>
@endsection