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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>
<body class="bg-dark">
<header>
    <div class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">TODO</a>
            </div>
        </div>
    </div>
</header>
<main onload="getData()">

    <div class="container-fluid" style="display: flex;justify-content: center">
        <table class="text text-white table table-lightgrey table-borderless">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id ="content">
            </tbody>
        </table>
    </div>
    <div class="container-fluid">
        <input type="text" name="" id="add_item" class="text container-fluid">
    </div>
    <div class="container" style="display: flex;justify-content: center;margin-top: 10px"><br>
        <input type="button" value="Add task" onclick="addItem()" class="btn btn-success btn-lg">
    </div>
</main>
<script type="text/javascript">
    let f = function(data,status){
        //console.log(data, status);
        let table = document.getElementById('content');
        let html ='';
        let i = 1;
        data.forEach(function(el) {
            if(el.status === 'in process')
                html +=`<tr><td>${i}</td><td onclick="update(${i})">${el.task}</td><td ><button type="button" onclick="remove(${i})" class=\"btn btn-danger\">delete</button></td><td onclick="updateStatus(${i})" class="text-warning">${el.status}</td></tr>`;
            else
                html +=`<tr><td>${i}</td><td onclick="update(${i})">${el.task}</td><td ><button type="button" onclick="remove(${i})" class=\"btn btn-danger\">delete</button></td><td onclick="updateStatus(${i})" class="text-success">${el.status}</td></tr>`;
            i++;
        });
        //console.log(html);
        table.innerHTML = html;
    };
    let getData = function () {
        $.get('item.php',f)
    };
    let update = function(elID){
        let newTask = prompt('Enter updated task!');
        $.ajax({
            url:'item.php',
            type:'POST',
            data:JSON.stringify({'put':1,'task':elID,'update':newTask}),
            success:()=>{
                console.log('task updated!')
            },
            error:()=>{
                console.log('update error!')
            }
        });
    };
    let remove = function(elID){
        $.ajax({
            url:'item.php',
            type:'POST',
            data:JSON.stringify({'delete':1,'task':elID}),
            success:()=>{
                console.log('task deleted!')
            },
            error:()=>{
                console.log('delete error!')
            }
        });
    };
    let addItem = function (){
        let html = document.getElementById("add_item").value;
        $.ajax({
            url:'item.php',
            type:'POST',
            data:JSON.stringify({'post':1,'task':html}),
            success:()=>{
                console.log('task has been sanding');
            },
            error:()=>{
                console.log('error! task has not sanding');
            },
        });
    };
    let updateStatus = function (elID) {
        $.ajax({
            url:'item.php',
            type:'POST',
            data:JSON.stringify({'put':1,'task':elID,'status':1}),
            success:()=>{
                console.log('status updated!')
            },
            error:()=>{
                console.log('status error!')
            }
        });
    };
    setInterval(getData, 1000);
</script>
</body>
</html>
