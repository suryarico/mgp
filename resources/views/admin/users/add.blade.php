@extends('admin.include.index')

@section('content')
<!-- Main content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="card-body">
                            <form role="form" id="quickForm" action="{{route('admin.users.create')}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card-body">

                                    <div class="form-group{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                                        <label for="is_admin" class="col-md-4 control-label">User Type</label>

                                        <div class="col-md-6">
                                            <select class="form-control select2bs4" style="width: 100%;" name="is_admin" id="is_admin" required>
                                                <option value="" selected>Select User Type</option>

                                                <option value="1">Admin</option>
                                                <option value="0">User</option>

                                            </select>

                                            @if ($errors->has('is_admin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('is_admin') }}</strong>
                                            </span>
                                            @endif
                                            </br>
                                        </div>



                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Enter Name">

                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                                </br>
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email Id">

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                                </br>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" autocomplete="new-password" class="form-control" name="password" value="{{ old('email') }}" required placeholder="Enter password">

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
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
</div>


@endsection