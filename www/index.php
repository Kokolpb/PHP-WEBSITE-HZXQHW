<?php
require "./inc/config.php";
require "./inc/function.class.php";


//公司简介
$strSQL = "select content from pageset where id_pageset='1'" ;
$objDB->Execute($strSQL);
$about=$objDB->fields();

//公司简介 图片
$strSQL = "select opicname as pic from pagesetpic where id_pageset='1'" ;
$objDB->Execute($strSQL);
$aboutpic=$objDB->fields();


//视频
$strSQL = "select intro from layout where id_layout='12'" ;
$objDB->Execute($strSQL);
$video_addr=$objDB->fields();

//首页滚动小图
$strSQL = "select a.id_newsinfo,b.opicname as pic from newsinfo as a left join newspic as b on a.id_newsinfo=b.id_newsinfo where a.id_newsdir='5' and a.dele='1' and a.lang='1' order by a.id_newsinfo desc limit 10" ;
$objDB->Execute($strSQL);
$arrallpic=$objDB->getrows();


//最新文章

$strSQL = "select a.intro,a.id_newsinfo,c.opicname as pic from newsinfo as a 
           left join newsdir as b on a.id_newsdir=b.id_newsdir 
		   left join newspic as c on a.id_newsinfo =c.id_newsinfo  
		   where a.dele=1 and b.fatherid=1 order by a.id_newsinfo desc limit 1" ;
$objDB->Execute($strSQL);
$newshot=$objDB->fields();

//最新4文章

$strSQL = "select a.title,a.id_newsinfo,a.indate  from newsinfo as a 
           left join newsdir as b on a.id_newsdir=b.id_newsdir 
		   where a.dele=1 and b.fatherid=1 order by a.id_newsinfo desc limit 4" ;
$objDB->Execute($strSQL);
$newsall=$objDB->getrows();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<link href="inc/css/css1.css" rel="stylesheet" type="text/css">
<link href="inc/css/homeslidenotext.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="inc/js/stmenu.js"></script>
<script src="/inc/js/jquery.min.js"></script>
<script src="/inc/js/jquery.easing.1.3.js"></script>
<script src="/inc/js/slides.min.jquery.js"></script>
<script src="inc/js/jcarousellite_1.0.1.pack.js" type="text/javascript"></script>

<script type="text/javascript">
   $(document).ready(function(){
    $("#main_slideprodbox").jCarouselLite({
     auto: 3000,scroll: 1,speed: 300,visible:6
    }); 
   });
</script>

<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: '/inc/pics/loading.gif',
				play: 5000,
				pause: 2500,
				effect: 'fade, fade',
				hoverPause: true
			});
		});
</script>



<?php if($setinfo[iscopy]=='1'){?>
<script language="JavaScript">
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");
</script>
<?php }?>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
</head>
<body>
<?php require "header.php";?>
<div id="mainadv">

	<div id="container">
       <?php require "mainadv.php";?>
	</div><!--end container!-->
</div>

<div id="maincontent">
<div id="main_ctop1">
<div id="main_ctop1title"><img src="inc/pics/homecompany.gif" border="0" usemap="#Map" />
  <map name="Map" id="Map">
    <area shape="rect" coords="299,11,337,32" href="/about/about.php" />
  </map>
</div>
<div id="main_ctop1txt"><img src="upload/layout/<?=$aboutpic[pic];?>" /><?=cutstr($about[content],470,1);?></div>
</div><!--end main_ctop1!-->
<div id="main_ctop2">
<div id="main_ctop2title"><img src="inc/pics/homecompany1.gif" border="0" usemap="#Map2" />
  <map name="Map2" id="Map2">
    <area shape="rect" coords="294,13,335,29" href="/news/news.php" />
  </map>
</div>
<div id="main_ctop2txt"><img src="/upload/news/<?=$newshot[pic]?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$newshot[intro]?></div>
<div style="padding:0px; margin-top:10px;margin-left:10px; width:320px;">
<ul class="newslist_time">
<? for($i=0;$i<sizeof($newsall);$i++){?>
<li class="newslist_time"><div class="time"><?=substr($newsall[$i][indate],0,10)?></div><a href="/news/newspage.php?newsid=<?=$newsall[$i][id_newsinfo]?>" target="_self" class="newslist_time"   ><?=cutstr($newsall[$i][title],40,0)?> </a></li>
<? }?>
</ul>
</div>
</div><!--end main_ctop2!-->
<div id="main_ctop3">
<div id="main_ctop3title"><img src="inc/pics/homevideo.gif" border="0" usemap="#Map3" />
  <map name="Map3" id="Map3">
    <area shape="rect" coords="186,13,229,31" href="/about/video.php" />
  </map>
</div>
		<div id="flash">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 

codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29

,0" width="100%" height="90%"> 
				<param name="movie" 

value="<?=$video_addr[intro]?>"> 
				<param name="quality" value="high"> 
                <param name="wmode" value="Opaque">
				<embed 

src="<?=$video_addr[intro]?>" quality="high" 

pluginspage="http://www.macromedia.com/go/getflashplayer";; type="application/x-shockwave-

flash" width="100%" height="90%"> 
				</embed> 
			</object>
		</div>
<div id="main_ctop3title2"><a href="javascript:void(0)"  onclick="needsendmail();"  style="cursor:pointer"><img src="inc/pics/feedback.gif" border="0" /></a></div>
</div><!--end main_ctop3!-->

<div id="main_slideprod">
<div id="main_slideprodbox">
<ul>
<? for($i=0;$i<sizeof($arrallpic);$i++){?>
<li><a href="/case/caseinfo.php?cid=<?=$arrallpic[$i][id_newsinfo]?>"><img src="/upload/news/<?=$arrallpic[$i][pic]?>" width="155" border="0"  /></a></li>
<? }?>
</ul>
</div>
</div><!--end main_slideprod!-->

</div><!--end maincontent!-->

<?php require "footer.php";?>

</body>
</html>
