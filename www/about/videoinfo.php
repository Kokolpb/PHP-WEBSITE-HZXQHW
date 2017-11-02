<?php
require "../inc/config.php";
require "../inc/function.class.php";

//产品视频
$strSQL = "select title,content,intro,url from newsinfo where id_newsinfo=$_GET[vid]" ;
$objDB->Execute($strSQL);
$videoinfo_ny=$objDB->fields();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<link href="../inc/css/css1.css" rel="stylesheet" type="text/css">
<link href="/inc/css/homeslidenotext.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/inc/js/stmenu.js"></script>
<script src="/inc/js/jquery.min.js"></script>
<script src="/inc/js/jquery.easing.1.3.js"></script>
<script src="/inc/js/slides.min.jquery.js"></script>
<script src="/inc/js/jcarousellite_1.0.1.pack.js" type="text/javascript"></script>

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
<?php require "../header.php";?>
<div id="mainadv">

	<div id="container">
       <?php require "../mainadv.php";?>
	</div><!--end container!-->
</div><!--end mainadv!-->
<div id="content_about">
<div id="content_aboutleft">
<?php require "left.php";?>
</div><!--end content_aboutleft!-->

<div id="content_aboutright">

<div id="content_aboutrighttitle">
<div id="content_aboutrighttitle1">公司视频</div>
<div id="about_navi">您现在的位置：<A href="/">杭州鑫桥会展</A> &gt; 公司视频</div>
</div><!--end content_aboutrighttitle!-->

<div id="content_aboutrightcont">

<div id="videolistinfo">

<div id="videotitle_txt"><?php echo $videoinfo_ny[title];?></div>
<embed src="<?=$videoinfo_ny[url];?>" quality="high" width="480" height="400" align="middle" allowScriptAccess="sameDomain" allowFullscreen="true" type="application/x-shockwave-flash"></embed>
<div id="videocontent_txt"><?php echo $videoinfo_ny[content];?></div>

</div><!--end videolist!-->


</div><!--end content_aboutrightcont!-->
</div><!--end content_aboutright!-->
<DIV style="clear:both;"></DIV> 
</div><!--end content_about!-->
<?php require "../footer.php";?>
</body>
</html>
