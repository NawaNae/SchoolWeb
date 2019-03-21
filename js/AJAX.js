function createLoadingImg()
{
    var loadImg = document.createElement('img');
    loadImg.dataset.index = 0;
    loadImg.src = ImageLoadingPath + '/' + loadingImgList[0];
    loadImg.classList.add( 'loadingImg');
    loadImg.dataset.loadTimer = window.setInterval(function () {
        var i = parseInt(loadImg.dataset.index);
        i++;
        if (i == loadingImgList.length)
            i = 0;
        loadImg.src = ImageLoadingPath + '/' + loadingImgList[i];
        loadImg.dataset.index = i;
    }, 50);
    return loadImg;
}
function setLoadingImg(Obj)
{
    Obj.innerHTML = '';
    var img = createLoadingImg()
    Obj.appendChild(img);
    return img;
}
function GETRequest(Url,httpcallback,errDisplayObj)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4)
            if (xmlhttp.status == 200)
                httpcallback(xmlhttp);
            else
                if (typeof errDisplayObj != 'undefined')
                    errDisplayObj.innerText = 'Error\nFailed to load ' + Url;
                else
                    alert('Error\nFailed to load ' + Url);
    }
    xmlhttp.open("GET", Url, true);
    xmlhttp.send();
}
function GETRequestToObjHtml(Url, Obj)
{
    setLoadingImg(Obj);
    GETRequest(Url, function (txt)
    {
        window.clearInterval(parseInt(Obj.querySelector('.loadingImg').dataset.loadTimer));
        Obj.innerHTML = txt.response;
    });
}
function POSTRequest(Url, paraments, httpcallback, errDisplayObj)
{
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4)
            if (xmlhttp.status == 200)
                httpcallback(xmlhttp);
            else
                if (typeof errDisplayObj != 'undefined')
                    errDisplayObj.innerText = 'Error\nFailed to load ' + Url;
                else
                    alert('Error\nFailed to load ' + Url);
    }
    xmlhttp.open("POST", Url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
    xmlhttp.send(paraments);
}
function TimesCallback(xmlhttps) {
    document.getElementById("Times").innerText = "瀏覽人數 "+ xmlhttps.responseText + "人"; 
}
function commentBox(windowEle, width) {
    var commentBox = document.createElement('div');
    commentBox.className = 'g-comments';
    commentBox.dataset.href = location.href;
    commentBox.dataset.first_party_property = "BLOGGER";
    commentBox.dataset.width = typeof width == 'undefined' ? '600' : width;
    commentBox.dataset.view_type = "FILTERED_POSTMOD";
    var cont = windowEle.querySelector('.content');
    cont.appendChild(commentBox);
    Load.js.reload('https://apis.google.com/js/plusone.js');
}
function POSTRequestToObjHtml(Url, paraments, Obj) {
    setLoadingImg(Obj);
    POSTRequest(Url, paraments, function (txt) {
        window.clearInterval(parseInt(Obj.querySelector('.loadingImg').dataset.loadTimer));
        Obj.innerHTML = txt.response;
    });
}
function LoadToObj(Url, Obj, func)
{
    var img = setLoadingImg(Obj);
    var timerThis = img.dataset.loadTimer;
    $(Obj).load(Url, function () {
        window.clearInterval(timerThis);
        if (typeof func != 'undefined')
            func();
    });
}