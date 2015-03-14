<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
    table.tablareporte {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.tablareporte th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.tablareporte td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
    </style>
</head>
<body>

	<h1>Reporte de fichas</h1>
	 	
	<div align="center"> 

    <table class="tablareporte">
	<tr>
	  <th colspan=<?php echo  count($tiporedes); ?> >TIPO RED</th>
	</tr>
	 
	<tr>
        <?php 
        foreach($tiporedes as $dato){
        	echo "<td> $dato->des_tipored </td>";
        }
        ?>

	  <td></td>
	  <td></td>
	  <td></td>
	</tr>
	</table>

	<table class="tablareporte">
	<tr>
	  <th colspan="4">CALZADA</th>
	</tr>
	 
	<tr>
		<?php 
        foreach($tipocalzadas as $dato){
        	echo "<td> $dato->des_calzada </td>";
        }
        ?>
	</tr>
	</table>



	</div>

</body>
</html>