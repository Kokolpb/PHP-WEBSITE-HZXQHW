<?php
//案例二级目录
$strSQL = "select id_newsdir,name from newsdir where level=2 and dele=1 and fatherid=10 order by ordernum asc " ;
$objDB->Execute($strSQL);
$casedir2=$objDB->GetRows();

?>

<div id="content_aboutlefttitle">会议礼品</div><!--end content_aboutlefttitle!-->
<div id="content_aboutleftmenu">
<ul>
<?php for($i=0;$i<sizeof($casedir2);$i++){?>
<li><a href="/gift/gift.php?ndir=<?=$casedir2[$i][id_newsdir];?>" class="link_aboutnavi"><?=$casedir2[$i][name];?></a></li>
<?php }?>
</ul>
</div><!--end content_aboutleftmenu!-->

