<?php
$conectionObject= new connectionMySQL();

switch ($_SESSION["userProfileId"])
{
   case 1:
    $sql="SELECT  count(*) as cantidad, CONCAT(u.nombres,' ',u.apellidos) AS lider 
            FROM votante v INNER JOIN usuario u on (u.cedula=v.idLider)  GROUP BY v.idLider"           ;
            break;
   case 2:$sql="SELECT count(*) as cantidad, CONCAT(u.nombres,' ',u.apellidos) AS lider 
            FROM votante v INNER JOIN usuario u on (u.cedula=v.idLider)   "
            . " WHERE v.idLider=".$_SESSION['userId']." GROUP BY v.idLider";
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
                                    <h1>Conteo de   <span class="table-project-n">de </span> Votantes</h1>
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
                                                <th data-field="ced">Lider</th>
                                                <th data-field="name">Conteo</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php                                            
                                            $resultSet=$conectionObject->executeSQL($sql);
                                            $index=1;
                                            while($row = $conectionObject->nextItem($resultSet)) 
                                            {
                                                 echo ' <tr>
                                                           
                                                           <td>'.$row['lider'].'</td>
                                                           <td>'.$row['cantidad'].'</td>
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