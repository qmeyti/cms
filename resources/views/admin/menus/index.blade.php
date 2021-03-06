@extends('layouts.backend')

@section('head')
    <!-- SWEET ALERT -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}">
    {{--JQUERY-UI--}}
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}">
    <style>
        #MENU_DRAWER ul,#MENU_DRAWER ol,#MENU_DRAWER li{
            margin: unset;
            padding: unset;
        }

        #MENU_DRAWER ol {
            display: block;
            margin-right: 30px!important;
            list-style: none;
            text-indent: unset;
        }

        #MENU_DRAWER ol:first-child {
            margin-right: unset !important;
        }

        #MENU_DRAWER .collection .item {
            display: block;
            margin: 20px 5px 20px 0 !important;
        }

        #MENU_DRAWER .collection .item > .item-wrapper {
            background-color: rgba(0,0,0,.03);
            padding: 5px;
            border: 1px solid rgba(0,0,0,.125);
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        #MENU_DRAWER .collection .item > .item-wrapper .r-child {
            display: flex;
            align-items: center;
            justify-content: start;
            color: #424242;
            font-size: 18px;
        }

        #MENU_DRAWER .collection .item > .item-wrapper .l-child {
            display: flex;
            align-items: center;
            justify-content: end;
        }

        #MENU_DRAWER .collection .item > .item-wrapper .r-child div {
            width: 32px;
            height: 32px;
            margin: 3px 3px 3px 6px;
        }

        #MENU_DRAWER .collection .item > .item-wrapper .r-child div img {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            box-shadow: 0 0 1px 1px #e4e4e4;
        }

        #MENU_DRAWER .collection .item > .item-wrapper .r-child small {
            font-size: 12px;
            padding: 0 5px;
        }

        #MENU_DRAWER .collection .item > .item-wrapper .r-child .title {
            font-size: 16px;
        }

        .select2.select2-container.select2-container--default.select2-container--below, .select2.select2-container.select2-container--default.select2-container--above, .select2.select2-container.select2-container--default {
            width: 100% !important;
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow {
            right: unset;
            left: 3px;
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow b {
            right: 50%;
            margin-right: -4px;
        }

        span.select2.select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            margin-top: 0 !important;
        }

        .img-flag {
            width: 30px;
            height: 30px;
        }
    </style>

@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col align-items-center d-flex">
                        <h4>
                            ???????????? ??????????
                        </h4>
                    </div>
                    <div class="col">
                        @include('admin.menus.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-3 mb-3">
                    <div class="col-auto">
                        @include('admin.menus.switch')
                    </div>
                    <div class="col">

                    </div>
                </div>

                @if(!is_null($menu))
                    <div class="row">
                        <div class="col-md-4">

                            <div class="card mb-3 border">
                                <div class="card-header">
                                    <h6>
                                        <i class="fas fa-plus"></i>
                                        ???????? ????????????
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @include('admin.menus.create_link')
                                </div>
                            </div>

                            <div class="card mb-3 border">
                                <div class="card-header">
                                    <h6>
                                        <i class="fas fa-plus"></i>
                                        ???????? ??????????
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @include('admin.menus.create_page')
                                </div>
                            </div>

                            <div class="card mb-3 border">
                                <div class="card-header">
                                    <h6>
                                        <i class="fas fa-plus"></i>
                                        ???????? ????????????
                                    </h6>
                                </div>
                                <div class="card-body">

                                    @include('admin.menus.create_route')

                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">

                            <div class="card border">
                                <div class="card-header border-bottom">
                                    @include('admin.menus.edit')
                                </div>
                                <div class="card-body">
                                    <h6 class="mt-3">???????????? ??????</h6>
                                    <p style="font-size: .8rem">???? ?????? ???????? ???? ???????????? ???????? ???? ???? ???????? ?? ?????????? ????????. ???????????? ???? ???????? ???? ?????? ?????? ???????? ???? ???????? ???????????????? ???????? ???????????? ???? ????????????.</p>
                                    @include('admin.menus.menu')
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="card-footer ltr">

            </div>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="{{asset('vendor/jquery/jquery-3.6.0.min.js')}}"></script>

    <!-- SWEET ALERT -->
    <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script>
        /**
         * Generate Sweet alert object
         */
        function toastObject() {

            return Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

        }

        /**
         * Short hand for toast alert
         *
         * @param messageTitle
         * @param icon
         */
        function doAlert(messageTitle, icon = 'error') {
            /**
             * Toast alert init
             */
            let Toast = toastObject();

            return Toast.fire({
                icon: icon,
                title: messageTitle
            });

        }
    </script>
    {{--JQUERY-UI--}}
    <script src="{{asset('vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    {{--NESTED SORTABLE--}}
    <script src="{{asset('vendor/nestedSortable/jquery.mjs.nestedSortable.js')}}"></script>
    @if(!is_null($menu))
        <script>
            const SAVE_ORDER_ROUTE = '{{route('order.menu.item',['menu' => $menu->id])}}';
            const CSRF_TOKEN = '{{csrf_token()}}';
        </script>
    @endif
    <script src="{{asset('assets/style/module/menu/index.js')}}"></script>

@endsection
