<div class="alert"></div>

<div class="body__container__form__home">
    <div class="container__form">
        <form class="form__data" method="POST" id="form">
            <fieldset>
                <legend>Login for admin</legend>
                <div class="data__fields">
                    <?php if(isset($messageError)){?>
                    <p class="php__form__error"> <?php echo $messageError; ?></p>
                    <?php } ?>
                    <div class="fields">
                        <label for="user">User</label>
                        <input type="text" name="user" id="user" placeholder="Enter user name">
                    </div>
                    <div class="fields">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" />
                    </div>
                    <a class="btn__link" href="signup.php">Sign up</a>
                </div>
                <div class="btn__container">
                    <button class="btn__submit btn__save" type="submit" value="signin">Sign In</button>
                    <a class="btn__submit btn__cancel" href="<?php echo W_ROOT;?>">Home</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>