var Hits = function (id) {
    this.ID = id;
    this.type = "GetNewsHits()";
    this.CallMethod = "GetNewsHits()";
    
}
Hits.prototype = {
    GetNewsHits: function () {
        this.type = "GetNewsHits()";
        this.CallMethod = "GetNewsHits()";
        this.GetHitsAjax();
    },
    GetProductHits: function () {
        this.type = "GetProductHits()";
        this.CallMethod = "GetProductHits()";
        this.GetHitsAjax();
    },
    GetDownLoadHits: function () {
        this.type = "GetDownLoadHits()";
        this.CallMethod = "GetDownLoadHits()";
        this.GetHitsAjax();
    },
    GetCaseHits: function() {
        this.type = "GetCaseHits()";
        this.CallMethod = "GetCaseHits()";
        this.GetHitsAjax();
    },
	GetJobHits: function() {
        this.type = "GetJobHits()";
        this.CallMethod = "GetJobHits()";
        this.GetHitsAjax();
    },
    GetVideoHits: function() {
        this.type = "GetVideoHits()";
        this.CallMethod = "GetVideoHits()";
        this.GetHitsAjax();
    },
	GetReserveHits: function() {
        this.type = "GetReserveHits()";
        this.CallMethod = "GetReserveHits()";
        this.GetHitsAjax();
    },
    GetHitsAjax: function () {
        $.ajax({
            type: "POST",
            url: "/AjaxFile/GetHits.ashx",
            async: false,
            data: {
                type: this.type,
                CallMethod: this.CallMethod,
                ID: this.ID
            },
            success: function (data) {
                html = data;
            }
        });
        return document.write(html);
    }
}
//页面用法：<script language="javascript" type="text/javascript" > new Hits({$ReplaceModelID$}).GetNewsHits();</script>