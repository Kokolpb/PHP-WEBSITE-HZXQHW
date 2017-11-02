<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/pagenav.class.php";

$arrParam[0][name]="ndir";
$arrParam[0][value]=$_GET[ndir];

if(!isset($_GET[ndir]) || $_GET[ndir]==''){
$intRows = 12;
$strSQLNum = "SELECT COUNT(*) as num from newsinfo as a left join newspic as b on a.id_newsinfo=b.id_newsinfo where a.id_newsdir='20' and a.dele='1' and a.lang='1' order by a.id_newsinfo desc";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select a.id_newsinfo,a.title,a.content,a.intro,b.opicname from newsinfo as a left join newspic as b on a.id_newsinfo=b.id_newsinfo where a.id_newsdir='20' and a.dele='1' and a.lang='1' order by a.id_newsinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$hotel_ny=$objDB->GetRows();

}elseif(isset($_GET[ndir])){



$intRows = 12;
$strSQLNum = "SELECT COUNT(*) as num from newsinfo  where id_newsdir='".$_GET[ndir]."'  and dele=1";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select a.id_newsinfo,a.title,a.content,a.intro,b.opicname from newsinfo as a left join newspic as b on a.id_newsinfo=b.id_newsinfo where a.dele='1' and a.id_newsdir='".$_GET[ndir]."' order by a.id_newsdir desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$hotel_ny=$objDB->GetRows();

}


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
<div id="content_aboutrighttitle1">旅游考察</div>
<div id="about_navi">您现在的位置：<A href="/">杭州鑫桥会展</A> &gt; 旅游考察</div>
</div><!--end content_aboutrighttitle!-->

<div id="content_aboutrightcont">
<?php for($i=0;$i<sizeof($hotel_ny);$i++){  ?>
<div id="caselist">
  <a href="travelinfo.php?nid=<?php echo $hotel_ny[$i][id_newsinfo]?>"><img src="/upload/news/<?php echo $hotel_ny[$i][opicname];?>" width="160" height="150" /></a>
  <h1><a href="travelinfo.php?nid=<?php echo $hotel_ny[$i][id_newsinfo]?>"><?php echo $hotel_ny[$i][title];?></a></h1>
</div><!--end caselist!-->
<?php }?>
<div id="case_navi"><?php echo $strNavigate;?></div>
</div><!--end content_aboutrightcont!-->
</div><!--end content_aboutright!-->
<DIV style="clear:both;"></DIV> 
</div><!--end content_about!-->
<?php require "../footer.php";?>
</body>
</html>
