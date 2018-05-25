

$(function() {
    $("#ztijiao").click(function() {

        if ($.trim($("#zCompany").val()).length < 1) {
            alert("请输入公司名称！");
            $("#zCompany").focus();
            return false;
        }

        if ($.trim($("#zTel").val()).length < 1) {
            alert("请输入手机号码！");
            $("#zTel").focus();
            return false;
        }

        if ($.trim($("#zCity").val()) == "--请选择省份--") {
            alert("请选择省份！");

            return false;
        }

        if ($.trim($("#zCountry").val()) == "--请选择城市--") {
            alert("请选择省份！");
            return false;
        }

        if ($.trim($("#zFullName").val()).length < 1) {
            alert("请填写联系人！");
            $("#zFullName").focus();
            return false;
        }

        if ($.trim($("#zEmail").val()).length < 1) {
            alert("请填写您的邮箱地址！");
            $("#zEmail").focus();
            return false;
        }


        if ($.trim($("#zTel").val()).length > 0) {
            var regTel = /(^[0-9\+\-]{0,20}$)/;
            if (!regTel.test($.trim($("#zTel").val()))) {
                alert("手机号码格式不正确");
                $("#zTel").focus();
                return false;
            }
        }

        if ($.trim($("#zEmail").val()).length > 0) {
            var regEmail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
            if (!regEmail.test($.trim($("#zEmail").val()))) {
                alert("邮箱地址格式不正确");
                $("#zEmail").focus();
                return false;
            }
        }


        $.ajax({
            type: "POST",
            url: "/AjaxFile/ZhuanJia.ashx",
            async: false,
            data: {
                MailerName: $("#zCompany").val(),
                MailerFlag: $("#zTel").val(),
                DataFlag: $("#zCity").val() + "-" + $("#zCountry").val(),
                MailerContent: $("#zFullName").val() + $("input[name=sex]:checked").val(),
                Remark: $("#zEmail").val()

            },
            success: function(data) {

                if (data.indexOf("提交成功") != -1) {
                    alert("预约成功,我们会尽快给您回复");
                    window.location.href = "/";
                }


            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器错误，请重新提交")
            }

        });
    })

    $("#reset").click(function() {
        $("#FullName").val("");
        $("#Tel").val("");
        $("#Email").val("");
        $("#Content").val("");
    })
})

