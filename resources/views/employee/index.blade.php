@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>
                
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
            <th width="280px">Action</th>
        </tr>
	    @foreach ($employee as $employees)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $employees->name }}</td>
	        <td>{{ $employees->price }}</td>
	        <td>
                <form action="{{ route('employee.destroy',$employees->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('employee.show',$employees->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employees->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $employee->links() !!}


<p class="text-center text-primary"></p>
@endsection