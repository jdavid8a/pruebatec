Descripicion de la solución

La soluciónn fue desarrollada netamente en php y javascript  usando plugins de jquery y boostrap
con finalidad de  aggilizar el desarrollo; sin uso de ningun framework usando como motor de base de datos MYSQL.

La instalación, consiste en los siguientes pasos:

1. copiar la carpeta pruebatec en el documento root del serrvidor apache donde correra la aplicacion en el caso de estar
en un servidor local apache  (xampp) como en el que fue construido la ruta seria : c:/xampp/htdocs/
2. abrir el gestor de base de datos, segun sera usado por ejemplo phpmyadmin, heydisal,etc.
	en este instructivo se usar apapmyadmin, por lo cual se debe ingresar a traves de un navvegar a 
	la dirección http://[ip_servidor]/phpmyadmin
3. ir a la pestaña bases de datos.
4. ingresar en el campo " crear nueva  base de datos " -> pruebatec y seleccionar el cotejamiento de preferencia
	para este caso se uso utf8_spanish_ci
5. click en crear 
6. click sobre el nombre pruebatec en el arbol del lado izquierdo 
7. dirigirse a la pestaña importar 
8. seleccione el archivo de importacion  que se enccuentra en la rais de la carpeta pruebatec, y se llama pruebatec.SQL
9. click en continuar

con los pasos anteriores ya se habra cargado el sitio y base ded datos

para ejecutar exitosamente la solución debe modificar  los siguientes archivos:

pruebatec/libs/config.php   // segun sea necesario si se cambia la carpeta contenedora del sitio modificar linea 10 y 12
pruebatec/libs/connect/parametersDB.php // modificar con las credenciales de conexion a la base de datos creada de ser necesario


------------------------------------------------------------------------------------------------------


La capa de FROnt END se realizo con html5 con  inyecciones de php con el fin de reutilizar codigo fuente
La capa de BACK END se realizo en netameente en php en su mayoria en archivoss llamados de forma independientte segun se requiera 
con el fin de facilitar posibles camabios 
La capa de transporte de datos y/o interfaz Front -BACK  se reaclizo atravez de  javascript, mediante peticiones ajax, usando metodos
propios del api jquery
la base de datos se gestioina con la clase connectionMySQL.php
cuenta con los siguientes metodos 
que cuenta con los metodos:

private function  getConnection($p_user='',$p_pass='', $p_host='',$p_data_base=''): metodo privado que se encarga de gestionar la conexion
con la base de datos, en caso de no configurar el archivo parametersDB.php se debe pasar los parametros señalados.
private function closeConnection($link): Método privado que se enccarga de cerrar la conexión
public function selectDB($pdb,$plink): Método de seleccion de base de datos , cuyos parametro son nombre de la base de datoss y link de conexión.
public function  executeSQL($sql): método publico que ejeccuta consulta y returna un punteero de tipo resultset con los resultados de la consulta 
en caso de ser SELECT, en caso de ser INSERT  o UPDATE retorna falso o verdadedro.
public function nextItem($source): lleva a la siguiente posición delpuntero de resultados
public function getNumRows(): retorna elnumero de filas en un resultser

public funtion getNumField(): retorna el numerro de columnas de una fila

public function nameField($rta_consulta,$indice): retorna el nombre de un campo en especial

public function lastInsertId() : retorna el id del ultimo registro inssertado

public function getLink(): retorna el link de conexión


Se utilizo para gestion de las sesiones  la clase ClassSession que tiene como metodos :
public function getUserId(): retorna el id o llave principal que representa al usuario con sesion activa

public function getUserName(): retorna el nombre de usuario que este caso es el nuero de cedula del usuario

public function getUserType(): retorna el perfil de usuario del usuario activo en la sesión

public login($user,$psw ) : se encarga de consultar a la base de datos  activar la sesion  y redireccionar al index , teniendo como parametros de ingresousuario y contraseña

public function validate(): valida que haya sesion activa

public function closeSession(): termina (mata) la sesión


Adicioanlmente hay una clase de utilidades llamada core.php con los siguientes métodos:


 public function getSelectHTML($conex,$sql,$name, $idSelected, $class, $select=false,$extra="", $firstRow=""): clase publica que retirna el codigo htmlde un campo select 
	 los parametros son, objeto de conexión, " sql de la consulta con los campos a incluir en la lista de selección,  nombre del campo,id del registro preseleccionado,
	clase css, si es preseleccionado, extras como por ejemplo eventos y mensaje de la primera fila.
public function uploadImage($destination_dir,$name_media_field): su funcion es cargar imagenes al servidor, como parametros, la url del destino de la imagen y el nombre del campo file
	











Adicionalmente sse addjunta el modelo relacional de la base de datos en la rais de la carpeta pruebatec