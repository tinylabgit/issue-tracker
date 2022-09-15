<?php
    include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
    if($_SESSION['login']=='true'){
        header('Location:/');
    }
?>
<script async defer src="https://www.google.com/recaptcha/api.js?render=6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv&t=<?php echo $no_cache;?>" type="text/javascript"></script>
<?php
    if(isset($_POST['id'])){
        $captcha=$_POST['g-recaptcha-response'];
        $secretKey = '6Le1TrEhAAAAAJB6av7oZhqLK2BIBXE2C1wIlV6y';
        $header=apache_request_headers();
        $ip=$header['CF-Connecting-IP'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $response=json_decode($response,true);
        if($response['success']=='1' and $response['score']>'0.6'){
        if(isset($_POST['pw'])){
            if(isset($issuedata['user'][$_POST['id']])){
?>
<h2>Register</h2><hr>
<span style="color:#ff6363">ID Already Exist.</span>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID"><br>
Email : <input type="email" name="email" placeholder="Enter Your Email"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Register</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'registerpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<?php
                }
                else{
                    $issuedata['user'][$_POST['id']]['id']=$_POST['id'];
                    $issuedata['user'][$_POST['id']]['pw']=password_hash($_POST['pw']);
                    $issuedata['user'][$_POST['id']]['email']=$_POST['email'];
                    $issuejson=json_encode($issuedata);
                    $file=fopen($_SERVER['DOCUMENT_ROOT'].'/issuedata.json','w');
                    fwrite($file,$issuejson);
                    fclose($file);
                    header('Location:/member/login');
                }
            }
        }
        else{
?>
<h2>Register</h2><hr>
<span style="color:#ff6363">You looks like robot.</span>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID"><br>
Email : <input type="email" name="email" placeholder="Enter Your Email"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Register</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'registerpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<?php
    }
    }
    else{
?>
<h2>Register</h2><hr>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID"><br>
Email : <input type="email" name="email" placeholder="Enter Your Email"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Register</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'registerpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<?php
    }
    include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');