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
                            <form role="form" id="quickForm" action="{{route('admin.users.update')}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $users->id  }}">
                                <div class="card-body">

                                    <div class="form-group{{ $errors->has('emp_type') ? ' has-error' : '' }}">
                                        <label for="emp_type" class="col-md-4 control-label">User Type</label>

                                        <div class="col-md-6">
                                            <select class="form-control select2bs4" style="width: 100%;" name="emp_type" id="emp_type">
                                                <option value="" selected>Select User Type</option>

                                                <option value="admin" {{($users->is_admin==1) ? 'selected': ''}}>Admin</option>

                                                <option value="agent" {{($users->is_admin==0) ? 'selected': ''}}>User</option>

                                            </select>

                                            @if ($errors->has('emp_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('emp_type') }}</strong>
                                            </span>
                                            @endif
                                            </br>
                                        </div>

                                    </div>



                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="name" class="form-control" name="name" value="{{ $users->name }}" required>

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
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" required>

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
                                            <input id="password" type="password" autocomplete="new-password" class="form-control" name="password" placeholder="Password (Leave Blank For old password )">

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
                        <!-- /.card-body -->
                        <div class="card-footer">

                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script>
    $(function() {
        $("#clients").DataTable();
        //toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    // $('.toastrDefaultWarning').click(function() {
    // toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    // });
</script>



@endsection