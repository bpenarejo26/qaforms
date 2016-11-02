<html><body>

<select name="employee" id="employee" onchange="getIPL(this.value);">
   <option value="">Select Employee</option>
</select>    
<script language = "javascript" />
<script>
function getIPL(id)
    {
            $.ajax({
                       type: "GET",
                       url: "jitem.php",
                       data: "EmpID =" + id,
                       success: function(result){
                         $("#somewhere").html(result);
                       }
                     });
    };


 // Empleave.php file....
  if(isset($_GET['EmpID'])){
     GetTotalPL($_GET['EmpID']);
 }

 function GetTotalPL($id){
  // do your calculation...
}
</script>
</body></html>
