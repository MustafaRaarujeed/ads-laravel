@extends('layouts.app')

@section('title')
    Manage Ads | Add Banner
@endsection

@section('body')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Banner
                </div>
                <div class="card-body">
                    <form action="{{ route('ban.postAdd') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title">
                        </div>
                        <div class="form-group">
                            <textarea rows="2" type="text" class="form-control" placeholder="Description" name="desc"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Banner Link" name="link">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Sort Order" name="sort">
                            </div>
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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection