<?php 
/******************************************************************
	autor: José David Ochoa Ortiz
	Ingeniero de sistemas - UDI
*******************************************************************/

include("parametersDB.php");

class connectionMySQL
{
	
	private $link;
	private $answer_sql;
	private $numrows;
	private $num_fields;
	private $last_id;
        private $collation="SET NAMES 'utf8'";
	
	private function  getConnection($p_user='',$p_pass='', $p_host='',$p_data_base='')
	{
		if($p_user=='' and   $p_data_base=='' and $p_host=='' )
		{
			global $par_host_url,$par_user,$par_password,$par_database;
			$this->link=mysql_connect($par_host_url,$par_user,$par_password) or printf(mysql_error());
			mysql_select_db($par_database,$this->link) or printf("Error Selecting database");			
		}
		else
		{
			$this->link=mysql_connect($p_host,$p_user,$p_pass) or printf(mysql_error());
			mysql_select_db($p_data_base,$this->link) or printf("Error Selecting database");
		}	
		return $this->link;	
	}
	
	private function closeConnection($link)
	{
		mysql_close($link);
		
	}
	
	public function selectDB($pdb,$plink)
	{
		mysql_select_db($pdb,$plink);
	}
	
	public function  executeSQL($sql)
	{
			$link=$this->getConnection();
                        $this->answer_sql=mysql_query($this->collation,$link);
                       // $this->answer_sql=mysql_query("SET SQL_BIG_SELECTS=1;",$link);
			$this->answer_sql=mysql_query($sql,$link) or printf(mysql_error());
			$this->last_id=mysql_insert_id($link);  

			if(! is_bool($this->answer_sql))
			{
				
				$this->numrows=mysql_num_rows($this->answer_sql);
				$this->num_fields=mysql_num_fields($this->answer_sql);
				
				
			}
			$this->closeConnection($link);
			return $this->answer_sql;
	}
	
	public function nextItem($source)
	{
		return mysql_fetch_array($source);
	}
	public function getNumRows()
	{
		return $this->numrows; 
	}
	public function getNumField()
	{
		return $this->num_fields;
	}
	public function nameField($rta_consulta,$indice) {
			$nom_cols = mysql_fetch_field($rta_consulta,$indice);
			return $nom_cols;
	}
	public function lastInsertId() 
	{
		return $this->last_id;
	}
	public function getLink()
	{
		return $this->link;
	}
	 
}
?>