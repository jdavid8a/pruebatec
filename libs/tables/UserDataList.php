<?php
$conectionObject= new connectionMySQL();

    
    $sql="SELECT  pu.nombre 'perfilUsuario',u.* "
            . "FROM usuario u "
            . " INNER JOIN  perfilusuario pu ON(pu.idPerfilUsuario=u.idPerfilUsuario)";
      
    

//echo $sql;
?>
<div class="data-table-area mg-b-15">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Lista  <span class="table-project-n">de </span> Usuarios</h1>
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
                                                <th data-field="pic">foto</th>
                                                <th data-field="id">Cedula</th>
                                                <th data-field="nickname" >Nombres</th>
                                                <th data-field="Document" >Apellidos</th>
                                                <th data-field="name" >Teléfono</th>
                                                <th data-field="Birthday" >Perfil</th>
                                                <th data-field="update">Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php                                            
                                            $resultSet=$conectionObject->executeSQL($sql);
                                            $index=1;
                                            while($row = $conectionObject->nextItem($resultSet)) 
                                            {
                                                 echo ' <tr>
                                                        <td><img src="../pics/'.$row['foto'].'" height="48" width="48"/></td>
                                                           
                                                           <td id="td_Nickname_'.$index.'">'.$row['cedula'].'</td>
                                                           <td>'.$row['nombres'].'</td>
                                                           <td>'.$row['apellidos'].'</td>
                                                           <td>'.$row['celular'].'</td>
                                                           <td>'.$row['perfilUsuario'].'</td>
                                                          
                                                           <td><img src="'.URL.'img/icons/edit_32x32.png" onclick="getDataUserByIndex('.$index.','.$row['cedula'].')" /></td>
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