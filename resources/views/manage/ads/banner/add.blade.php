@extends('layouts.app')

@section('title')
    Manage Ads | Add Banner
@endsection

@section('body')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Add Banner
                </div>
                <div class="card-body">
                    <form action="{{ route('ban.postAdd') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control @if($errors->has('category')) is-invalid @endif">
                                <option selected disabled>-- Select a Category --</option>
                                @foreach($categories as $category)
                                    @if($category->is_visible)
                                        <option value="{{ $category->id }}">{{ json_decode($category->name)[0] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                            <div class="invalid-feedback">
                                Please choose a category
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        English Details
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control @if($errors->has('title_en')) is-invalid @endif" placeholder="Title" name="title_en" value="{{ old('title_en') }}">
                                            @if($errors->has('title_en'))
                                                <div class="invalid-feedback">
                                                    Please choose an english title
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="2" type="text" class="form-control" placeholder="Description" name="desc_en"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Arabic Details
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control @if($errors->has('title_ar')) is-invalid @endif" placeholder="Title" name="title_ar" value="{{ old('title_ar') }}">
                                            @if($errors->has('title_ar'))
                                                <div class="invalid-feedback">
                                                    Please choose an arabic title
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="2" type="text" class="form-control" placeholder="Description" name="desc_ar"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Sort Order" name="sort" value="{{ old('sort') }}">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="visible">Visible</label>
                                <select name="visible" class="form-control @if($errors->has('visible')) is-invalid @endif">
                                    <option selected disabled>-- Select Visiblity --</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @if($errors->has('visible'))
                                    <div class="invalid-feedback">
                                        Please select visibility
                                    </div>
                                @else
                                    <small class="form-text text-muted">
                                        Choose if the banner will be visible
                                    </small>
                                @endif
                            </div>
                            <div class="col">
                                <label for="featured">Featured</label>
                                <select name="featured" class="form-control @if($errors->has('featured')) is-invalid @endif">
                                    <option selected disabled>-- Select Is Featured --</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @if($errors->has('featured'))
                                    <div class="invalid-feedback">
                                        Please select featured
                                    </div>
                                @else
                                    <small class="form-text text-muted">
                                        Choose if the banner will be featured
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Banner Image</label>
                            <input class="form-control @if($errors->has('image')) is-invalid @endif" type="file" name="image">
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    Please choose an image.
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection