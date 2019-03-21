// JavaScript source code
var Load = Load || {};
Load.definePath = 'js/define.js';
Load.defineLookFor = 'define';
Load.loadPath = 'js/load.js';
Load.js = Load.js || {};
Load.js.import = (jsConf, callback, lookFor) =>
{
    Load.js.load(jsConf[0].src);
    Load.js.waitForScriptLoading(jsConf, () =>
    { 
        jsConf.splice(0, 1);//將陣列第一個去掉
        if (jsConf.length > 0)
            Load.js.import(jsConf, lookFor);
    });
}
Load.js.reimport = (jsConf, callback, lookFor) =>
{
    Load.js.reload(jsConf[0].src);
    Load.js.waitForScriptLoading(jsConf, () =>
    {
        jsConf.splice(0, 1);//將陣列第一個去掉
        if (jsConf.length > 0)
            Load.js.import(jsConf, lookFor);
    });
}
Load.js.waitForScriptLoading = (jsConf, callback) =>
{
    var interval = setInterval(() =>
    {
        if (typeof jsConf[0].lookFor === 'undefined')
            jsConf[0].lookFor = '';
        if (jsConf[0].lookFor === '')
        {
            clearInterval(interval);
            callback();
        }
        else if (eval("typeof " + jsConf[0].lookFor) !== 'undefined')
        {
            clearInterval(interval);
            callback();
        }
    }, 50);
}
Load.js.load = function (url, location)
{
    location = location || document.head;
    var scriptTag = document.createElement('script');
    scriptTag.type = 'text/javascript';
    scriptTag.src = url;
    location.appendChild(scriptTag);
};
Load.js.reload=function reloadJS(url)
{
    var oldJS = document.querySelector("script[src='" + url + "']");
    if (oldJS != null)
        oldJS.remove();
    Load.js.load(url);
}
function onloading()
{
    document.head.innerHTML += '<link rel="stylesheet" href="css/AeroGlassByNawaNawa.css" type="text/css"/>';
    document.head.innerHTML += '<link rel="stylesheet" href="css/DesktopIconByNawaNawa.css" type="text/css"/>';
    //  loadJS('js/PACE.min.js');
    Load.js.import(
        [
            { src: 'js/jquery-3.1.0.js', lookFor: 'jQuery' },
            { src: 'code-prettify-master/loader/run_prettify.js', lookFor: '' },
            { src: 'js/AJAX.js', lookFor: 'GETRequest' },
            { src: 'js/AeroGlassWindowByNawaNawa.js', lookFor: 'AeroWindowControl' },
            { src: 'js/dragmoveByNawaNawa.js', lookFor: 'containerAddDrag' },
            { src: 'js/WindowsByNawaNawa.js', lookFor: 'createWindowCommon' },
            { src: 'js/GetVariable.js', lookFor: 'getVariable' },
            { src: 'js/cookie.js', lookFor: 'getCookie' },
            { src: ' js/BackStage.js', lookFor: 'setColor' },
           
        ]
    );
    /*loadJS('js/Random.js');     //改用php隨機背景 如果未支援php(靜態網頁)才需使用
    loadJS('js/BackgroundRandom.js');*/
    /*loadJS('js/FixedObject.js');*/

}
onloading();