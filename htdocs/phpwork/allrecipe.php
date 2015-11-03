<?php
	// grab all recipie URL's from freerecipes.org
$fp=fopen("urllist.txt","w+");
$mainurl="http://www.freerecipes.org/roasted-vegetable-couscous-moroccan-style/";
$nexurl="";
$urlcount=0;
$recipeArray=array();
$recipeArray[] = $mainurl;

function geturlinfo($URLtoget)
{
GLOBAL $recipeArray;
GLOBAL $urlcount;
GLOBAL $fp;
$thispage=file_get_contents($URLtoget);
$pagearray=explode("\n",$thispage);
$pagesize=sizeof($pagearray);
$startpos=26;
$endpos=0;
for ($i=0; $i<$pagesize ; $i++){
	$nextpos=strpos($pagearray[$i],"Next post:");
	if ($nextpos>0) {
		$stripped=strip_tags($pagearray[$i],'<a>');
		$endpos=strpos($stripped,'">')-$startpos;
		$recipeurl=substr($stripped,$startpos,$endpos);
		$recipeArray[$urlcount]=$recipeurl;
                fwrite($fp,"$recipeurl \n");
	}
}
$urlcount++;
$arraylast=sizeof($recipeArray)-1;
if (isset($recipeArray[$arraylast])) {
	geturlinfo($recipeArray[$arraylast]);
}
return;
}

geturlinfo($mainurl);
fclose($fp);
?>
