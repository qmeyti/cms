@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    نمایش ماژول
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('modules.index') }}" title="بازگشت">
                            <button class="btn btn-dark btn-sm"><i class="fas fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <a href="{{ route('modules.edit',['module' =>$module->id ]) }}" title="ویرایش ماژول">
                            <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-ruler" aria-hidden="true"></i> ویرایش</button>
                        </a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => route('modules.destroy',['module' =>$module->id ]),
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i> حذف', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'حذف ماژول',
                                'onclick'=>'return confirm("آیا از حذف کردن این ماژول مطمعن هستید؟")'
                        ))!!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>شناسه</th>
                            <th>نام نام ماژول</th>
                            <th>برچسب</th>
                            <th>وضعیت</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $module->id }}</td>
                            <td> {{ $module->name }} </td>
                            <td> {{ $module->label }} </td>
                            <td>@if($module->status==1) فعال @else غیر فعال@endif
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    @foreach($module->permissions as $permission)
                        <p>{{$permission->name}} - {{$permission->label}} </p>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
