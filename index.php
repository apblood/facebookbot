<?php

$access_token = 'EAAb8FMoYCnABAK94BCBrZCCOFhMkeA80ZAEAWBKql5IqRjiKHiqZB5NCasiDkSCsSWBrzZCplv3ykktlc0zKIcAGTrU27G3lGb0albCSJZCCEU3hyMScMm67ScYzQ6GedH6ISyT93LIaSZAo7uLZCNL2kvVpZCvEENqf2ntUH2a6JAZDZD';

if (isset($_GET['hub_verify_token'])) {
    if ($_GET[''hub_verify_token']===$access_token) {
        echo $_GET['hub_challenge'];
        return;
    }
    else {
        echo 'Invalid Verify Token';
        return;
    }
}
