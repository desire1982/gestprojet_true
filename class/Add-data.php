<?php
include_once 'Class.dest.php';
$ajout_destination = new destination();
if(isset($_POST['btn-save']))
{
 $destination = $_POST['destination'];
 $lib_destination = $_POST['lib_destination'];
 $nature_projet = $_POST['nat_prjt'];
 $resp_prjt = $_POST['resp_prjt'];
 $date_dem_prjt = $_POST['date_dem_prjt'];
 $duree_prjt = $_POST['duree_prjt'];
 
 if($ajout_destination->create($destination,$lib_destination,$nature_projet,$resp_prjt,$date_dem_prjt,$duree_prjt))
 {
  header("Location: add-data.php?inserted");
 }
 else
 {
  header("Location: add-data.php?failure");
 }
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
 ?>
    <div class="container">
 <div class="alert alert-info">
    <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
 </div>
 </div>
    <?php
}
else if(isset($_GET['failure']))
{
 ?>
    <div class="container">
 <div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
 </div>
 </div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

  
  <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>DESTINATION</td>
            <td><input type='text' name='destination' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>LIBELLE DESTINATION</td>
            <td><input type='text' name='lib_destination' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Nature du projet</td>
            <td><input type='text' name='nat_prjt' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Responsable du projet</td>
            <td><input type='text' name='resp_prjt' class='form-control' required></td>
        </tr>
        <tr>
            <td>Date de demarrage</td>
            <td><input type='text' name='date_dem_prjt' class='form-control' required></td>
        </tr>
        <tr>
            <td>Duree</td>
            <td><input type='text' name='duree_prjt' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
      <span class="glyphicon glyphicon-plus"></span> Creer destination
   </button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>