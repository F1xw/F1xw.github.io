<?php

session_start();

if (!isset($_SESSION['loggedin']) || !isset($_SESSION['uid'])) {
    header('location: /auth/?ref=dashboard/settings');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>share.it - Settings</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/src/_ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/_ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/src/_ico/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/src/_ico/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/_ico/favicon-16x16.png">
    <link rel="manifest" href="/src/_ico/site.webmanifest">
    <link rel="mask-icon" href="/src/_ico/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/src/_ico/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="/src/_ico/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/ripple-btns/ripple.css">
    <link rel="stylesheet" href="/src/css/master.css">
    <link rel="stylesheet" href="/src/css/toast.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="/src/ripple-btns/ripple.js"></script>
    <script src="/src/js/toast.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">share.it</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="/">Upload</a>
        </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <span class="dropdown-item account-name"><i class="far fa-user"></i>&nbsp;<?php echo $_SESSION['username']; ?></span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/dashboard/">My Files</a>
                <a class="dropdown-item active" href="/dashboard/settings/">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="/auth/logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 uri-input" type="search" placeholder="File ID" aria-label="File ID">
        </form>
    </div>
    </nav>
</body>
</html>