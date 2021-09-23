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
						<h2>Banners </h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-8 ">
									<a href="{{route('admin.banners.add')}}" class="btn  btn-success btn-sm "> <i class="fa fa-plus"></i> Add Banners</a>
								</div>
							</div>
							</br>

							<table id="datatable" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Action</th>
										<th>Image</th>
										<th>Title</th>
										<th>Pre text</th>
										<th>Post text </th>
										<th>Link</th>
										<th>Created at</th>





									</tr>
								</thead>
								<tbody>
									@if(!empty($banners_all) && $banners_all->count())
									@php $i=1; @endphp
									@foreach ( $banners_all as $cat )
									<tr>
										<td>
											<a href="{{ url('admin/banners/edit',$cat->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" style="font-size: 10px;"> <i class="fa fa-edit"></i> </a>
											<a href="{{ url('/admin/banners/delete',$cat->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" style="font-size: 10px;"> <i class="fa fa-trash"></i> </a>
										</td>
										<td>
											<image src="{{ URL::to('/') }}/public/banners/<?php echo $cat->banner_image ?>" height="100px" />
										</td>
										<td>{{$cat->title}}</td>
										<td>{{$cat->title_pre_text}}</td>
										<td>{{$cat->title_post_text}}</td>
										<td>{{$cat->banner_link}}</td>
										<td>{{date('d-M-Y',strtotime($cat->created_at))}}</td>


									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="10">There are no data.</td>
									</tr>
									@endif

								</tbody>

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