<?php include 'reuse/header.php' ?>
<div class="container-fluid px-0">
    <?php
    // BEGIN HEADER
    include './reuse/config.php';

    include './reuse/header_body.php';

    // END HEADER
    ?>

    <?php
    if (empty($_SESSION['current_user'])) {
    ?>

    <img src="./assets/img/img_index.jfif" alt="" class="w-100 vh-100">

    <?php
    } else {
        // $currentUser = $_SESSION['current_user'];
    ?>

    <!-- BEGIN CONTAINER -->

    <Section>
        <div class="row p-0 m-0 mt-4">
            <?php
                if ($currentUser['user_level'] == 0) {
                    // Hiện thị body admin
                    include './admin/index.php';
                ?>

            <?php
                }
                if ($currentUser['user_level'] == 1) {
                    // Hiện thị foder teacher
                    include './teacher/index.php';
                ?>
            <?php
                }
                if ($currentUser['user_level'] == 2) {
                    // Hiện thị foder student
                    include './student/index.php';
                }
                ?>
        </div>
    </Section>

    <!-- END CONTAINER -->

    <?php } ?>

    <!-- BEGIN FOOTER -->

    <?php include './reuse/footer_body.php' ?>

    <!-- END FOOTER -->

</div>
<?php include 'reuse/footer.php' ?>