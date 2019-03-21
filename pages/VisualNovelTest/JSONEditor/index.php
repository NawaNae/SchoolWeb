<?php
?>
<html>
<head>
	<meta charset="utf-8" />
	<script src="https://myweb.ntut.edu.tw/~t105590029/pages/VisualNovelTest/JSONEditor/js/VisualNovelJSONEditor.js"></script>
	<link type="text/css" rel="stylesheet" href="https://myweb.ntut.edu.tw/~t105590029/pages/VisualNovelTest/JSONEditor/css/VisualNovelJSONEditor.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://myweb.ntut.edu.tw/~t105590029/pages/VisualNovelTest/js/VisualNovel.js"></script>
	<link rel="stylesheet" type="text/css" href="https://myweb.ntut.edu.tw/~t105590029/pages/VisualNovelTest/css/VisualNovel.css" />
	<style>
        .btn {
            width: 25px;
            text-align: center;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.63);
            text-shadow: 0 0 3px white,0 0 5px white,0 0 4px white;
        }

        #lrcinput {
            width: 100%;
            min-height: 400px;
			text-align:left;
        }

        #sign1, #sign2 {
            width: unset;
        }

    </style>
</head>
<body>
	<textarea id="lrcinput" onclick=""></textarea>
	<span class="btn" onclick="document.getElementById('display').innerHTML = parse(document.getElementById('lrcinput').value); ">input</span>
	<span class="btn" onclick='function copyToClipboard(str) {
            var txtnode = document.createElement("input"); txtnode.value = str; document.body.appendChild(txtnode); txtnode.select(); document.execCommand("copy"); txtnode.remove(); } copyToClipboard(document.getElementById("display").innerHTML);'>
		copy
	</span> 
    <span class="btn" onclick='preview();'>
		preview
    </span>
	<a href="https://myweb.ntut.edu.tw/~t105590029/pages/VisualNovelTest/JSONEditor/help.html" target="_black">help?</a>
	<div class="visualNovel" data-content=""></div>
	<div id="display"></div>
</body>
</html>
