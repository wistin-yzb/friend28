!(function (global,factory) {
    global.MyweChat = factory();
})(window,function () {
    return function (obj) {
        var _this = this;
        _this.share = 0;
        window._Data =  new Array();
        Jshttp(obj.api,function (json) {
            window._Data.config = json;
            window._Data.config.jsApiList = ["onMenuShareTimeline","onMenuShareAppMessage","hideOptionMenu","showOptionMenu","hideMenuItems","showMenuItems","closeWindow"];
            window._Data.Info = {
                'title':obj.title !== undefined ? obj.title : '天天向上',
                'desc':obj.desc !== undefined ? obj .desc : '好好学习',
                'img_url':obj.img !== undefined ? obj.img : 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1542618616389&di=d0969227ed2935b4356661cb85f155c6&imgtype=0&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F014565554b3814000001bf7232251d.jpg%401280w_1l_2o_100sh.png',
                'link':obj.link !== undefined ? obj.link :'https://timgsa.baidu.com',
                'type':obj.type !== undefined ? obj.type : 'link'
            };  
            
            jWeixin.config(window._Data.config);
            jWeixin.ready(function () { 
                if(obj.ishide !== undefined && obj.ishide == true){
                    jWeixin.hideMenuItems({
                        menuList: ['menuItem:setFont','menuItem:exposeArticle','menuItem:dayMode','menuItem:nightMode','menuItem:refresh','menuItem:profile','menuItem:addContact','menuItem:share:qq','menuItem:share:weiboApp','menuItem:favorite','menuItem:share:facebook','menuItem:share:QZone','menuItem:editTag','menuItem:delete','menuItem:copyUrl','menuItem:originPage','menuItem:readMode','menuItem:openWithQQBrowser','menuItem:openWithSafari','menuItem:share:email','menuItem:share:brand','menuItem:share:timeline']
                    });
                }
                jWeixin.onMenuShareAppMessage({
                    title: window._Data.Info.title,
                    desc: window._Data.Info.desc,
                    link: window._Data.Info.link,
                    imgUrl: window._Data.Info.img_url,
                    type:window._Data.Info.type,
                    success: function() {
                        _this.shaer_tips();
                    }
                });
                jWeixin.onMenuShareTimeline({
                    title:window._Data.Info.title,
                    link: window._Data.Info.link,
                    imgUrl:window._Data.Info.img_url,
                    type:window._Data.Info.type,
                    success: function() {
                        _this.shaer_p_tips();
                    }
                });
            });
        });
        _this.appMessage = function () {
            jWeixin.hideMenuItems({menuList:['menuItem:share:appMessage']});
            jWeixin.showMenuItems({menuList:['menuItem:share:timeline']});
        };
        _this.timeline = function () {
            jWeixin.hideMenuItems({menuList:['menuItem:share:timeline']});
            jWeixin.showMenuItems({menuList:['menuItem:share:appMessage']});
        };
        _this.shaer_tips = function () {};
        _this.shaer_p_tips = function () {};
        _this.Reloadconfig = function () {
            jWeixin.config(window._Data.config);
            jWeixin.ready(function () {
                jWeixin.onMenuShareAppMessage({
                    title: window._Data.Info.title,
                    desc: window._Data.Info.desc,
                    link: window._Data.Info.link,
                    imgUrl: window._Data.Info.img_url,
                    type:window._Data.Info.type,
                    success: function() {
                        _this.shaer_tips();
                    }
                });
                jWeixin.onMenuShareTimeline({
                    title:window._Data.Info.title,
                    link: window._Data.Info.link,
                    imgUrl:window._Data.Info.img_url,
                    type:window._Data.Info.type,
                    success: function() {
                        _this.shaer_p_tips();
                    }
                });
            });
        };
    };
    function Jshttp(url,callback) {
        var httpRequest = new XMLHttpRequest();//第一步：建立所需的对象
        httpRequest.open('GET', url, true);
        httpRequest.send();
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                var json = JSON.parse(httpRequest.responseText);//获取到json字符串，还需解析
                callback(json);
            }
        };
    }

});