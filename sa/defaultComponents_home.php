<!--Logo-->
<div class="logo" title="Blümenlein">
    <img>
</div>


<!--Titulo-->
<div class="titulo">
    <?php
        if(isset($_SESSION['user_clientes'])){
            echo "<label>Bem-vindo(a), ". $_SESSION['user_clientes'] ."</label>";
        }
        else{
            echo "<label>Bem-vindo(a)</label>";
        }
    ?>
</div>

<br>
<!--Slide Cards-->
<?php include "slideList.php";?>
