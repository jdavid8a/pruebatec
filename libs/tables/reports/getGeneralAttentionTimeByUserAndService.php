<?php
@session_start();
include '../../connect/connectionMySQL.php';
$conectionObject= new connectionMySQL();
$condition=($_POST['officeId']!='-1' && $_POST['officeId']!='-1')?' AND su.idSucursal='.$_POST['officeId']:'';
$condition=($_POST['userId']!='-1' && $_POST['userId']!='-1')?' AND a.idUsuario='.$_POST['userId']:'';
$condition=($_POST['serviceId']!='-1' && $_POST['serviceId']!='-1')?' AND s.idServicio='.$_POST['serviceId']:'';
$condition.=($_POST['initDate']!='' && $_POST['endDate']!='')?" AND DATE(a.fechaAtencion) BETWEEN '".$_POST['initDate']."' AND '".$_POST['endDate']."' ":'';
$condition.=($_POST['initDate']!='' && $_POST['endDate']=='')?" AND DATE(a.fechaAtencion) > '".$_POST['initDate']."'  ":'';
$condition.=($_POST['initDate']=='' && $_POST['endDate']!='')?" AND DATE(a.fechaAtencion) < '".$_POST['endDate']."' ":'';

$sql="SELECT CONCAT(td.Abreviatura,'-',c.numeroDocumento,' ',c.nombre,' ', c.apellidos) 'cliente', s.abreviatura 'AbreviaturaServicio',"
            . "s.nombre 'NombreServicio',t.*,a.*, es.nombre 'NombreEstado', CONCAT(u.nombre,' ',u.apellidos) AS Funcionario,"
        . " TIME(a.fechaAtencion) AS fechaAtencion, TIME(a.fechaFinAtencion) as fechaFinAtencion, TIME(t.fecha) AS horaEmision,"
        . " SEC_TO_TIME((TIMESTAMPDIFF(MINUTE ,  (a.fechaAtencion),  (a.fechaFinAtencion) ))*60) AS TiempoAtencion  "
         . " FROM  tiquete t  INNER JOIN  atencion a ON(a.idTiquete=t.idTiquete) "
         . " INNER JOIN servicio s ON(s.idServicio=t.idServicio) "
         . " INNER JOIN sucursal su ON (su.idSucursal=s.idSucursal)"
         . " INNER JOIN empresa e ON(e.idEmpresa=su.idEmpresa)"
         . " INNER JOIN cliente c ON (c.idCliente=t.idCliente) "
         . " INNER JOIN tipodocumento td ON(td.idTipoDocumento=c.idTipoDocumento)"
         . " INNER JOIN usuario u ON (a.idUsuario=u.idUsuario)"
        . "  INNER JOIN estado es ON(es.idEstado=t.idEstado)"
         . " WHERE 1=1 $condition ORDER BY a.fechaFinAtencion DESC";
//echo $sql;
?>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
<!--                                    <h1>Turno atendidos <span class="table-project-n"> del día</span> </h1>-->
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
                                                <th data-field="nit" >Tiquete</th>
                                                <th data-field="User" >Funcionario</th>
                                                <th data-field="hourticket" >Hora emisión tiquete</th>
                                                <th data-field="office" >Inicia atención</th>
                                                <th data-field="dateEnd">Fin Atención</th>
                                                <th data-field="dif">Tiempo de atención </th>                                                
                                                <th data-field="Client" >Cliente</th>
                                                <th data-field="Obs" >Observación</th>
                                                <th data-field="State" >Estado Actual del tiquete</th>                                                                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $resultSet=$conectionObject->executeSQL($sql);
                                            $hours=0; $minutes=0; $index=0;
                                            while($row = $conectionObject->nextItem($resultSet)) 
                                            {
                                                 echo ' <tr>
                                                           <td>'.$row['AbreviaturaServicio'].'-'.$row['numero'].'</td>
                                                           <td>'.$row['Funcionario'].'</td>
                                                           <td>'.$row['horaEmision'].'</td>
                                                           <td>'.$row['fechaAtencion'].'</td>
                                                           <td>'.$row['fechaFinAtencion'].'</td>
                                                           <td>'.$row['TiempoAtencion'].'</td>
                                                           <td>'.$row['cliente'].'</td>
                                                           <td>'.$row['observacion'].'</td>
                                                           <td>'.$row['NombreEstado'].'</td>                                                           
                                                       </tr>';
                                                 $index++;
                                                 $data=explode(":",$row['TiempoAtencion']);
                                                 $hours+=$data[0];$minutes+=$data[1];
                                            }
                                            
                                            ?>
                                           
                                        </tbody>
                                    </table>
                                    <?php
                                    $avg=(($hours*60)+($minutes))/$index;
                                    echo "<br><h3>Tiempo atencion promedio: ".round($avg)." minutos</h3>"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>