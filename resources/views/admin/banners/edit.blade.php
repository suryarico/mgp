@extends('admin.include.index')

@section('content')
<!-- Main content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <!-- top tiles -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Banner <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form role="form" id="quickForm" action="{{route('admin.banners.update')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $banner->id  }}">
                            <div class="card-body">



                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Banner Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" required autofocus placeholder="Enter Title" value="{{ $banner->title }}">

                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif</br>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('title_pre_text') ? ' has-error' : '' }}">
                                    <label for="title_pre_text" class="col-md-4 control-label">Banner title pre text</label>

                                    <div class="col-md-6">
                                        <input id="title_pre_text" type="text" class="form-control" name="title_pre_text" value="{{ $banner->title_pre_text }}" required autofocus placeholder="Enter title pre text">

                                        @if ($errors->has('title_pre_text'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_pre_text') }}</strong>
                                        </span>
                                        @endif</br>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('title_post_text') ? ' has-error' : '' }}">
                                    <label for="title_post_text" class="col-md-4 control-label">Banner title post text</label>

                                    <div class="col-md-6">
                                        <input id="title_post_text" type="text" class="form-control" name="title_post_text" value="{{ $banner->title_post_text }}" required autofocus placeholder="Enter title post text">

                                        @if ($errors->has('title_post_text'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_post_text') }}</strong>
                                        </span>
                                        @endif</br>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('banner_link') ? ' has-error' : '' }}">
                                    <label for="banner_link" class="col-md-4 control-label">Banner Link</label>

                                    <div class="col-md-6">
                                        <input id="banner_link" type="text" class="form-control" name="banner_link" value="{{ $banner->banner_link }}" required autofocus placeholder="Enter Banner Link">

                                        @if ($errors->has('banner_link'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('banner_link') }}</strong>
                                        </span>
                                        @endif</br>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('banner_image') ? ' has-error' : '' }}">
                                    <label for="banner_image" class="col-md-4 control-label">Banner image</label>

                                    <div class="col-md-6">
                                        <input id="banner_image" type="file" class="form-control" name="banner_image" required autofocus>

                                        @if ($errors->has('banner_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('banner_image') }}</strong>
                                        </span>
                                        @endif</br>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('banner_image') ? ' has-error' : '' }}">
                                    <label for="banner_image" class="col-md-4 control-label"></label>

                                    <div class="col-md-6">
                                        <image src="{{ URL::to('/') }}/public/banners/<?php echo $banner->banner_image ?>" height="100px" />

                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /page content -->
@endsection