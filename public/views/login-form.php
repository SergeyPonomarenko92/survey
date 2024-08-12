<?php
require_once APP_ROOT . '/public/layout/Header.php'; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1> <?php echo $form_title ?> </h1>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                    <label for="floatingEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </form>

        </div>

    </div>

</div>
