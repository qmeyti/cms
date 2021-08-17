@extends('layouts.backend')

@section('head')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">ساخت صفحه جدید</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/pages') }}" title="بازگشت">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-right" aria-hidden="true"></i> بازگشت</button>
                        </a>
                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/pages', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.pages.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>--}}
    {{--    <script src="https://cdn.tiny.cloud/1/1lx5nhnj3ybljvrcy8qsrtfnc6xl60ugs7neudi6ep07d7h5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}

    <script type="text/javascript">
        // tinymce.init({
        //     selector: '.crud-richtext'
        // });

        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {

                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {

            document.getElementById('FEATURE_PHOTO_INPUT').value = $url;

            const imageTag = document.querySelector('#FEATURE_PHOTO_PREVIEW img');

            imageTag.setAttribute('src', $url);
        }

        function postTypeSwitcher() {

            const type = $('#type option:selected').val();

            if (type === 'post') {

                $('#CATEGORY_SECTION').removeClass('d-none');

                $('#PARENT_SECTION').addClass('d-none')

            } else {

                $('#PARENT_SECTION').removeClass('d-none');

                $('#CATEGORY_SECTION').addClass('d-none')

            }

        }

        $(document).ready(function () {
            postTypeSwitcher();

            $('#type').change(function (){
                postTypeSwitcher();
            });

        });

    </script>
@endsection
