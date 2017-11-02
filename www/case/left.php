<?php
//案例二级目录
$strSQL = "select id_newsdir,name from newsdir where level=2 and dele=1 and fatherid=4 order by ordernum asc " ;
$objDB->Execute($strSQL);
$casedir2=$objDB->GetRows();

?>

<div id="content_aboutlefttitle">成功案例</div><!--end content_aboutlefttitle!-->
<div id="content_aboutleftmenu">
<ul>
<?php for($i=0;$i<sizeof($casedir2);$i++){?>
<li><a href="/case/case.php" class="link_aboutnavi"><?=$casedir2[$i][name];?></a></li>
<?php }?>
</ul>
</div><!--end content_aboutleftmenu!-->

