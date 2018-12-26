<html>
<head>
    <meta charset="UTF-8"/>
    <title>sojson js高级加密专破工具， https://www.sojson.com/javascriptobfuscator.html</title>
</head>
<body>
<form action="#">
    <textarea name="js-code" id="js-code" cols="100" rows="30"></textarea>
    <button id="decode-btn" type="button">DECODE</button>
</form>
<script type="text/javascript">
    !function () {
        document.getElementById("decode-btn").addEventListener("click", event => {
            const jsCodeBox = document.getElementById("js-code");
            const rawJs = jsCodeBox.value;
 
            let decodeJs = replaceDictionaryIndexReference(rawJs);
            decodeJs = squareBracketsToDot(decodeJs);
            decodeJs = dropSignature(decodeJs);
            jsCodeBox.value = decodeJs;
 
            /**
             * 字典引用替换为字面值常量
             *
             * @param rawJs
             * @returns {*}
             */
            function replaceDictionaryIndexReference(rawJs) {
                const dictionaryNameSet = extractDictionaryNames(rawJs);
                let decodeJs = rawJs;
                dictionaryNameSet.forEach(dicName => {
                    // 将字典声明于当前上下文环境
                    const dicCode = new RegExp("(var\\s+|)" + dicName + "\\s*=\\s*\\[.+?\\];").exec(decodeJs)[0];
                    eval(dicCode);
 
                    // 将访问到此变量的地方引用替换为字面值
                    let isChange = false;
                    decodeJs = decodeJs.replace(new RegExp(dicName + "\\[\\d+\\]", "g"), index => {
                        const dicIndex = parseInt(/\[(\d+)]/.exec(index)[1]);
                        let result = eval(dicName + "[" + dicIndex + "]");
                        // 对于文本，需要加上双引号
                        if (!result.match(/^\d+$/)) {
                            result = "\"" + result + "\"";
                        }
                        isChange = true;
                        return result;
                    });
 
                    // 如果此变量被使用过，则将其从原文中清除
                    if (isChange) {
                        decodeJs = decodeJs.replace(dicCode, "");
                    }
                });
                return decodeJs;
            }
 
            /**
             * 抽取出所有字典名称
             *
             * @param rawJs
             * @returns {Set}
             */
            function extractDictionaryNames(rawJs) {
                const re = /(_+\w+?)\s*=\s*\[.+?]/g;
                // const re = /(_0x\w+?)\s*=/g;
                const dictionaryNameSet = new Set();
                while (dicName = re.exec(rawJs)) {
                    dictionaryNameSet.add(dicName[1]);
                }
                return dictionaryNameSet;
            }
 
            /**
             * 方法调用尽量由["foo"]的形式转为点调用
             *
             * @param decodeJs
             * @returns {string | void | *}
             */
            function squareBracketsToDot(decodeJs) {
                return decodeJs.replace(/\w+\["\w+"]/g, call => {
                    const nameAndAttr = call.replace("[\"", " ").replace("\"]", "").split(" ");
                    try {
                        // 只替换name在当前上下文中已存在并且attr的类型是function
                        if (typeof eval(nameAndAttr[0] + "." + nameAndAttr[1]) === "function") {
                            return nameAndAttr[0] + "." + nameAndAttr[1];
                        }
                    } catch (e) {
                        console.log("cannot replace: " + call);
                    }
                    return call;
                });
            }
 
            /**
             * 丢弃作者的签名
             *
             * @param encodeJs
             * @returns {string | void | *}
             */
            function dropSignature(encodeJs) {
                return encodeJs.replace(/^var __encode.+?\(window\);/, "");
            }
 
        });
    }();
</script>
</body>
</html>