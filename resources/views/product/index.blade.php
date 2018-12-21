@extends('layouts.master')
@section('content')
	<div class="">
		<div class="box">
			@if (count($products) > 0)
			<div class="box-header">
				<h3 class="box-title"><strong>All Products [{{count($products)}}]</strong></h3>
			</div>
			<div class="box-body">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>

						@foreach($products as $product)
							<tr>
								<td>{{$product->product_id}}</td>
								<td>{{$product->name}}</td>
								<td style="font-family:Tahoma;">{{number_format($product->price)}}</td>
								<td>
									<button class="btn btn-info" data-myproductname="{{$product->name}}" data-myproductprice="{{$product->price}}" data-catid={{$product->product_id}} data-toggle="modal" data-target="#edit">Edit</button>
									/
									<button class="btn btn-danger" data-catid={{$product->product_id}} data-toggle="modal" data-target="#delete">Delete</button>
								</td>
							</tr>

						@endforeach
					</tbody>
				</table>
				<hr>
				<div class="row">
						<div class="col-sm-9">
							@include('messages.errors')
						</div>
				</div>
				<div class="row">
					<div class="col-sm-3"> 
					{{$products->links()}}
						</div>
				</div>		
			</div>
			@else
					<h2>No Product Added yet in System!!</h2>
					@include('messages.errors')	
			@endif
		</div>
	</div>


	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Add New Product
</button>

<!--Add Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Product</h4>
      </div>
      <form action="{{route('product.store')}}" method="post" enctype ="multipart/form-data">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('product.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
      </div>
      <form action="{{route('product.update','test')}}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="product_id" id="cat_id" value="">
				@include('product.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save Changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('product.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="product_id" id="cat_id" value="">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>


@endsection