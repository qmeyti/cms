{!! Form::open(['method' => 'GET', 'url' => route('menus.index'), 'class' => 'form-inline my-2 my-lg-0', 'role' => 'menu'])  !!}
<div class="input-group">
    <select name="menu" id="menu" class="form-control" style="min-width: 180px">
        <option value="">انتخاب منو</option>
        @foreach($menus as $m)
            <option @if(!is_null($menu) && $menu->id == $m->id ) selected @endif value="{{$m->id}}">{{$m->name}}</option>
        @endforeach
    </select>
    <button class="btn btn-secondary" type="submit">
        انتخاب منو
    </button>
</div>
{!! Form::close() !!}
