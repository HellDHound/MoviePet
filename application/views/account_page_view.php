<div>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Сменить пароль</h4>
                <div class="login-form">
                    <form action="/registration/change_password" method="post">
                        <input type="password" name="change[password]" id="passwordPage" placeholder="Old Password" required="">
                        <input type="password" name="change[confirmPassword]" id="confirmPasswordPage" placeholder="Confirm Old Password" required="" >
                        <input type="password" name="change[newPassword]" id="confirmNewPasswordPage" placeholder="New Password" required="" >
                        <div class="tp">
                            <input type="submit" value="Сменить пароль">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>