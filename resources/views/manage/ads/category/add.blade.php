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
                <form action="{{ route('cat.postAdd') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->has('cat_en')) is-invalid @endif" placeholder="Name in English" name="cat_en" value="{{ old('cat_en') }}">
                            @if($errors->has('cat_en'))
                            <div class="invalid-feedback">
                                Please choose a category english name.
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @if($errors->has('cat_ar')) is-invalid @endif" placeholder="Name in Arabic" name="cat_ar" value="{{ old('cat_ar') }}">
                            @if($errors->has('cat_ar'))
                            <div class="invalid-feedback">
                                Please choose a category arabic name.
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="visible">Visible</label>
                            <select name="visible" class="form-control @if($errors->has('visible')) is-invalid @endif">
                                <option selected disabled>-- Select Visiblity --</option>
                                <option value="0" @if(old('visible') == '0') selected @endif>No</option>
                                <option value="1" @if(old('visible') == '1') selected @endif>Yes</option>
                            </select>
                            @if($errors->has('visible'))
                            <div class="invalid-feedback">
                                Please select visibility
                            </div>
                            @else
                            <small class="form-text text-muted">
                                Choose if the category will be visible
                            </small>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
		</div>
	</div>

@endsection