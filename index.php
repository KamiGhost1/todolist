<?php
if(!isset($_COOKIE['auth'])){
    if(!isset($_COOKIE['token'])){
        header('location: signin.php');
    }
}
?>

<html>
<head>
    <meta charset="utf8">
    <title>4 laba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
</head>
<body class="bg-lightgrey" style="background: url('assets/logo.jpg') no-repeat; -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%;">
<header>
    <div class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">TODO</a>
            </div>
            <nav class="nav">
                <ul class="justify-content-end">
                    <a href="logout.php" class="btn btn-dark">Log out</a>
                </ul>
            </nav>
        </div>
    </div>
</header>
<main>
    <script>
        $.ready{
            $.ajax(){

            }
        }
    </script>
</main>
</body>
</html>
