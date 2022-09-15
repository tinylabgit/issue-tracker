<?php
    $id=$_POST['num'];
    if($_SESSION['login']=='true' and $_SESSION['username']=='nawega'){
    if(isset($_POST['title'])){
        $_POST['issue']=str_replace('}','\\}',str_replace('{','\\{',str_replace('"','\\"',$_POST['issue'])));
        $_POST['title']=str_replace('}','\\}',str_replace('{','\\{',str_replace('"','\\"',$_POST['title'])));
        $issuedata['issue'][$id]['title']=$_POST['title'];
        $issuedata['issue'][$id]['body']=$_POST['issue'];
        if($_POST['status']=='none'){
            if(isset($issuedata['issue'][$id]['status'])){
                unset($issuedata['issue'][$id]['status']);
            }
        }
        elseif($_POST['status']=='planned'){
            $issuedata['issue'][$id]['status']['status']='planned';
            $issuedata['issue'][$id]['status']['by']=$_SESSION['username'];
        }
        elseif($_POST['status']=='declined'){
            $issuedata['issue'][$id]['status']['status']='declined';
            $issuedata['issue'][$id]['status']['by']=$_SESSION['username'];
        }
        elseif($_POST['status']=='completed'){
            $issuedata['issue'][$id]['status']['status']='completed';
            $issuedata['issue'][$id]['status']['by']=$_SESSION['username'];
        }
        $issue=json_encode($issuedata);
        $file=fopen($_SERVER['DOCUMENT_ROOT'].'/issuedata.json','w');
        fwrite($file,$issue);
        fclose($file);
        header('Location:/');
    }
    elseif(!isset($issuedata['issue'][$id])){
?>
Unknown Issue<br>
<a href="/">Unknown Issue</a>
<?php
    }
    else{
?>
<form method="post">
Title : <br><input type="text" value="<?php echo $issuedata['issue'][$id]['title'];?>" automcomplete="off" name="title"><br>
Issue : <br><textarea style="resize:none;width:600px;height:400px;font-family:sans-serif;" name="issue"><?php echo $issuedata['issue'][$id]['body'];?></textarea><br>
<input type="hidden" name="num" value="<?php echo $_POST['num'];?>">
Status : <select name="status">
<?php if($issuedata['issue'][$id]['status']['status']=='planned'){
?>
<option value="none">NONE</option>
<option value="planned" selected>PLANNED</option>
<option value="completed">COMPLETED</option>
<option value="declined">DECLINED</option>
</select>
<?php }elseif($issuedata['issue'][$id]['status']['status']=='completed'){
?>
<option value="none">NONE</option>
<option value="planned">PLANNED</option>
<option value="completed" selected>COMPLETED</option>
<option value="declined">DECLINED</option>
</select>
<?php }elseif($issuedata['issue'][$id]['status']['status']=='declined'){
?>
<option value="none">NONE</option>
<option value="planned">PLANNED</option>
<option value="completed">COMPLETED</option>
<option value="declined" selected>DECLINED</option>
</select>
<?php }else{
?>
<option value="none" selected>NONE</option>
<option value="planned">PLANNED</option>
<option value="completed">COMPLETED</option>
<option value="declined">DECLINED</option>
</select>
<?php }?>
<br><button type="submit">Save</button>
</form>
<?php
    }}
    else{
        header('Location:/member/login');
    }
    include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');