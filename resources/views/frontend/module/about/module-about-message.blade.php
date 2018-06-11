
<section class="service-feedback">

    <!--Bg-->
    <b class="bg wow bounceInDown"><i></i></b>

    <!--Text-->
    <div class="text-center text">
        <p>辛苦将您的留言信息填写至下方的表格中,</p>
        <p>请留下您的正确信息，以便我们及时地回复。</p>
    </div>

    <!--Form-->
    <div class="form">
        <form action="about_Message.php-action=add.html" method="post">
            <div class="form-m"><div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
								<span class="items im">
									<b class="ico"><img src="picture/icon-from-user.png" class="vcenter" width="15" height="15" alt="" /></b>
									<input type="text" name="nickname" class="form-control" placeholder="姓名" id="FullName" maxlength="20" />
								</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-min">
								<span class="items im">
									<b class="ico"><img src="picture/icon-from-tel.png" class="vcenter" width="15" height="15" alt="" /></b>
									<input type="text" name="contact" class="form-control" placeholder="联系电话" id="Tel" maxlength="20" />
								</span>
                    </div>
                </div></div>
            <div class="form-m"><div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
								<span class="items im">
									<b class="ico"><img src="picture/icon-from-user.png" class="vcenter" width="15" height="15" alt="" /></b>
									<input type="text" name="gongsi" class="form-control" placeholder="公司名字" id="FullName" maxlength="20" />
								</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-min">
								<span class="items im">
									<b class="ico"><img src="picture/icon-from-tel.png" class="vcenter" width="15" height="15" alt="" /></b>
									<input type="text" name="yusuan" class="form-control" placeholder="预算" id="Tel" maxlength="20" />
								</span>
                    </div>
                </div></div>
            <div class="form-m">
                <div class="row">
                    <div class="col-xs-12">
									<span class="items im">

										<textarea name="content" class="form-control form-control-nopadding" placeholder="请填写您的留言内容..." id="Content" rows="5" cols=""></textarea>
									</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
									<span class="items clearfix">
										<input type="text" style="width: 100px;" maxlength="4" class="form-control form-control-nopadding pull-left" placeholder="验证码" name="validate" id="txtCode" value="" />
										<img id="ckstr" src="data/captcha/ckstr.php.jpeg" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" />
										<a href="javascript:;" class="pull-left hidden-xs" style="margin-left: 10px;line-height: 34px;" onclick="$('#ImageKey').attr('src', '/TrueLand_T_Site_Login/Code.aspx?dump=' + Math.random());">看不清，换一张</a>
									</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <input type="submit" class="btn" name="" id="tijiao" value="提 交" /> &nbsp;&nbsp;
                        <input type="reset" class="btn" name=""  value="重 置" />
                    </div>
                </div>
                <div class="leixing" style="display:none">在线留言</div>
            </div>
        </form>
    </div>

</section>