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
					<th>{{ __('banner.link') }}</th>
					<th>{{ __('common.featured') }}</th>
					<th>{{ __('common.visible') }}</th>
					<th>{{ __('banner.image') }}</th>
					<th>{{ __('common.sort') }}</th>
					<th>{{ __('common.created_by') }}</th>
					<th>{{ __('common.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@if(count($banners))
					@foreach($banners as $banner)
						<tr>
							<td>{{ $banner->category->name_en }}</td>
							<td>{{ $banner->title }}</td>
							<td>{{ $banner->link }}</td>
							<td>{{ $banner->is_featured  ? "Yes" : "No" }}</td>
							<td>{{ $banner->is_visible ? "Yes" : "No" }}</td>
							<td>{{ $banner->image }}</td>
							<td>{{ $banner->sort }}</td>
							<td>{{ $banner->user->name }}</td>
							<td><i class="fa fa-pencil-square-o"></i></td>
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
