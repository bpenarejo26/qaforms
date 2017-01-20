 <?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "branders");  
 $output = '';  
 if(isset($_POST["manager_id"]))  
 {  
      if($_POST["manager_id"] != '')  
      {  
           $sql = "SELECT Fullname, DMName from employee where PosCode = '4' and Team = '".$_POST["manager_id"]."' order by Fullname ASC ";  
      }  
      else  
      {  
           $sql = "SELECT DMName FROM employee";  
      }
	
      $result = mysqli_query($connect, $sql); 
	 
	  echo '<select name="show_artist" id="show_artist"></tr>
			<option value="28">---Select Artist--</option>';
      while($row = mysqli_fetch_array($result))  
      {  
          
			$output .= '<option value="'.$row["Fullname"].'">'.$row[1].'</option>';
			
	  }  
	  
      echo $output; 
	  echo '</select></div>';
	
}

 ?> 
 
