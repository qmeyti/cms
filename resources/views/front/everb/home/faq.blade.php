        <!-- Faq Section Start -->
        <div class="faq-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>سوالات متداول کاربران ما</h2>


                        @foreach($faq as $item)

                        <div class="topic">
                            <div class="open">
                                <h3 class="question">{{$item->question}}</h3>
                                <span class="faq-t"></span>
                            </div>
                            <p class="answer">{{$item->answer}}</p>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>    
        <!-- Faq Section End -->