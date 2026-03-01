<?php
function formExtract($assessmentslink)
{
    //echo $assessmentslink . "\n";
    //echo strpos($assessmentslink, "&formname") . "\n";
    $piece = substr($assessmentslink, strpos($assessmentslink, "&formname"));
    //echo $piece . "\n";
    $pos = strpos($piece, "=");
    //echo $pos . "\n";
    $formname = substr($piece, $pos + 1);
    //echo $formname;
    return $formname;

}
?>