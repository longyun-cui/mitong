{{--<!--Seciton Contact Us 联系我们-->--}}
<section class="wrapper-module-container module-contact background-fixed bg-fixed-map-point" id="contact">
    <div class="row full block-in">


        {{--<!--header-->--}}
        <div class="module-header-box">
            <div class="module-header-title-row wow fadeInUp" data-wow-delay=".1s">
                <h2 class="">联系我们</h2>
            </div>
            <div class="module-header-desc-row wow fadeInUp" data-wow-delay=".2s">
                <h4 class="">Contact Us</h4>
            </div>
        </div>


        {{--<!--body-->--}}
        <div class="module-body-box wow fadeInUp" data-wow-delay=".3s">

            <section class="col-sm-8 col-md-8 col-lg-8">
                    <div class="">
                        <div class="info">
                            <div class="info-row">
                                <div class="icon icon-location"><i class="fa fa-location-arrow"></i></div>
                                <div class="text"><span>上海市 闵行区 泰虹路168号 万科时一区 T2楼8 楼</span></div>
                            </div>
                            <div class="info-row">
                                <div class="icon icon-telephone"><i class="fa fa-phone"></i></div>
                                <div class="text"><span>售前 186-2136-5151</span></div>
                            </div>
                            <div class="info-row">
                                <div class="icon icon-telephone"><i class="fa fa-phone"></i></div>
                                <div class="text"><span>售后 177-1736-8566</span></div>
                            </div>
                            {{--<div class="info-row">--}}
                                {{--<div class="icon icon-email"><i class="fa fa-envelope"></i></div>--}}
                                {{--<div class="text"><span>info@shmitong.com</span></div>--}}
                            {{--</div>--}}
                            <div class="info-row">
                                <div class="icon icon-website"><i class="fa fa-globe"></i></div>
                                <div class="text"><span>www.shmitong.com</span></div>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="col-sm-4 col-md-4 col-lg-4">
                    <div class="">
                        <form name="sentMessage" id="contactForm" novalidate="">
                            <div class="">
                                <div class="full">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="您的姓名 *" id="name" required="" data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="您的邮箱 *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="您的电话 *" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="留言 *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                        <div id="success"></div>
                                        <button type="submit" class="fa fa-send contact-submit"><i class="ion-paper-airplane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>

        </div>



    </div>
</section>
