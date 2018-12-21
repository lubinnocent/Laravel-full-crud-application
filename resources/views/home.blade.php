@extends('layouts.master')

@section('content')
<div class="">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><strong>Home</strong></h3>
			</div>
			<div class="box-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                Increase your sales and keep track of every unit with powerful stock management and inventory control software.
                    <img src="{{asset('images/logo.jpg')}}" style="width:100%"/>
               
            </div>
        </div>
    </div>
@endsection
