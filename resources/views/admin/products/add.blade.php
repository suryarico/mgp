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
                        <h2>Add Product <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form role="form" id="quickForm" action="{{route('admin.products.create')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="category_id" class="control-label"> Select Category Name</label>
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

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('sub_category_name') ? ' has-error' : '' }}">
                                        <label for="sub_category_name" class="control-label">Select Subcategory</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="sub_category_id" id="sub_category_id" required>
                                            <option value="">Select Sub Category</option>

                                        </select>

                                        @if ($errors->has('sub_category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                        </br>
                                    </div>
                                </div>
                                <!-- </div>
                                <div class="row"> -->
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                        <label for="product_name" class="control-label"> Enter Product Name</label>
                                        <input type="text" name="product_name" class="form-control {{($errors->has('product_name') ? 'is-invalid' : '')}}" id="product_name" placeholder="Enter product name">

                                        @if ($errors->has('product_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_name') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('product_short_description') ? ' has-error' : '' }}">
                                        <label for="product_short_description" class="control-label"> Enter Product short description</label>
                                        <textarea name="product_short_description" class="form-control {{($errors->has('product_short_description') ? 'is-invalid' : '')}}" id="product_short_description" placeholder="Enter product short description"> </textarea>

                                        @if ($errors->has('product_short_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_short_description') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <!-- </div>
                                <div class="row"> -->


                                <!-- </div>
                                <div class="row"> -->
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('product_price') ? ' has-error' : '' }}">
                                        <label for="product_price" class="control-label"> Enter Product Price</label>
                                        <input type="text" name="product_price" class="form-control {{($errors->has('product_price') ? 'is-invalid' : '')}}" id="product_price" placeholder="Enter product price">

                                        @if ($errors->has('product_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_price') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('product_discounted_price') ? ' has-error' : '' }}">
                                        <label for="product_discounted_price" class="control-label"> Enter Product Discounted Price</label>
                                        <input type="text" name="product_discounted_price" class="form-control {{($errors->has('product_discounted_price') ? 'is-invalid' : '')}}" id="product_discounted_price" placeholder="Enter product price">

                                        @if ($errors->has('product_discounted_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_discounted_price') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('product_description') ? ' has-error' : '' }}">
                                        <label for="product_description" class="control-label"> Enter Product Description</label>
                                        <textarea name="product_description" class="form-control {{($errors->has('product_description') ? 'is-invalid' : '')}}" id="product_description" placeholder="Enter product  description" rows="10"> </textarea>

                                        @if ($errors->has('product_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_description') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    </br> </br>
                                    <p style="padding: 5px;">
                                        <input type="checkbox" name="is_featured" value="1" class="flat" /> List in Featured Product
                                        <input type="checkbox" name="is_bestseller" value="1" class="flat" /> List in Bestseller
                                        <input type="checkbox" name="is_latest" value="1" class="flat" /> List in latest

                                    <p>
                                </div>
                            </div>
                            <hr>
                            <h3 align="center">Product Attributes</h3>

                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('material_id') ? ' has-error' : '' }}">
                                        <label for="material_id" class="control-label"> Select Material</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="material_id" id="material_id" required>
                                            <option value="" selected>Select Material</option>
                                            <?php foreach ($materialMasters as $mat) { ?>
                                                <option value="<?php echo $mat->id ?>"><?php echo $mat->material ?></option>
                                            <?php } ?>
                                        </select>

                                        @if ($errors->has('material_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('material_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('color_id') ? ' has-error' : '' }}">
                                        <label for="color_id" class="control-label"> Select Color</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="color_id" id="color_id" required>
                                            <option value="" selected>Select Color</option>
                                            <?php foreach ($colorMaster as $col) { ?>
                                                <option value="<?php echo $col->id ?>"><?php echo $col->color ?></option>
                                            <?php } ?>
                                        </select>

                                        @if ($errors->has('color_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('color_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('shape_id') ? ' has-error' : '' }}">
                                        <label for="shape_id" class="control-label"> Select Shape</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="shape_id" id="shape_id" required>
                                            <option value="" selected>Select Shape</option>
                                            <?php foreach ($shapeMaster as $col) { ?>
                                                <option value="<?php echo $col->id ?>"><?php echo $col->shape ?></option>
                                            <?php } ?>
                                        </select>

                                        @if ($errors->has('shape_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('shape_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('size_id') ? ' has-error' : '' }}">
                                        <label for="size_id" class="control-label"> Select Size</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="size_id" id="size_id" required>
                                            <option value="" selected>Select Size</option>
                                            <?php foreach ($sizeMaster as $col) { ?>
                                                <option value="<?php echo $col->id ?>"><?php echo $col->size ?></option>
                                            <?php } ?>
                                        </select>

                                        @if ($errors->has('size_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('size_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('use_id') ? ' has-error' : '' }}">
                                        <label for="use_id" class="control-label"> Select Use</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="use_id" id="use_id" required>
                                            <option value="" selected>Select Use</option>
                                            <?php foreach ($useMaster as $col) { ?>
                                                <option value="<?php echo $col->id ?>"><?php echo $col->use ?></option>
                                            <?php } ?>
                                        </select>

                                        @if ($errors->has('use_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('use_id') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                    <div class="{{ $errors->has('product_image') ? ' has-error' : '' }}">
                                        <label for="product_image" class="control-label"> Upload Featured image </label>
                                        <input id="product_image" type="file" class="form-control" name="product_image" value="{{ old('product_image') }}" required autofocus>

                                        @if ($errors->has('product_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_image') }}</strong>
                                        </span>
                                        @endif
                                        </br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
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
<script>
    $("#category_id").change(function() {
        var category_id = $(this).val();
        $("#sub_category_id").html('');
        $.ajax({
            url: "{{route('getsubcategory')}}",
            type: 'POST',
            data: {
                "category_id": category_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {

                $('#sub_category_id').html(response.html);
            },
            error: function(response) {
                window.console.log(response);
            }
        });

    });
</script>
@endsection