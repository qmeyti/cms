<!-- Contact Section Start -->
<div class="contact-section pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0 contact-img">
                <img src="{{asset('front/everb/img/contact.jpg')}}" alt="contact">
            </div>

            <div class="col-lg-6 p-0">
                <div class="contact-form">
                    <div class="contact-text">
                        <h3>تیم ما با قدرت پاسخگویی می کند</h3>
                        <p>برای ما پیام بگذارید ما با اشتیاق پاسخ می دهیم</p>
                    </div>

                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required data-error="نام خود را وارد کنید" placeholder="نام شما">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="ایمیل خود را وارد کنید" placeholder="ایمیل شما">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="موضوع خود را وارد کنید" placeholder="موضوع شما">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="message-field" id="message" cols="30" rows="5" required data-error="پیام خود را بنویسید" placeholder="پیام شما"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn contact-btn">
                                    ارسال پیام
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>

                    <img src="{{asset('front/everb/img/shapes/1.png')}}" class="contact-shape" alt="shape">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section End -->
