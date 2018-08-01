<div class="card">
	<div class="card-header">
		{{ __('banner.banner_list') }}
	</div>
	<div class="card-body">
		<div class="raar-filter">
			<button class="btn btn-info">{{ __('filter.category') }}</button>
			<button class="btn btn-info">{{ __('filter.featured') }}</button>
			<button class="btn btn-info">{{ __('filter.visible') }}</button>
			<button class="btn btn-info">{{ __('filter.sort') }}</button>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr class="table-light">
					<th>{{ __('category.category') }}</th>
					<th>{{ __('banner.title') }}</th>
					<th>{{ __('common.featured') }}</th>
					<th>{{ __('common.visible') }}</th>
					<th>{{ __('common.sort') }}</th>
					<th>{{ __('common.created_by') }}</th>
					<th>{{ __('common.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@if(count($banners))
					@foreach($banners as $banner)
						<tr>
							<td>{{ json_decode($banner->category->name)[0] }}</td>
							<td>
								<a href="{{ asset('images/'. $banner->image) }}" target="_blank">
									{{ json_decode($banner->title)[0] }}
								</a>
								<small class="form-text text-muted">(Click - To View Banner Image in a New Tab)</small>
							</td>
							<td>{{ $banner->is_featured  ? "Yes" : "No" }}</td>
							<td>{{ $banner->is_visible ? "Yes" : "No" }}</td>
							<td>{{ $banner->sort }}</td>
							<td>{{ $banner->user->name }}</td>
							<td>
								<a href="{{ route('ban.edit', $banner->link) }}"><i class="fas fa-edit"></i></a>
							</td>
						</tr>
					@endforeach
				@else
					<tr class="text-center">
						<td colspan="9">{{ __('banner.no_banner') }}</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
