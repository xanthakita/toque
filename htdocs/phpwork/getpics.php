<?php

$url = "http://www.freerecipes.org/roasted-vegetable-couscous-moroccan-style/";
$fh = fopen(basename($url), "wb");
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fh);
curl_exec($ch);
curl_close($ch);

?>