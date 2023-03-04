<?php
$mysqli = mysqli_connect("localhost", "root", "root", "shorturl");
$key = htmlspecialchars($_GET['token']);
if(empty($_GET['token'])){}
else{
    $query = ("SELECT * FROM `short` WHERE `url` = '".$link."'");
    $result = mysqli_query($mysqli, $query);
    if($select){
        $result = [
            'url' => $select['url'],
            'key' => $select['token']
        ];
        header('location: '.$result['url']);
    }
}
?>