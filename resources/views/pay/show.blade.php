@extends('welcome')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pay</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('welcome.index') }}"> Back</a>
            </div>
        </div>
    </div>
    


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $pay->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $pay->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Percentage:</strong>
                {{ $pay->percentage }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                {{ $pay->total }}
            </div>
        </div>
    </div>
@endsection
<p class="text-center text-primary"></p>