<?php
$conectionObject= new connectionMySQL();

    
    $sql="SELECT  p.* , dc.nombre AS  ciudad, dd.nombre as departamento, c.nombre as comuna "
            . "FROM barrio p "
            . " INNER JOIN comuna c ON(c.idComuna=p.idComuna)"
            . "INNER JOIN divisionpolitica dc ON(dc.idDivisionPolitica=c.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(c.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')";
      

?>
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Lista  <span class="table-project-n">de </span> Puntos de votación</h1>
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
                                                <th data-field="id">Nombre</th>
                                                <th data-field="nickname" >Departamento</th>
                                                <th data-field="Document" >Ciudad</th>
                                                <th data-field="commune" >Comuna</th>
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
                                                           <td id="td_Nickname_'.$index.'">'.$row['nombre'].'</td>
                                                           <td>'.$row['departamento'].'</td>
                                                           <td>'.$row['ciudad'].'</td>
                                                          <td>'.$row['comuna'].'</td>
                                                           <td><img src="'.URL.'img/icons/edit_32x32.png" onclick="getDataNeighborhood('.$row['idBarrio'].')" /></td>
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