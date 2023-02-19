@extends('layouts.admin')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
@endsection

@section('page_title')
    ROLE
@endsection

@section('content')
	@if(session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
	@endif
	@can('role_create')
	<div style="margin-bottom: 10px;" class="row">
		<div class="col-lg-12">

		</div>
	</div>
	@endcan
	<section id="role">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header border-bottom">
						<h4 class="card-title">ROLE</h4>
						<div class="d-flex justify-content-end align-items-center">
							<div class="justify-content-between align-items-center">
								<a class="btn btn-primary btn-icon btn-sm" href="{{ route('admin.roles.create') }}" title="{{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}">
									<i class="fal fa-plus mr-2"></i>
								</a>
								<button id="reloadButton" class="btn btn-icon btn-sm btn-info ml-2" title="{{ trans('global.refresh') }} {{ trans('cruds.role.title_singular') }}">
									<i class="fal fa-sync-alt"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="card-datatable mb-3">
						<table class="dt-responsive table table-striped" id="roleTable">
							<thead>
								<tr>
									<th>{{ trans('cruds.role.fields.title') }}</th>
									<th>{{ trans('cruds.role.fields.permissions') }}</th>
									<th>{{ trans('global.action') }}</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
@parent
	<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
	<script>
		$(function () {
			$('#roleTable').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ route('admin.roles.index') }}",
				dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"mb-2"><"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
				columns: [
					{data: 'title', name: 'title'},
					{data: 'permissions', name: 'permissions'},
					{data: 'action', name: 'action', orderable: false, searchable: false}
				]
			});
			$('#reloadButton').on('click', function() {
				table.ajax.reload();
			});
		});
	</script>



@endsection
