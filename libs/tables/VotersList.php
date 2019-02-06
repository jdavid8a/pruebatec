<?php
$conectionObject= new connectionMySQL();

switch ($_SESSION["userProfileId"])
{
   case 1:
    $sql="SELECT v.direccion,v.telefono,v.nombre, v.apellidos,v.cedula,p.idPuestoVotacion,v.mesa,p.nombre as nombrePuesto , "
            . "v.direccion, dc.nombre AS  ciudad,"
            . " dd.nombre as departamento,c.idComuna, c. nombre as nombreComuna,b.idBarrio, b.nombre AS nombreBarrio "
            . "FROM votante v "
            . " INNER JOIN puestovotacion p ON(v.idPuestoVotacion=p.idPuestoVotacion)"
            . " INNER JOIN barrio b ON (p.idBarrio=b.idBarrio)"
            . " INNER JOIN comuna c ON (b.idComuna=c.idComuna)"
            . " INNER JOIN divisionpolitica dc ON(dc.idDivisionPolitica=c.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(c.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')"

            . " ";
            break;
   case 2:$sql="SELECT v.direccion,v.telefono,v.nombre, v.apellidos,v.cedula,p.idPuestoVotacion,v.mesa,p.nombre as nombrePuesto , "
            . "v.direccion, dc.nombre AS  ciudad,"
            . " dd.nombre as departamento,c.idComuna, c. nombre as nombreComuna,b.idBarrio, b.nombre AS nombreBarrio "
            . "FROM votante v "
            . " INNER JOIN puestovotacion p ON(v.idPuestoVotacion=p.idPuestoVotacion)"
            . " INNER JOIN barrio b ON (p.idBarrio=b.idBarrio)"
            . " INNER JOIN comuna c ON (b.idComuna=c.idComuna)"
            . " INNER JOIN divisionpolitica dc ON(dc.idDivisionPolitica=c.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(c.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')"

            . " WHERE v.idLider=".$_SESSION['userId'];
            break;
}      

?>
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Lista  <span class="table-project-n">de </span> Votantes</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="all">Exportar todo</option>
					</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="ced">cedula</th>
                                                <th data-field="name">Nombre</th>
                                                <th data-field="lasttNAme">Apellidos</th>
                                                <th data-field="phone">Teléfono</th>
                                                <th data-field="address">Direccion</th>
                                                <th data-field="nickname" >Departamento</th>
                                                <th data-field="ciudad" >Ciudad</th>
                                                <th data-field="communa" >comuna</th>
                                                <th data-field="neigh" >Barrio</th>
                                                <th data-field="VotingStation" >Puesto Votación</th>
                                                <th data-field="table" >Mesa</th>
                                                <th data-field="edit" >Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php                                            
                                            $resultSet=$conectionObject->executeSQL($sql);
                                            $index=1;
                                            while($row = $conectionObject->nextItem($resultSet)) 
                                            {
                                                 echo ' <tr>
                                                        <td>'.$row['cedula'].'</td>
                                                           <td>'.$row['nombre'].'</td>
                                                           <td>'.$row['apellidos'].'</td>
                                                          <td>'.$row['telefono'].'</td>
                                                           <td>'.$row['direccion'].'</td>
                                                           <td>'.$row['departamento'].'</td>
                                                           <td>'.$row['ciudad'].'</td>
                                                           <td>'.$row['nombreComuna'].'</td>
                                                           <td>'.$row['nombreBarrio'].'</td>   
                                                           <td>'.$row['nombrePuesto'].'</td>
                                                           <td>'.$row['mesa'].'</td>
                                                           
                                                           <td><img src="'.URL.'img/icons/edit_32x32.png" onclick="getDataVoterById('.$row['cedula'].')" /></td>
                                                       </tr>';
                                                 $index++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>