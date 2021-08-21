{!! Form::model($menu, ['method' => 'PATCH', 'url' => route('menus.update',['menu' => $menu->id]),'class' => 'form-inline my-2 my-lg-0']) !!}
<div class="input-group">
    <input type="text" class="form-control" value="{{old('name',$menu->name)}}" name="name" placeholder="عنوان منو">
    <button class="btn btn-warning" type="submit">
        <i class="fa fa-pencil"></i>
        ویرایش منو
    </button>
</div>
{!! Form::close() !!}
