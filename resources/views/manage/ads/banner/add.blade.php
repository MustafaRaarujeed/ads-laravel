@extends('layouts.app')

@section('title')
    Manage Ads | Add Banner
@endsection

@section('body')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {{ $errors }}
                <div class="card-header">
                    Add Banner
                </div>
                <div class="card-body">
                    <form action="{{ route('ban.postAdd') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                <option selected disabled>-- Select a Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ json_decode($category->name)[0] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        English Details
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Title" name="title_en">
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
                                            <input type="text" class="form-control" placeholder="Title" name="title_ar">
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
                            <input type="number" class="form-control" placeholder="Sort Order" name="sort">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="visible">Visible</label>
                                <select name="visible" class="form-control">
                                    <option selected disabled>-- Select Visiblity --</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <small class="form-text text-muted">Choose if the banner will be visible</small>
                            </div>
                            <div class="col">
                                <label for="featured">Featured</label>
                                <select name="featured" class="form-control">
                                    <option selected disabled>-- Select Is Featured --</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <small class="form-text text-muted">Choose if the banner will be featured</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Banner Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection