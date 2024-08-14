<?php
require_once APP_ROOT . '/public/layout/Header.php'; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1> <?php echo $form_title ?> </h1>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Vote count</th>
                    <th scope="col">created date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Test name</th>
                    <td>Public</td>
                    <td>332</td>
                    <td>12.12.2024</td>
                    <td>12.12.2024</td>
                    <td> <p><a href="#" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">See form</a></p>
                    </td>
                    <td><p><a href="#" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Edit form</a></p></td>
                    <td> <p><a href="#" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Delete form</a></p></td>
                    <td> <p><a href="#" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Switch to draft</a></p></td>

                </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>
