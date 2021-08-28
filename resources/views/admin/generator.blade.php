@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                                                <h4 class="card-title">

                        سازنده
                                            </h4>

                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="post" action="{{ url('/admin/generator') }}">
                            {{ csrf_field() }}

                            <div class="form-group row mb-3">
                                <label for="crud_name" class="col-md-4 col-form-label text-right">نام Crud:</label>
                                <div class="col-md-6">
                                    <input type="text" name="crud_name" class="form-control ltr" id="crud_name" placeholder="Posts" required="true">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="controller_namespace" class="col-md-4 col-form-label text-right">فضای نام کنترلر:</label>
                                <div class="col-md-6">
                                    <input type="text" name="controller_namespace" class="form-control ltr" id="controller_namespace" placeholder="Admin">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="route_group" class="col-md-4 col-form-label text-right">پیشوند Route Group:</label>
                                <div class="col-md-6">
                                    <input type="text" name="route_group" class="form-control ltr" id="route_group" placeholder="admin">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="view_path" class="col-md-4 col-form-label text-right">مسیر فایل قالب:</label>
                                <div class="col-md-6">
                                    <input type="text" name="view_path" class="form-control ltr" id="view_path" placeholder="admin">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="route" class="col-md-4 col-form-label text-right">قصد افزودن مسیر را دارید؟</label>
                                <div class="col-md-6">
                                    <select name="route" class="form-control" id="route">
                                        <option value="yes">بله</option>
                                        <option value="no">خیر</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="relationships" class="col-md-4 col-form-label text-right">ارتباطات</label>
                                <div class="col-md-6">
                                    <input type="text" name="relationships" class="form-control ltr" id="relationships" placeholder="comments#hasMany#App\Comment">
                                    <p class="help-block ltr">method#relationType#Model</p>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="form_helper" class="col-md-4 col-form-label text-right">Form Helper</label>
                                <div class="col-md-6">
                                    <input type="text" name="form_helper" class="form-control ltr" id="form_helper" placeholder="laravelcollective" value="laravelcollective">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="soft_deletes" class="col-md-4 col-form-label text-right">قصد افزودن soft deletes دارید؟</label>
                                <div class="col-md-6">
                                    <select name="soft_deletes" class="form-control" id="soft_deletes">
                                        <option value="no">خیر</option>
                                        <option value="yes">بله</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group table-fields">
                                <br>
                                <h4 class="text-center">فیلد های جدول پایگاه داده:</h4>
                                <br>
                                <div class="entry col-md-10 offset-md-2 form-inline">

                                    <input class="form-control m-3" name="fields[]" type="text" placeholder="نام‌ـ‌فیلد" required="true">

                                    <select name="fields_type[]" class="form-control m-3">
                                        <option value="string">string</option>
                                        <option value="char">char</option>
                                        <option value="varchar">varchar</option>
                                        <option value="password">password</option>
                                        <option value="email">email</option>
                                        <option value="date">date</option>
                                        <option value="datetime">datetime</option>
                                        <option value="time">time</option>
                                        <option value="timestamp">timestamp</option>
                                        <option value="text">text</option>
                                        <option value="mediumtext">mediumtext</option>
                                        <option value="longtext">longtext</option>
                                        <option value="json">json</option>
                                        <option value="jsonb">jsonb</option>
                                        <option value="binary">binary</option>
                                        <option value="number">number</option>
                                        <option value="integer">integer</option>
                                        <option value="bigint">bigint</option>
                                        <option value="mediumint">mediumint</option>
                                        <option value="tinyint">tinyint</option>
                                        <option value="smallint">smallint</option>
                                        <option value="boolean">boolean</option>
                                        <option value="decimal">decimal</option>
                                        <option value="double">double</option>
                                        <option value="float">float</option>
                                    </select>

                                    <label class="m-3">ضروری</label>
                                    <select name="fields_required[]" class="form-control m-3">
                                        <option value="0">بله</option>
                                        <option value="1">خیر</option>
                                    </select>

                                    <button class="btn btn-success btn-add inline btn-sm m-3" type="button">
                                        <span class="fas fa-plus"></span>
                                        جدید
                                    </button>
                                </div>
                            </div>
                            <p class="help text-center">It will automatically assume form fields based on the migration field type.</p>
                            <br>
                            <div class="form-group row mb-3">
                                <div class="offset-md-4 col-md-4">
                                    <button type="submit" class="btn btn-primary" name="generate">ایجاد سازنده جدید</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                var tableFields = $('.table-fields'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(tableFields);

                newEntry.find('input').val('');
                tableFields.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fas fa-minus"></span> حذف');
            }).on('click', '.btn-remove', function(e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });

        });
    </script>
@endsection
