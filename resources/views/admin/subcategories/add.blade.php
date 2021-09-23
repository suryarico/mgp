@extends('admin.include.index')

@section('content')

<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <!-- top tiles -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Subcategory <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form role="form" id="quickForm" action="{{route('admin.subcategories.create')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label for="category_id" class="col-md-4 control-label"> Category Name</label>

                                    <div class="col-md-6">
                                        <select class="form-control select2bs4" style="width: 100%;" name="category_id" id="category_id" required>
                                            <option value="" selected>Select Category</option>
                                            <?php foreach ($categories_masters as $ct) { ?>
                                                <option value="<?php echo $ct->id ?>"><?php echo $ct->category_name ?></option>
                                            <?php } ?>
                                        </select>

                                        @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('sub_category_name') ? ' has-error' : '' }}">
                                    <label for="sub_category_name" class="col-md-4 control-label">Sub category Name</label>

                                    <div class="col-md-6">
                                        <input id="sub_category_name" type="text" class="form-control" name="sub_category_name" value="{{ old('sub_category_name') }}" required autofocus placeholder="Enter Subcategory name">

                                        @if ($errors->has('sub_category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_name') }}</strong>
                                        </span>
                                        @endif
                                        </br>
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