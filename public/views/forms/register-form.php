<?php
require_once APP_ROOT . '/public/layout/Header.php'; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p> <?php echo $form_title ?> </p>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="nameInput" >
                    <label for="nameInput">Your name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                    <label for="floatingEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </form>

        </div>

    </div>

</div>
