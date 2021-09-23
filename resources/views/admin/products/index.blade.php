@extends('admin.include.index')

@section('content')
<!-- Main content -->
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Products </h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-8 ">
									<a href="{{route('admin.products.add')}}" class="btn  btn-success btn-sm "> <i class="fa fa-plus"></i> Add Products</a>
								</div>
							</div>
							</br>

							<table id="datatable" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Action</th>
										<th>Category Name</th>
										<th>SubCategory Name</th>

										<th>Created by</th>
										<th>created at </th>
										<th>Updated by</th>
										<th>Updated at </th>




									</tr>
								</thead>
								<tbody>
									@if(!empty($products) && $products->count())
									@php $i=1; @endphp
									@foreach ( $products as $subcat )
									<tr>
										<td>
											<a href="{{ url('admin/products/edit',$subcat->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" style="font-size: 10px;"> <i class="fa fa-edit"></i> </a>
											<a href="{{ url('admin/products/delete',$subcat->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" style="font-size: 10px;"> <i class="fa fa-trash"></i> </a>
										</td>
										<td>{{$subcat->category_name}}</td>
										<td>{{$subcat->sub_category_name}}</td>

										<td>{{$subcat->created_by}}</td>
										<td>{{date('d-M-Y',strtotime($subcat->created_at))}}</td>
										<td>{{$subcat->updated_by}}</td>
										<td>{{date('d-M-Y',strtotime($subcat->updated_at))}}</td>


									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="10">There are no data.</td>
									</tr>
									@endif

								</tbody>

							</table>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection