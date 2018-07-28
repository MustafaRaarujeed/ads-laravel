<div class="card">
	<div class="card-header">
		{{ __('category.category_list') }}
	</div>
	<div class="card-body">
		<div class="raar-filter">
			<button class="btn btn-info">{{ __('filter.visible') }}</button>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr class="table-light">
					<th>{{ __('category.name_en') }}</th>
					<th>{{ __('category.name_ar') }}</th>
					<th>{{ __('common.visible') }}</th>
					<th>{{ __('common.created_by') }}</th>
					<th colspan="2">{{ __('common.action') }}</th>
				</tr>
			</thead>
			<tbody>
				@if(count($categories))
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->name_en }}</td>
							<td>{{ $category->name_ar }}</td>
							<td>{{ $category->is_visible ? "Yes" : "No" }}</td>
							<td>{{ $category->user->name }}</td>
							<td>
								<a href="{{ route('cat.edit', $category->id) }}">Edit</a>
							</td>
							<td>
								<form action="{{ route('cat.delete', ['id' => $category->id]) }}" method="POST">
									{!! csrf_field() !!}
									{{ method_field('DELETE') }}
									<button type="submit">Del</button>
								</form>
							</td>
						</tr>
					@endforeach
				@else
					<tr class="text-center">
						<td colspan="5">{{ __('category.no_category') }}</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>