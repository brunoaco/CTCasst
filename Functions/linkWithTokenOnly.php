<?php
function linkWithTokenOnly($assessmentslink, $token)
{
    $link = str_replace(".php", "", formExtract($assessmentslink));

    if (empty($assessmentslink)) {
        //echo "assessmentslinkX is empty\n";
        return "";
    } else {

        if (str_contains($assessmentslink, "&formname")) {
            $assessmentslink1 = substr($assessmentslink, 0, strpos($assessmentslink, "&formname"));
        }

        $newLink = str_replace("xyz", $token, $assessmentslink1);
        //echo "new link ::" . $newLink . "\n";
        return "<a href=\"" . $newLink . "\">  assessment link:" . $link . " </a><br>\n";
    }

}
?>