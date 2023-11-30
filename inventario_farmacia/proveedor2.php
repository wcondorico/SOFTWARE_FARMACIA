<?php
 require_once('include/session.php'); 
 $stock_menu=1;
 ?>

<?php

$conexion=mysqli_connect("localhost","root","","inventario_farmacia");



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventario -  Sistema de Inventario Farmacéutico</title>

    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

    
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        
        <?php include ("navbar.php")?>

        <div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
                
                <button class="btn btn-success btn-sm" id="">Proveedores
                    <span class="" aria-hidden="true"></span>
                </button>
                <div id="all-proveedor"></div>

</div>
                <thead>
                    <br>
                    </br>
                 </thead>

                <div class="table-responsive">
        <table id="myTable-stock" class="table table-bordered table-hover table-striped">
            <thead>
              
        <tr>
            <td>id</td>
            <td>nombre</td>
            <td>address </td>
            <td>telephone</td>
            <td>fax</td>
            <td>info</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="select * from suppliers";
        $resul=mysqli_query($conexion,$sql);
         while ($mostrar=mysqli_fetch_array($resul)) {

         
        ?>
        <tr>
            <td><?php echo $mostrar["id"]?></td>
            <td><?php echo $mostrar["name"]?></td>
            <td><?php echo $mostrar["address"]?></td>
            <td><?php echo $mostrar["telephone"]?></td>
            <td><?php echo $mostrar["fax"]?></td>
            <td><?php echo $mostrar["info"]?></td>
        </tr>
      <?php  
    }
    ?>
</tbody>

    </table>
               </div>

            </div>
            

        </div>
        

    </div>
    


<?php include_once('modal/confirmation.php'); ?>
<?php include_once('modal/message.php'); ?>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>


</body>

</html>



