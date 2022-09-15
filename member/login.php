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
                if(password_verify($_POST['pw'],$issuedata['user'][$_POST['id']]['pw'])){
                    $_SESSION['login']='true';
                    $_SESSION['username']=$_POST['id'];
                    header('Location:/');
                }
                else{
?>
<h2>Login</h2><hr>
<span style="color:#ff6363">Wrong Information.</span>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Login</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'loginpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<a href="/member/register">Create Account</a>
<?php
                }
            }
        }
        else{
?>
<h2>Login</h2><hr>
<span style="color:#ff6363">Wrong Information.</span>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID" autocomplete="off"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password" autocomplete="off"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Login</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'loginpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<a href="/member/register">Create Account</a>
<?php
        }}else{
?>
<h2>Login</h2><hr>
<span style="color:#ff6363">You looks like robot.</span>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID" autocomplete="off"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password" autocomplete="off"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Login</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'loginpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<a href="/member/register">Create Account</a>
<?php
        }
    }
    else{
?>
<h2>Login</h2><hr>
<form method="post">
ID : <input type="text" name="id" placeholder="Enter Your ID"><br>
Password : <input type="password" name="pw" placeholder="Enter Your Password"><br><br>
<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
<button type="submit" name="submit">Login</button>
<script type="text/javascript">
grecaptcha.ready(function() {
grecaptcha.execute('6Le1TrEhAAAAAFsO0wRJsgK4woY9AcnoOdFa5Ekv', {action: 'loginpage'})
.then(function(token) {
document.getElementById('g-recaptcha-response').value=token;
});
});
</script>
</form>
<a href="/member/register">Create Account</a>
<?php
    }
    include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');