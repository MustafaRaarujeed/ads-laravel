@extends('layouts.app')

@section('title')
Manage Ads | Edit Category
@endsection

@section('body')

	<div class="row justify-content-center">
		<div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                <form action="{{ route('cat.update', $category->id) }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->has('cat_en')) is-invalid @endif" placeholder="Name in English" name="cat_en" value="{{ json_decode($category->name)[0] }}">
                            @if($errors->has('cat_en'))
                            <div class="invalid-feedback">
                                Please choose a category english name.
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->has('cat_ar')) is-invalid @endif" placeholder="Name in Arabic" name="cat_ar" value="{{ json_decode($category->name)[1] }}">
                            @if($errors->has('cat_ar'))
                            <div class="invalid-feedback">
                                Please choose a category arabic name.
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="visible">Visible</label>
                            <select name="visible" class="form-control">
                                <option value="0" @if(!$category->is_visible) selected @endif>No</option>
                                <option value="1" @if($category->is_visible) selected @endif>Yes</option>
                            </select>
                            <small class="form-text text-muted">Choose if the category will be visible</small>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
		</div>
	</div>

@endsection