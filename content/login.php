<?php

// Check user
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = htmlspecialchars($_POST['username']);
    $pwd = md5($_POST['password']);
    $userError = null;
    $pwdError = null;

    $res = output_from_database('SELECT user,pwd,role FROM user WHERE user =?', "$user");
    
    // Check role of user
    if ($res['user'] === $user && $res['pwd'] === $pwd) {
        $_SESSION['login'] = 'logged_in';
        $_SESSION['role'] = $res['role'];
        header('Location: ?q=start');
    } else {
        $errorClass = 'errorfield';
    }
}

?>
        <!-- Heading -->
        <div class="row">
            <h1 class="text-center empty-row-after"><?=LOGIN_TITLE;?> <small><?=CREATE_PAPER_SUB_TITLE;?></small></h1>
        </div>
        <form class="form-signin" method="post">
            <label for="username" class="sr-only"><?=USERNAME.MANDATORY;?></label>
            <input type="text" name="username" class="form-control <?=$errorClass;?>" placeholder="<?=USERNAME.MANDATORY;?>" />
            <label for="password" class="sr-only"><?=PASSWORD.MANDATORY;?></label>
            <input type="text" name="password" class="form-control empty-row-after <?=$errorClass;?>" placeholder="<?=PASSWORD.MANDATORY;?>">
            <!-- Buttons -->
            <div class="form-group text-center">
                <button class="btn btn-lg btn-success" type="submit"><?=BUTTON_LOGIN;?></button>
                <a class="btn btn-lg btn-default" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
            </div>
      </form>