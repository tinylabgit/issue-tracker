<?php
    if(!session_id()){
        session_name('session_id');
        session_start();
    }
    $issuedataf=fopen($_SERVER['DOCUMENT_ROOT'].'/issuedata.json','a+');
    $issuedata=fgets($issuedataf);
    fclose($issuedataf);
    $issuedata=json_decode($issuedata,true);
    if(!isset($_SESSION['login'])){
        $_SESSION['login']='false';
    }
    if($_SESSION['login']=='true'){
        $user=$issuedata['user'][$_SESSION['username']];
    }
    $no_cache=hash('sha256',$_SERVER['REQUEST_TIME']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/static/img/favicon.svg?t=<?php echo $no_cache;?>" sizes="any" type="image/svg+xml">
<link rel="stylesheet" href="/static/css/4ab25d56d2f718602f49e4e776021cd0948960bba62c648015b700718254db8a.css?t=<?php echo $no_cache;?>">
<?php if($_SESSION['login']=='true'){?>
<script async defer src="/static/js/29daa80e0057095e62ebf10cf1710e8844d481796ab93ae04f74be474358a8a3.js?t=<?php echo $no_cache;?>" type="text/javascript"></script>
<?php }?>
</head>
<body>
<div class="toolbar">
<a class="brand" href="/"><img src="/static/img/favicon.svg?t=<?php echo $no_cache;?>" title="N Issue" alt="N Issue" class="logo"></a>
<?php if($_SESSION['login']=='true'){
?>
<a href="/issues/new">Create New</a>
<div class="user-dropdown">
<img class="user" src="https://secure.gravatar.com/avatar/<?php echo hash('md5',$user['email']);?>?d=retro" style="height:40px;">
<div class="user-dropdown-menu" style="display:none;">
<?php echo $user['id']?><br><hr>
<a class="user-dropdown-item" href="/member/mypage">Mypage</a><br>
<a class="user-dropdown-item" href="/member/logout">Logout</a>
</div>
<?php
}
else{
?>
<a class="login" href="/member/login">Login</a>
<?php
}?>
</div></div>
<div id="app">