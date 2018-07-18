@extends('layouts.app')

@section('title')
Manage Ads
@endsection

@section('body')

	<div class="row">
		<div class="col-md-2">
			<div class="card">
				<div class="card-header">
					{{ __('common.display_list') }}
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<a>{{ __('category.category') }}</a>
					</li>
					<li class="list-group-item">
						<a>{{ __('banner.banner') }}</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-10">
			@include('manage.ads.category.table')
			@include('manage.ads.banner.table')
		</div>
	</div>

@endsection