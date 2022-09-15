<?php
    if(empty($_GET['from']) and $_GET['from']!='0'){
        header('HTTP/2.0 400 Bad Request');
?>
Fill 'from' query string and submit again.
<?php
    }
    else{
        $issuedata=fopen($_SERVER['DOCUMENT_ROOT'].'/issuedata.json','a+');
        $issuedata=fgets($issuedata);
        $issuedata=json_decode($issuedata,true);
        $issue=$issuedata['issue'];
        $a=$_GET['from'];
?>
<a class="issue-heading" href="issues/<?php echo $issue[$a]['index'];?>"><h3><?php echo $issue[$a]['title'];?></h3></a>
<span class="issue"><?php echo substr($issue[$a]['body'],0,100);?></span>
<?php if($issue[$a]['status']['status']=='planned'){
?>
<div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issue[$a]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issue[$a]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issue[$a]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }
?><a class="issue-heading" href="issues/<?php echo $issue[$a+1]['index'];?>"><h3><?php echo $issue[$a+1]['title'];?></h3></a><span class="issue"><?php echo substr($issue[$a+1]['body'],0,100);?></span>
<?php if($issue[$a+1]['status']['status']=='planned'){
?>    <div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issue[$a+1]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+1]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issue[$a+1]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+1]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issue[$a+1]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }
?><a class="issue-heading" href="issues/<?php echo $issue[$a+2]['index'];?>"><h3><?php echo $issue[$a+2]['title'];?></h3></a><span class="issue"><?php echo substr($issue[$a+2]['body'],0,100);?></span>
<?php if($issue[$a+2]['status']['status']=='planned'){
?>    <div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issue[$a+2]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+2]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issue[$a+2]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+2]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issue[$a+2]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }
?>
<a class="issue-heading" href="issues/<?php echo $issue[$a+3]['index'];?>"><h3><?php echo $issue[$a+3]['title'];?></h3></a><span class="issue"><?php echo substr($issue[$a+3]['body'],4,100);?></span>
<?php if($issue[$a+3]['status']['status']=='planned'){
?>    <div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issue[$a+3]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+3]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issue[$a+3]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+3]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issue[$a+3]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }
?><a class="issue-heading" href="issues/<?php echo $issue[$a+4]['index'];?>"><h3><?php echo $issue[$a+4]['title'];?></h3></a><span class="issue"><?php echo substr($issue[$a+4]['body'],4,100);?></span>
<?php if($issue[$a+4]['status']['status']=='planned'){
?>    <div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issue[$a+4]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+4]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issue[$a+4]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+4]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issue[$a+4]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }
?><a class="issue-heading" href="issues/<?php echo $issue[$a+5]['index'];?>"><h3><?php echo $issue[$a+5]['title'];?></h3></a><span class="issue"><?php echo substr($issue[$a+5]['body'],4,100);?></span>
<?php if($issue[$a+5]['status']['status']=='planned'){
?>    <div class="issue-status"><span status-label="planned">PLANNED</span> by <span class="admin"><?php echo $issue[$a+5]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+5]['status']['status']=='completed'){
?>    <div class="issue-status"><span status-label="completed">COMPLETED</span> by <span class="admin"><?php echo $issue[$a+5]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }elseif($issue[$a+5]['status']['status']=='declined'){
?>    <div class="issue-status"><span status-label="declined">DECLINED</span> by <span class="admin"><?php echo $issue[$a+5]['status']['by'];?></span><img class="admin-image" src="/static/img/admin.svg"></div>
<?php }}?>