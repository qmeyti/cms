{!! Form::open(['method' => 'POST','url' => route('menu_items.store',['menu' => $menu->id]), 'class' => 'form-horizontal', 'files' => true]) !!}

<input type="hidden" name="type" value="route">

<div class="form-group{{ $errors->has('label') ? 'has-error' : ''}} mb-3">
    {!! Form::label('label', 'برچسب', ['class' => 'control-label mb-3']) !!}
    {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required'] ) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('link') ? 'has-error' : ''}} mb-3">
    {!! Form::label('link', 'انتخاب صفحه', ['class' => 'control-label mb-3' ]) !!}

    <select class="form-control ltr" name="link">
        <option value="">انتخاب مسیر</option>
        @foreach(Route::getRoutes()->get('GET') as $route)
            @if(strpos($route->uri,'admin') == false && strpos($route->uri,'{') == false)
                <option value="{{ env('APP_URL').'/'.$route->uri}}">{{ str_replace(app()->getLocale(),'',$route->uri) }}</option>
            @endif
        @endforeach
    </select>

    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> افزودن آیتم جدید </button>
</div>

{!! Form::close() !!}