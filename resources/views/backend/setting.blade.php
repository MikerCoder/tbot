@extends('backend.layouts.app')

@section('content')

<div class="container">
	@if (Session::has('status'))
		<div class="alert alert-info">
			<span>{{ Session::get('status') }}</span>
		</div>
	@endif
	<form action="{{ route('admin.setting.store') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Url callBack для бота</label>
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Действие <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#" onclick="document.getElementById('url_callback_bot').value = '{{ url('') }}'">Вставить url</a></li>
						<li><a href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit();">Отправить url</a></li>
						<li><a href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit();">Получить информацию</a></li>
					</ul>	
				</div>
				<input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot" value="{{ $url_callback_bot ?? '' }}">
			</div>
		</div>
		{{-- <div class="form-group">
			<label>Имя сайта</label>
			<input type="text" class="form-control" name="site_name" value="{{ $site_name ?? '' }}">
		</div> --}}
		<button class="btn btn-primary" type="submit">Сохранить</button>
	</form>

	<form id="setwebhook" action="{{ route('admin.setting.setwebhook') }}" method="post" style="display: none;">
		{{ csrf_field() }}
		<input type="hidden" name="url" value="{{ $url_callback_bot ?? '' }}">
	</form>

	<form id="getwebhookinfo" action="{{ route('admin.setting.getwebhookinfo') }}" method="post" style="display: none;">
		{{ csrf_field() }}
	</form>
</div>

@endsection