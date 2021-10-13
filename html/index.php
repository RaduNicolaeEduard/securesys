<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet" href="styles.css">


<?php
include "dbcon.php"

?>

<style>
    #view-source {
        position: fixed;
        display: block;
        right: 0;
        bottom: 0;
        margin-right: 40px;
        margin-bottom: 40px;
        z-index: 900;
    }
</style>
</head>
<!-- Simple header with scrollable tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Security | Radu Nicolae</span>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab">Tab 2</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab">Tab 3</a>
            <a href="#scroll-tab-4" class="mdl-layout__tab">Tab 4</a>
            <a href="#scroll-tab-5" class="mdl-layout__tab">Tab 5</a>
            <a href="#scroll-tab-6" class="mdl-layout__tab">Tab 6</a>
        </div>
    </header>
    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
            <!-- Wide card with share menu button -->
            <style>
                .demo-card-wide.mdl-card {
                    width: 512px;
                }


                .demo-card-wide>.mdl-card__menu {
                    color: #fff;
                }
            </style>
            <div style="display:flex; justify-content:center">

                <div class="center" style="margin-right:2em">

                    <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="height:30em">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">DB Data</h2>
                        </div>


                        <div style="overflow:auto;height:100%">
                            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100%; height:100%;">
                                <thead>
                                    <tr>
                                        <th class="mdl-data-table__cell--non-numeric">User Name</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($db, "SELECT * FROM mytable");

                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                        <tr>
                                            <td class="mdl-data-table__cell--non-numeric"><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phonenum']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <?php
                    include "dbcon.php";

                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];

                        $insert = mysqli_query($db, "INSERT INTO `mytable`(`username`, `email`, `phonenum`) VALUES ('$username','$email','$phone')");

                        if (!$insert) {
                            echo $mysqli_error();
                        } else {
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }

                    mysqli_close($db);
                    ?>
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Sign Up Form</h2>
                        </div>
                        <form method="POST">
                            <div class="center">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="sample1" name="username">
                                    <label class="mdl-textfield__label" for="sample1">User Name</label>
                                </div>
                            </div>
                            <div class="center">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="sample1" name="email">
                                    <label class="mdl-textfield__label" for="sample1">Email</label>
                                </div>
                            </div>
                            <div class="center">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="sample1" name="phone">
                                    <label class="mdl-textfield__label" for="sample1">Phone Number</label>
                                </div>
                            </div>
                            <div class="center">
                                <button class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="submit" value="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div style="display:flex; justify-content:center">

                <div class="center">
                    <?php
                    include "dbcon.php";
                    ?>
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="height:15em">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Search</h2>
                        </div>
                        <form method="POST">
                            <div class="center">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="sample1" name="search">
                                    <label class="mdl-textfield__label" for="sample1">search</label>
                                </div>
                            </div>
                            <div class="center">
                                <button class="mdl-button mdl-js-button mdl-button--raised" type="submit1" name="submit1" value="submit1">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <div>
                            <?php

                            if (isset($_POST['submit1'])) {
                                $sql = "SELECT * FROM mytable WHERE username = '{$_POST['search']}'";
                                $result = mysqli_query($db,  $sql);


                                if (!$result) {
                                    echo $mysqli_error();
                                } else {
                                    if ($result->num_rows > 0) {
                            ?>


                        </div>
                    </div>
                </div>
                <div class="center" style="margin-left:2em">
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="height:15em">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Search Results</h2>
                        </div>
                        <style>
                            .demo-list-item {
                                width: 300px;
                            }
                        </style>
                        <div style="overflow:auto;height:100%">
                            <ul class="demo-list-item mdl-list">
                                <?php
                                        while ($row = $result->fetch_assoc()) {
                                ?>
                                    <li class="mdl-list__item">
                                        <span class="mdl-list__item-primary-content">
                                            <i class="material-icons mdl-list__item-icon">person</i>
                                            <?php echo $row['username']; ?>
                                        </span>
                                    </li>
                    <?php
                                        }
                                    }
                                }
                            }
                    ?>

                            </ul>
                        </div>
                        <div>


                            <script type='text/javascript'>
                                toastr.success("<?php echo $sql; ?>", "Query", {
                                    timeOut: 5000
                                })
                            </script>
                            <?php
                            mysqli_close($db);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
</div>

</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-2">
    <div class="page-content">
        <!-- Your content goes here -->
    </div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-3">
    <div class="page-content">
        <!-- Your content goes here -->
    </div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-4">
    <div class="page-content">
        <!-- Your content goes here -->
    </div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-5">
    <div class="page-content">
        <!-- Your content goes here -->
    </div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-6">
    <div class="page-content">
        <!-- Your content goes here -->
    </div>
</section>
</main>
</div>
<a href="https://github.com/RaduNicolaeEduard/securesys" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">View Source</a>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</body>


<?php
mysqli_close($db);
?>