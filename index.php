<!DOCTYPE html>
<html>
<head>
    <title>HW 13 PDO</title>
    <meta charset="utf-8" />
</head>
<body>
<?php
require_once __DIR__.'/constants.php';
$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';',DB_USER,DB_PASSWORD, DB_OPTS);
try {
    $sql = $pdo->prepare("select 1 from users");
    $sql->execute();
    echo 'The table `users` already exists';
    echo '<hr>';
    ?>
    <form method="post" id="userForm">
        <p>Ваше имя: <input type="text" name="name" required/></p>
        <p>Ваша фамилия: <input type="text" name="surname" required/></p>
        <p>Ваш возраст: <input type="text" name="age" required/></p>
        <p>Ваш email: <input type="email" name="email" required/></p>
        <p><input id="userAdd" onclick="ajaxHandler('userAdd',this.id,event.preventDefault())"  type="submit" /></p>
    </form>
    <hr>
    <h5>Users</h5>
    <form>
        <select id="users">

        </select>
        <button id="btnGet" onclick="ajaxHandler('getUsers',$(this).attr('data-id'),event.preventDefault())" data-id="#">Get User</button>
    </form>
    <div id="user"></div>
    <hr>
    <h5>Users For Delete</h5>
    <form>
        <select id="usersForDelete">

        </select>
        <button id="btnDell" onclick="ajaxHandler('deleteUser',$(this).attr('data-id'))" data-id="#">Delete</button>
    </form>
    <?
}catch (Exception $exception){
   ?><button id="create" onclick="ajaxHandler('create',this.id,event.preventDefault())">Create table users</button>
    <?

}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $.ajax({ url: "function.php",
            type: "POST",
            context: document.body,
            data:  {do: 'getUsers'},
            success: function(data){
                $("#users").html(data);
                $("#usersForDelete").html(data);
                $("#btnGet").attr('data-id',$( "select#users option:selected",this).data("id"));
                $("#btnDell").attr('data-id',$( "select#usersForDelete option:selected",this).data("id"));
            }
        });
    });

    $( "select#users" )
        .change(function () {
            $("#btnGet").attr('data-id',$("select option:selected").data('id'))
        });

    $( "select#usersForDelete" )
        .change(function () {
            $("#btnDell").attr('data-id',$("select option:selected").data('id'))
        });

    function ajaxHandler(funcName,id){
        if(id === 'userAdd') {
            let formData = $( "form" ).serializeArray();
            $.ajax({
                type: "POST",
                url: "function.php",
                data:  {do: funcName,dataF:formData},
                success: function(){
                    location.reload();
                }
            });
        }else{
            $.ajax({
                type: "POST",
                url: "function.php",
                data:  {do: funcName,id:id},
                success: function(data){
                    $("#user").html(data);
                }
            });
        }

    }
</script>
</body>
</html>