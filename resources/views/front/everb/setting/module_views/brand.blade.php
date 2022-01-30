@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                تنظیمات منوهای سایت
            </div>

            <div class="card-body">
                {!! Form::open(['url' => route('template.store',['module' => 'brand']), 'class' => 'form-horizontal', 'files' => true]) !!}

                @for($i = 1; $i <= 10 ;$i++)
                    @include('admin.component.image_uploader',['removeFunc'=> 'imageRemover(\''. ('__brand_' . $i) .'\')','uploadFunc' => 'imageUploader(\''. ('__brand_' . $i) .'\')' ,'fieldTitle' => 'لوگوی شرکت همکار شماره ' . $i,'fieldName' => '__brand_' . $i, 'old' => old( '__brand_' . $i, __stg_straight('__brand_'.$i))])
                @endfor
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-save"></i> ذخیره تغییرات</button>
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/component/multiImageUploader.js')}}"></script>
@endsection


