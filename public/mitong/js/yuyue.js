

$(function() {
    $("#ttijiao").click(function() {

        if ($.trim($("#tFullName").val()).length < 1) {
            alert("请输入联系人！");
            $("#tFullName").focus();
            return false;
        }

        if ($.trim($("#tTel").val()).length < 1) {
            alert("请输入手机号码！");
            $("#tTel").focus();
            return false;
        }
         
        if ($.trim($("#tCity").val()) == "--请选择省份--") {
            alert("请选择省份！");

            return false;
        }

        if ($.trim($("#tCountry").val()) == "--请选择城市--") {
            alert("请选择省份！");
            return false;
        }




        if ($.trim($("#tTel").val()).length > 0) {
            var regTel = /(^[0-9\+\-]{0,20}$)/;
            if (!regTel.test($.trim($("#tTel").val()))) {
                alert("手机号码格式不正确");
                $("#tTel").focus();
                return false;
            }
        }


        $.ajax({
            type: "POST",
            url: "/AjaxFile/Tiyan.ashx",
            async: false,
            data: {
                FullName: $("#tFullName").val(),
                Tel: $("#tTel").val(),
                Address: $("#tCity").val() + "-" + $("#tCountry").val()

            },
            success: function(data) {

                if (data.indexOf("提交成功") != -1) {
                    alert("恭喜您体验成功，稍后我们会有专门跟您进行联系");
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

