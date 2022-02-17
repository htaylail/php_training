<?php
// top pyramid
$maxCount = 6;
echo "<pre>";
for ($row = 1; $row < $maxCount; $row++) {
    for ($col = $row; $col < $maxCount; $col++) {
        echo "  &emsp;";
    }
    for ($col = (2 * $row - 1); $col > 0; $col--) {
        echo " * ";
    }
    echo "<br><br>";
}

// bottom pyramid
$totalCount = 6;
$maxRow = 6;
for ($row = $maxRow; $row > 0; $row--) {
    for ($col = ($totalCount - $row); $col > 0; $col--) {
        echo "  &emsp;";
    }
    for ($col = (2 * $row - 1); $col > 0; $col--) {
        echo " * ";
    }
    echo "<br><br>";
}
echo "</pre>";
