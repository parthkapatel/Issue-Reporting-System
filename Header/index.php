<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light text-dark bg-light">
        <a class="navbar-brand" href="/reportingSystem/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/reportingSystem/">Home</a>
                </li>
                <?php
                    if($name != "admin"){
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/reportingSystem/reportIssue/">Report New Issue</a>
                            </li>
                <?php
                        }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/reportingSystem/viewIssue/">View Issues</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><b>Welcome <?php echo $name; ?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>

    </nav>
</div>