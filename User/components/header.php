<?php
while ($headerInfo = $res->fetch_assoc()) {
    $headerText = base64_decode($headerInfo['headerText']);
    $belowHeaderText = base64_decode($headerInfo['belowHeaderText']);
}
