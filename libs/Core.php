<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Core
{
    
    
    public function getSelectHTML($conex,$sql,$name, $idSelected, $class, $select=false,$extra="", $firstRow="")
    {
        $resultset=$conex->executeSQL($sql);
        echo "<select id='".$name."' name='".$name."' $extra  class='$class'>";
        echo ($select and ($firstRow==""))?"<option value='-1' > Seleccione una opción</option>":"";
        echo ($firstRow!="")?"<option value='-1' > ".$firstRow."</option>":"";
        while($row= $conex->nextItem($resultset))
        {
                echo "<option value='".$row[0]."' ".(($idSelected==$row[0])?" selected='selected' ":"")." > ". ( (($row[1])))	."</option>";
        }
        echo "</select>";



    }
    
    public function uploadImage($destination_dir,$name_media_field){
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	$result="0";
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name)) 
	{        
		$img_type  = $_FILES[$name_media_field]['type'];
		$ext=explode(".",$_FILES[$name_media_field]['name']);
		$img_file  =(substr( md5(microtime()), 1, 12).".".$ext[1] );

		if ($_FILES[$name_media_field]['size']<=20000000)
		{
			if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type,"jpg")) || strpos($img_type,"png") || strpos($img_type,"pdf")|| strpos($img_type,"xlsx")|| strpos($img_type,"xls")|| strpos($img_type,"doc") || strpos($img_type,"docx") || strpos($img_type,"ppt") || strpos($img_type,"pps") || strpos($img_type,"pptx"))){
				try
				{
				if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){                			  

					$result= $img_file;
				}
				else
				{
					 echo $destination_dir.'/'.$img_file;
				}
				} catch (Exception $e) {
					 echo 'Excepción capturada: ',  $e->getMessage(), "\n";

				}
			}
			else
				$result="-2";
		}
		else
			$result="-1";
	}
	return $result; 
}	

}