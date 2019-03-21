﻿var maxzindex;
maxzindex=0;
var nowx = 99999;
var nowy = 99999;
var lastx = 99999;
var lasty = 99999;
var mousedrag = false;
var dragbarClassName = "dragbar";
var containerClassName = "container";
var tempindex ;
tempindex = 0;
function containerAddDrag() {
    Array.from(document.getElementsByClassName(containerClassName)).forEach
        (
        function (element, index, array) {
            addMouseUp(element);
            addMouseMove(element);
        }
        );
}
function dragend()
{
    mousedrag = false;
}
function addMouseUp(element)
{
    element.addEventListener("mouseup", dragend);
    element.addEventListener("touchend", dragend);
}
function dragmove(event)
{
    
        if (mousedrag)
            if (nowx == 99999 && nowy == 99999) {
                lastx = event.clientX;
                lasty = event.clientY;
                nowx = event.clientX;
                nowy = event.clientY;
            }
            else {
                nowx = event.clientX;
                nowy = event.clientY;
                var ele = document.querySelector(".AeroGlass.active");
                ele.style.left = parseInt(getStyle(ele, "left").replace("px", "")) + nowx - lastx;
                ele.style.top = parseInt(getStyle(ele, "top").replace("px", "")) + nowy - lasty;
                lastx = nowx;
                lasty = nowy;
            }
    
}
function addMouseMove(element)
{
    element.addEventListener("mousemove", dragmove);
    element.addEventListener("touchmove", dragmove);
}
function dragstart()
{
    var AeroGlass = GetAncenstorAeroWindow(this);
        Active(AeroGlass);
        mousedrag = true;
        nowx = 99999;
        nowy = 99999;
}
function addMouseDown(element,AeroGlass)
{

    element.addEventListener("mousedown", dragstart );
    element.addEventListener("touchstart", dragstart);
}
function addMouseActive(element,AeroGlass)
{
    element.addEventListener("mousedown", function () {
        Active(AeroGlass);
         nowx = 99999; nowy = 99999;
    });
}
function addNodeDragMove(node)
{
    addMouseActive(node, node);
    var dragbar = node.getElementsByClassName(dragbarClassName)[0];
    containerAddDrag();
    node.style.zIndex = maxzindex++;
    addMouseDown(dragbar, node);
    addMouseUp(dragbar);
    Array.from(node.children).forEach(function (ele, index, arr)
    {
        addMouseActive(ele, node);
    });
}
function addDragMove() {
    containerAddDrag()
    Array.from(document.getElementsByClassName("AeroGlass")).forEach
        (
        function (ele, ind, arr) {
            addNodeDragMove(ele);
        }
        );
}
 addDragMove();
 