                        // JavaScript Document
function appendFixedObject(Variable){
	switch(Variable.ID)
		{ 
		case "head":
		break;
		case "header":
		$(".drop-down-menu ").prepend('<li class="fixed nawanawa"><a>繩繩</a><ul><li><a data-hash="header=ReverseClass&content=ReverseClass&footer=index">翻轉教室</a></li><li><a data-hash="header=JPVoice&content=JPVoice&footer=index">艾爾之光日配</a></li><li><a data-hash="header=JPVoice&content=JPVoice&footer=index">所有作品</a></li><li><a data-hash="header=lyrics&content=lyrics&footer=index">Lyrics</a> </li><li> <a data-hash="header=index&content=AboutWeb&footer=index">關於這網站</a></li><li><a data-hash="header=index&content=NawaNawa&footer=index">關於繩繩</a></li></ul></li>');
		if (user.name!=null)
			{
			var hellostr;
                        if(user.level==999){hellostr = '恭候站長大人,' + user.name;}
                        else if(user.level>=0){hellostr = 'Hi,' + user.name;}
$(".drop-down-menu ").append('<li class="fixed account" style="float:right ;clear:right"><a>' + hellostr + '</a><ul><li><a class="savepage" href="php/member.php">會員</a></li><li><a class="savepage" href="php/update.php">修改</a></li><li><a class="savepage" href="php/logout.php">登出</a></li></ul></li>');
			}
			else
			{
				$(".drop-down-menu ").append('<li class="fixed account" style="float:right ;clear:right"><a>尚未登入</a><ul><li><a class="savepage" href="php/login.php">登入</a></li><li><a class="savepage" href="php/register.php">註冊</a></li></ul></li>');
			}
		
		if (Variable.Value != "index"){	$(".drop-down-menu > .fixed.nawanawa > ul > li:first").before('<li><a data-hash="header=index&content=index&footer=index">回首頁</a></li>');};
	
		break;
		case "content":
		break;
		case "footer":
		break; 
		
		}
	}                  