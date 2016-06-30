<?php
// Check user
if (isset($_POST['user']) && isset($_POST['pwd'])) {
    $user = htmlspecialchars($_POST['user']);
    $pwd = md5($_POST['pwd']);
    // Fetch all data from database
    $data = output_from_database('SELECT * FROM user WHERE name =?', "$user");    
    // Validate input
    if ($data['name']!==$user) {
        $userClass = 'errorfield';
    }
    if ($data['pwd']!==$pwd) {
        $errorClass = 'errorfield';
    }
    // If both user and password is correct, set session variables and redirect to start page
    if ($data['name'] === $user && $data['pwd'] === $pwd) {
        $_SESSION['role'] = $data['role'];
        $_SESSION['user'] = $user;
        header('Location: ?q=start');
    }
}
?>
        <!-- Heading -->
        <div id="login" class="well">
            <div class="row">
                <h1 class="text-center empty-row-after"><?=LOGIN_TITLE;?> <small><?=MANDATORY_SUB_TITLE;?></small></h1>
            </div>
            <div class="row">
                <form class="form-signin" method="post">
                    <label for="user" class="sr-only"><?=USERNAME.MANDATORY;?></label>
                    <input type="text" name="user" class="form-control <?=$userClass;?>" placeholder="<?=USERNAME.MANDATORY;?>" value="<?=!empty($data['user'])?$data['user']:'';?>" />
                    <label for="pwd" class="sr-only"><?=pwd.MANDATORY;?></label>
                    <input type="password" name="pwd" class="form-control empty-row-after <?=$errorClass;?>" placeholder="<?=PASSWORD.MANDATORY;?>">
                    <!-- Buttons -->
                    <div id="login_buttons" class="form-group text-center">
                        <button class="btn btn-lg btn-success" type="submit"><?=BUTTON_LOGIN;?></button>
                        <a class="btn btn-lg btn-info" role="button" href="<?=DOCUMENT_ROOT;?>"><?=BUTTON_BACK;?></a>
                    </div>
                </form>
            </div>
        </div>