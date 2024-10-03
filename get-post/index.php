
<style>

    .login{
        font-size:30px;
        color:#FFF;
        display:flex;
        align-items: center;
        justify-content: center;
        font-weight: 200;
        letter-spacing: 2px;
        
    }

    .login:hover{
        opacity:0.7;
    }

    .input{
        border-radius:10px;
        position: relative;
        left: 60px;
        background-color:#fff;
        border:none;
        padding:10px;
    }
    .submit{
        border-radius: 10px;
        padding: 10px;
        position: relative;
        margin:20px;
        left: 80px;
        border:none;
        

    }

    .submit:hover{
        opacity:0.7;
    }

    .conteiner{
        height: 300px;
        width: 300px;
        background-color: black;
        opacity: 0.7;
        position: absolute;
        top:250px;
        left: 50rem;
        border-radius: 10px;
    }


</style>
    
<!-- formulario de login -->


<div class="conteiner">

<form action="login.php" method="post">

    
    
    <h1 class= "login">LOGIN</h1>
    <input class= "input" type="text" name="user" placeholder="User" required>
    <br><br>
    <input class= "input" type="password" name="password" placeholder="Password" required>
    <br><br>
    <input class="submit" type="submit" value="Iniciar sesión">



</form>
<?php include './inclides/footer.php'; ?>

</div>
