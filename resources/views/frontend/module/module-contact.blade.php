{{--<!--Seciton Contact Us 联系我们-->--}}
<section class="wrapper-module-container background-bg background-bg-map module-contact">
    <div class="row full block-full">

        <div class="module-header-container">
            <h2 class="wow fadeInUp" data-wow-delay=".4s">联系我们</h2>
            <h4 class="wow fadeInUp" data-wow-delay=".4s"> &nbsp; </h4>
            <h3 class="en wow fadeInUp" data-wow-delay=".2s">Contact Us</h3>
        </div>

        <div class="module-block-container wow fadeInUp" data-wow-delay=".4s">

            <section class="col-md-6 col-lg-6 ">
                <div class="container">
                    <div class="col-md-12">
                        <div class="info">
                            <div class="info-row">
                                <div class="icon icon-location"><i class="fa fa-location-arrow"></i></div>
                                <div class="text"><span>上海市 闵行区 泰虹路168号 万科时一区 T2楼8 楼</span></div>
                            </div>
                            <div class="info-row">
                                <div class="icon icon-telephone"><i class="fa fa-phone"></i></div>
                                <div class="text"><span>186-2136-5151</span></div>
                            </div>
                            <div class="info-row">
                                <div class="icon icon-email"><i class="fa fa-envelope"></i></div>
                                <div class="text"><span>info@shmitong.com</span></div>
                            </div>
                            <div class="info-row">
                                <div class="icon icon-website"><i class="fa fa-globe"></i></div>
                                <div class="text"><span>www.shmitong.com</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-md-6 col-lg-6">
                <div class="container">
                    <div class="col-md-12">
                        <form name="sentMessage" id="contactForm" novalidate="">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
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
                </div>
            </section>
            <div class="clearfix"></div>

        </div>



    </div>
</section>


<style>
    .module-contact { font-size: 16px; }
    .module-contact input { height: auto; padding: 16px; border: 2px solid #eee; }
    .module-contact textarea { height: 160px; padding: 16px; border: 2px solid #eee; }
    .module-contact input:hover, .module-contact textarea:hover { border: 2px solid #00ceb8; }
    .contact-submit {
        width: 160px;
        padding: 16px;
        margin: 0 auto;
        margin-top: -32px;
        border: 2px solid #00ceb8;
        font-size: 32px;
        color: #00ceb8;
        background: #fff;
    }

    .module-contact .info {
        display: table;
        list-style: none;
        padding: 0 32px;
        width: 100%;
        margin: 0 auto;
        text-align: left;
    }
    .module-contact .info .info-row { width: 100%; height: 80px; margin-bottom: 32px; font-size: 24px; float: left; }
    .module-contact .info .info-row .icon {
        width: 80px;
        height: 100%;
        line-height: 80px;
        border-radius: 40px;
        font-size: 40px;
        text-align: center;
        vertical-align: middle;
        float: left;
    }
    .icon-location {background-color: #ff7800;}
    .icon-telephone {background-color: #63cfea;}
    .icon-email {background-color: #6ecba9;}
    .icon-website {background-color: #ff6969;}

    .module-contact .info .info-row .text {
        width: -webkit-calc(100% - 100px);
        width: -moz-calc(100% - 100px);
        width: calc(100% - 100px);
        height: 100%;
        padding-left:20px;
        vertical-align: middle;
        /*float: right;*/

        list-style: none;
        display: table;
    }
    .module-contact .info .info-row .text span {
        display: table-cell;
        vertical-align: middle;
    }
</style>