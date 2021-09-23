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
                        <h2>Add Category <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form role="form" id="quickForm" action="{{route('admin.categories.create')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">

                                <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                                    <label for="category_name" class="col-md-4 control-label">Category Name</label>

                                    <div class="col-md-6">
                                        <input id="category_name" type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" required autofocus placeholder="Enter category name">

                                        @if ($errors->has('category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_name') }}</strong>
                                        </span>
                                        @endif
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