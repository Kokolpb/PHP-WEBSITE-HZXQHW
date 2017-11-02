<?php
//页脚
$strSQL = "select content from layout  where id_layout='1'" ;
$objDB->Execute($strSQL);
$footer_BQ=$objDB->fields();
?>
<div id="footer">
<?=$footer_BQ[content];?>
</div>
<div id="footer_20hight"></div>
<SCRIPT LANGUAGE="JavaScript" src=http://float2006.tq.cn/floatcard?adminid=9347536&sort=0 ></SCRIPT>

