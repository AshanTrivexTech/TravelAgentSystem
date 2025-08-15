@extends('layouts.app')

@section('content')
<hr> 
@include('includes.error_div')

<div class="card">
    <div class="header">
        <h4 class="title">Create NEWS</h4> 
        <div class="content">
            <form method="POST" class="form-horizontal js_input_form"  >
                {{ csrf_field() }} 
                <div class="form-group">
                    <label for="fullName" class="control-label"> Status </label>
                    <select class="form-control" name="status">
                        <option value="0">Draft</option>
                        <option value="1">Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fullName" class="control-label"> Title </label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="title" value=""> 
               
                </div>
                <div class="form-group">
                    <label for="address1" class="control-label"> Description  </label> 
                    <textarea class="form-control" id="description" name="description" placeholder="description" rows="5" ></textarea> 
                </div>  
                <div class="form-group">
                    <label for="ppNic" class="control-label">Images</label>  
                    @include('dropzone.element')
                </div> 
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn  btn-primary btn-fill "></button> 
                    <button type="reset" class="btn btn-default btn-fill"></button>
                </div>
            </form>  
        </div>
    </div>
</div>
@endsection

@section('javascript')
@parent
<script type="text/javascript">
    // $(document).ready(function(){
    //     var d_elem = $('#real-dropzone');
    //     options = {maxFiles : 3};
    //     initDropzone(d_elem, options);
    // });
</script>

@endsection