<?php
include_once 'Class.dest.php';
$crud_destination = new destination();
?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Ajouter Destination</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
     <table class='table table-bordered table-responsive'>
     <tr>
     <th>Destination</th>
     <th>Libelle destination</th>
     <th>Nature du projet</th>
     <th>Responsable du projet</th>
     <th>Date de demarrage</th>
     <th>Durée</th>
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
  $query = "SELECT * FROM tbl_destination";       
  $records_per_page=3;
  $newquery = $crud_destination->paging($query,$records_per_page);
  $crud_destination->dataview($newquery);
  ?>
    <tr>
        <td colspan="7" align="center">
    <div class="pagination-wrap">
            <?php $crud_destination->paginglink($query,$records_per_page); ?>
         </div>
        </td>
    </tr>
 
</table>
   
       
</div>

<?php include_once 'footer.php'; ?>