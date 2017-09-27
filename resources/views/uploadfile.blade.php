@extends('layouts.app')

@section('content')
<form action="{{ url('uploadfile') }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal" >
	{{ csrf_field() }}
	
	<div class="form-group">
        <label for="image" class="col-sm-3 control-label">Select the file to upload.</label>

    	<div class="col-sm-6">
			<input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
		</div>
	</div>
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
	        <button type="submit" class="btn btn-default">
	            <i class="fa fa-btn fa-plus"></i>Upload
	        </button>
	    </div>
	</div>
 </form>
@endsection
