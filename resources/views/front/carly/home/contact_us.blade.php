<!-- contact-area-start -->
<div class="contact-area pt-120 grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="contact-address-wrapper mb-30">
                    <div class="section-title mb-60">
                        <h5><span></span>{{__stg('__contact_us_title_1')}}</h5>
                        <h2>{{__stg('__contact_us_title_2')}}</h2>
                    </div>
                    <div class="inner-address-icon mb-45">
                        <div class="contact-address-icon f-right">
                            <i class="{{__stg('__contact_us_address_icon_1')}}"></i>
                        </div>
                        <div class="contact-address-text">
                            <h3>{{__stg('__contact_us_address_title_1')}}</h3>
                            <span>{{__stg('__contact_us_address_line_1_1')}} : {{__stg('__contact_us_address_line_1_data_1')}}</span>
                            <span>{{__stg('__contact_us_address_line_2_1')}} : {{__stg('__contact_us_address_line_1_data_1')}}</span>
                        </div>
                    </div>
                    <div class="inner-address-icon">
                        <div class="contact-address-icon f-right">
                            <i class="{{__stg('__contact_us_address_icon_2')}}"></i>
                        </div>
                        <div class="contact-address-text">
                            <h3>{{__stg('__contact_us_address_title_2')}}</h3>
                            <span>{{__stg('__contact_us_address_line_1_2')}} : {{__stg('__contact_us_address_line_1_data_2')}}</span>
                            <span>{{__stg('__contact_us_address_line_2_2')}} : {{__stg('__contact_us_address_line_1_data_2')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="contact-wrapper mb-30">
                    <div class="contact-text">
                        <h3 style="line-height: 1.8;">{{__stg('__contact_us_form_text')}}</h3>
                    </div>
                    <form id="contacts-form" class="contacts-form" action="{{route('front.contact.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contacts-icon contactss-name mb-2">
                                    <input type="text" value="{{old('name')}}" name="name" class="mb-3" placeholder="نام">
                                    @error('name')
                                    <span class="text-white">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contacts-icon contactss-email mb-2">
                                    <input type="email" value="{{old('email')}}" name="email" class="mb-3" placeholder="ایمیل">
                                    @error('email')
                                    <span class="text-white">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contacts-icon contactss-message mb-2">
                                    <textarea name="message" id="message" cols="30" rows="10" class="mb-3" placeholder="پیام">{{old('message')}}</textarea>
                                    @error('message')
                                    <span class="text-white">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contacts-button">
                                    <button>ارسال</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact-area-end -->
