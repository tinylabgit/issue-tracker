<?php
    include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
    $id=$_GET['id'];
    if($id=='new'){
        include($_SERVER['DOCUMENT_ROOT'].'/issues/new.php');exit;
    }
    if($id=='edit'){
        include($_SERVER['DOCUMENT_ROOT'].'/issues/edit.php');exit;
    }
    if(!isset($issuedata['issue'][$id])){
?>
Unknown Issue!<br>
<a href="/">Back Home</a>
<?php
    }
    else{
?>
        <h2>Issues</h2><hr>
<?php
        if($_SESSION['username']=='nawega'){
?>
<form method="post" action="/issues/edit" style=display:inline;">
<input type="hidden" name="num" value="<?php echo $id;?>">
<button type="submit" style=display:inline;">Edit</button>
<?php
        }
?>
<h4><?php echo $issuedata['issue'][$id]['title'];?></h4>
<p style="font-size:12px;"><?php echo str_replace('
','<br>',$issuedata['issue'][$id]['body']);?></p>
<?php if($issuedata['issue'][$id]['status']['status']=='planned'){
?>
<div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issuedata['issue'][$id]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issuedata['issue'][$id]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issuedata['issue'][$id]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issuedata['issue'][$id]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issuedata['issue'][$id]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }
    }
    include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');