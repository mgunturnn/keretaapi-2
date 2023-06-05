<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
    <img src="img/logo_kereta_1.png" class="img-fluid" width="90" height="auto">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php if (isset($_SESSION['status'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="myorder.php">Lihat Pesanan</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                <?php } ?>


            </ul>
            <div class="form-inline my-2 my-lg-0">
                <?php
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['level'] === 'admin') {
                        echo '<a href="../logout.php" class="nav-link">Logout</a>';
                    } else {
                        echo '<a href="logout.php" class="nav-link">Logout</a>';
                    }
                } else {
                    echo '<a href="login.php" class="nav-link">Login</a><a href="register.php" class="nav-link">Register</a>';
                } ?>
            </div>
        </div>
    </div>
</nav>