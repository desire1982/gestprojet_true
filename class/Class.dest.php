<?php
//require __DIR__ .'/dbcon_pdo.php';

include 'C:\wamp\www\GestProjet_true\config\dbcon_pdo.php';

echo __DIR__;


class destination {
	private $db;
 
  function __construct()
    {
        $this->db = DB();
    }
	
//CREATION DE LA FONCTION DE DESTINATION	
	public function create($dest,$lib_dest,$nat_prjt,$resp_prjt,$date_prjt,$duree_prjt)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO tbl_destination(destination,lib_destination,nature_projet,responsable_prjt,date_demarrage_prjt,duree_prjt) VALUES(:dest, :lib_dest, :nat_prjt, :resp_prjt, :date_prjt, :duree_prjt)");
   $stmt->bindparam(":dest",$dest);
   $stmt->bindparam(":lib_dest",$lib_dest);
   $stmt->bindparam(":nat_prjt",$nat_prjt);
   $stmt->bindparam(":resp_prjt",$resp_prjt);
   $stmt->bindparam(":date_prjt",$date_prjt);
   $stmt->bindparam(":duree_prjt",$duree_prjt);
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }
	
	
	 public function getID($id_dest)
 {
  $stmt = $this->db->prepare("SELECT * FROM tbl_destination WHERE destination=:id_dest");
  $stmt->execute(array(":id_dest"=>$id_dest));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }
	
	
	

/* paging */
 
 public function dataview($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                <td><?php print($row['destination']); ?></td>
                <td><?php print($row['lib_destination']); ?></td>
                <td>
				<?php if($row['nature_projet']=='1'){
					print "Nouveau";
					}elseif($row['nature_projet']=='2'){
				print "En cours";
					}else{
					print "Résilié";	
				//print($row['nature_projet']); 
				
				}?></td>
                <td><?php print($row['responsable_prjt']); ?></td>
                <td><?php print($row['date_demarrage_prjt']); ?></td>
                 <td><?php print($row['duree_prjt']); ?></td>
                <td align="center">
                <a href="edit-data.php?edit_id=<?php print($row['destination']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['destination']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
   }
  }
  else
  {
   ?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
  }
  
 }
 
 public function paging($query,$records_per_page)
 {
  $starting_position=0;
  if(isset($_GET["page_no"]))
  {
   $starting_position=($_GET["page_no"]-1)*$records_per_page;
  }
  $query2=$query." limit $starting_position,$records_per_page";
  return $query2;
 }
 
 public function paginglink($query,$records_per_page)
 {
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1'>First</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
   }
   ?></ul><?php
  }
 }
 
 /* paging */




 /* FIN DE CLASS DESTINATION */

}

?>

