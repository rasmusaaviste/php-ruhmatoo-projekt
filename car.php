<?php

require("functions.php");
   
$cars=$Car->getWork($_GET["id"]);

?>

<h2>Sinu S�idukid</h2>
<?php

$html = "<table>";
$html .= "<tr>";
$html .= "<th>L�bis�it</th>";
$html .= "<th>Tehtud t��</th>";
$html .= "<th>T�� maksumus</th>";
$html .= "<th>Kommentaar</th>";
$html .= "</tr>";


foreach ($cars as $c) {
    $html .= "<tr>";
	$html .= "<td>".$c->Mileage."</td>";
	$html .= "<td>".$c->DoneJob."</td>";
	$html .= "<td>".$c->JobCost."</td>";
	$html .= "<td>".$c->Comment."</td>";
    $html .= "</tr>";
}
$html .= "</table>";
echo $html;

?>
<?php require ("footer.php");?>