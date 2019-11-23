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
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

</head>
<body class="bg-dark">
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
<main onload="getData()">
    <script type="text/javascript">
        let f = function(data,status){
            console.log(data, status);
            let table = document.getElementById('content');
            let html ='';
            data.forEach(function(el) {
                html +='<tr><td>'+el.id+'</td><td>'+el.task+'</td><td>'+el.action+'</td><td></td></tr>';
            });
            console.log(html);
            table.innerHTML = html;
        }
       let getData = function () {
           $.get('item.php',f)
       }
       setInterval(getData, 1000);
    </script>
    <div class="container-fluid">
        <table class="text text-white table table-lightgrey table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">task</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody id ="content">
            </tbody>
        </table>
    </div>
    <div class="container-fluid">
        <input type="text" name="" id="" class="text container-fluid">
    </div>
    <div class="container">
        <input type="button" value="add" class="btn btn-lg btn-primary">
    </div>
</main>
</body>
</html>
