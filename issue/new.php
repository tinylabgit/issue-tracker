<?php
    if($_SESSION['login']=='false'){
        header('Location:/member/login');
    }
?>
<script async defer src="https://www.google.com/recaptcha/api.js?render=6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv&t=<?php echo $no_cache;?>" type="text/javascript"></script>
<?php
    if(isset($_POST['title'])){
        $captcha=$_POST['g-recaptcha-response'];
        $secretKey = '6Le1TrEhAAAAAJB6av7oZhqLK2BIBXE2C1wIlV6y';
        $header=apache_request_headers();
        $ip=$header['CF-Connecting-IP'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $response=json_decode($response,true);
        if($response['success']=='1' and $response['score']>'0.6'){
            $issue=str_replace('}','\\}',str_replace('{','\\{',str_replace('"','\\"',$_POST['issue'])));
            $title=str_replace('}','\\}',str_replace('{','\\{',str_replace('"','\\"',$_POST['title'])));
            $index=count($issuedata['issue'])+1;
            $issuedata['issue'][]=array('index'=>$index,'title'=>$title,'body'=>$issue);
            $issuejson=json_encode($issuedata);
            $file=fopen($_SERVER['DOCUMENT_ROOT'].'/issuedata.json','w');
            fwrite($file,$issuejson);
            fclose($file);
            header('Location:/');
        }
    }
    else{
?>
<form method="post">
<h2>New Issue</h2><hr>
Title : <br><input type="text" name="title" autocomplete="off"><br>
Issue : <br><textarea style="resize:none;width:600px;height:400px;font-family:sans-serif;" name="issue"></textarea><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'issuepage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
<button type="submit">Submit New Issue</button>
<?php
    }
    include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');