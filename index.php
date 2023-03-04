<?php
$mysqli = mysqli_connect("localhost", "root", "root", "shorturl");
$link = htmlspecialchars($_POST['link']);
if(empty($_POST['submit'])){}
if(empty($_POST['link'])){}
else{
    $query = ("SELECT * FROM `short` WHERE `url` = '".$link."'");
    $result = mysqli_query($mysqli, $query);
    if($select){
        $result = [
            'url'  => $select['url'],
            'key'  => $select['token'],
            'link' => 'http://'.$_SERVER['HTTP_HOST'].'/-'.$select['token']
        ];
        print_r($result);
    }
    else{
        
        $letters='qwertyuiopasdfghjklzxcvbnm1234567890';
        $count=strlen($letters);
        $intval=time();
        $result='';
        for($i=0;$i<4;$i++) {
            $last=$intval%$count;
            $intval=($intval-$last)/$count;
            $result.=$letters[$last];
        }
     
        mysqli_query("INSERT INTO `short` (`id`, `url`, `token`) VALUES (NULL, '".$link."', '".$result.$intval."') ");
        $query = ("SELECT * FROM `short` WHERE `url` = '".$link."'");
        $result = mysqli_query($mysqli, $query);
        $result = [
            'url'  => $select['url'],
            'key'  => $select['token'],
            'link' => 'http://'.$_SERVER['HTTP_HOST'].'/q/'.$select['token']
        ];
        print_r($result);
    }
}

?>
<form method="post" action="">
    <input type="text" name="link">
    <input type="submit" name="submit">
</form>
