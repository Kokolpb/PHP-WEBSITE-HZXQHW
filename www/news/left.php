<?php
//新闻二级目录
$strSQL = "select id_newsdir,name from newsdir where fatherid=1 and dele=1  " ;
$objDB->Execute($strSQL);
$newsdir2=$objDB->GetRows();

?>
<div id="content_aboutlefttitle">新闻分类</div><!--end content_aboutlefttitle!-->
<div id="content_aboutleftmenu">
<ul>
<?php for($i=0;$i<sizeof($newsdir2);$i++){?>
<li><a href="/news/news.php?ndir=<?=$newsdir2[$i][id_newsdir]?>" class="link_aboutnavi"><?=$newsdir2[$i][name]?></a></li>
<?php }?>
</ul>
</div><!--end content_aboutleftmenu!-->

