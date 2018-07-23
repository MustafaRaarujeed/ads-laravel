@extends('layouts.app')

@section('title')
Manage Ads | Add Category
@endsection

@section('body')

	<div class="row justify-content-center">
		<div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
                <form action="{{ $add_post_route }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name in English" name="cat_en" value="{{ $add_post_route }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name in Arabic" name="cat_ar" value="">
                        </div>
                        <div class="form-group">
                            <label for="visible">Visible</label>
                            <select name="visible" class="form-control">
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                            <small class="form-text text-muted">Choose if the category will be visible - Visible by Default</small>
                        </div>
                        <button type="submit" class="btn btn-success">{{ $button_title }}</button>
                    </form>
                </div>
            </div>
		</div>
	</div>

@endsection