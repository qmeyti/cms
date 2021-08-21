
{!! Form::open(['method' => 'POST', 'url' => route('menus.store'), 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'menu'])  !!}
<div class="input-group">
    <input type="text" class="form-control" name="name" placeholder="عنوان منوی جدید">
    <button class="btn btn-success" type="submit">
        <i class="fa fa-save"></i>
        منوی جدید
    </button>
</div>
{!! Form::close() !!}
