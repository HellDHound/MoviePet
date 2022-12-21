<div>

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Register</h4>
                <div class="login-form">
                    <form action="/registration/register" method="post">
                        <input type="text" name="register[name]" placeholder="Name" value="<?=!empty($_POST['register']['name']) ? $_POST['register']['name'] : ''?>" required="">
                        <input type="email" name="register[email]" placeholder="E-mail" value="<?=!empty($_POST['register']['email']) ? $_POST['register']['email'] : ''?>" required="">
                        <input type="password" name="register[password]" id="passwordPage" placeholder="Password" required="">
                        <input type="password" name="register[confirm password]" id="confirmPasswordPage" placeholder="Confirm Password" required="" >
                        <div class="signin-rit">
														<span class="agree-checkbox">
														<label class="checkbox"><input type="checkbox" name="register[checkbox_agreement]" required="">I agree to your <a class="w3layouts-t" href="#" target="_blank">Terms of Use</a> and <a class="w3layouts-t" href="#" target="_blank">Privacy Policy</a></label>
													</span>
                        </div>
                        <div class="tp">
                            <input type="submit" id="submitPage" value="REGISTER NOW">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var inputConfirmPage = document.getElementById('confirmPasswordPage');
    var inputMainPasswordPage = document.getElementById('passwordPage');

    inputConfirmPage.addEventListener('input', function()
    {
        console.log(inputConfirmPage.value);
        console.log(inputMainPasswordPage.value);
        if (inputConfirmPage.value != inputMainPasswordPage.value){
            inputConfirmPage.style.outline = "thick solid #ff0000";
            document.getElementById('submitPage').disabled = true;
        }else{
            inputConfirmPage.style.outline = "none";
            document.getElementById('submitPage').disabled = false;
        }
    });
</script>