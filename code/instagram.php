<?php

$account = $_GET['account'];

$html = file_get_contents('https://instagram.com/'.$account);
preg_match('/_sharedData = ({.*);<\/script>/', $html, $matches);
$profile_data = json_decode($matches[1])->entry_data->ProfilePage[0]->graphql->user;
echo json_encode([
    'picture' => $profile_data->profile_pic_url_hd,
    'full_name' => $profile_data->full_name
]);