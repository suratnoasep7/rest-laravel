@extends('welcome')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Pay</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('welcome.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('welcome.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price:</strong>
		            <input type="number" name="price" class="form-control" placeholder="Price">
		        </div>
		    </div>
            @foreach ($employee as $employees)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ $employees->name }}:</strong>
                        <input type="hidden" name="id_employee[]" class="form-control" placeholder="Price" value="{{ $employees->id }}">
                        <input type="hidden" name="price_employee[]" class="form-control" placeholder="Price" value="{{ $employees->price }}">
                        <input type="hidden" name="name_employee[]" class="form-control" placeholder="Price" value="{{ $employees->name }}">
                        <input type="number" name="percentage[]" class="form-control" placeholder="percentage">
                    </div>
                </div>
            @endforeach
		    
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"></p>
@endsection