<?php
//BANNER图
$strSQL = "select opicname from layoutpic  where id_layout='13' order by id_layoutpic asc" ;
$objDB->Execute($strSQL);
$Banner_QJ=$objDB->GetRows();
?>

			<div id="slides">
				<div class="slides_container">
                <?php for($i=0;$i<sizeof($Banner_QJ);$i++){?>
                <a href="javascript:void(0)"><img src="/upload/layout/<?=$Banner_QJ[$i][opicname];?>" alt="Slide <?=$i+1;?>"></a>
                <?php }?>
                </div>
			</div><!--end slides!-->
