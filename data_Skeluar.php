<?php require_once'connect.php';
$sn = strip_tags($_GET['sn']);
if($sn=="")
echo "Masukan Serial Number";
else{
    $query = "SELECT * FROM detailpengiriman where sn like '%$sn%'"; 
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
if($result->num_rows > 0){
while($rows= $result->fetch_assoc()){
extract($rows);
?>
                         
 <div class="x_content">
	
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead >
        <tr >
          <th style="text-align:center">No</th>
          <th style="text-align:center">Nomor Surat</th>                             
          <th style="text-align:center">Nama Barang</th>
          <th style="text-align:center">Serial Number</th>
          <th style="text-align:center">Penerima</th>
          <th style="text-align:center">Pengirim</th>
          <th style="text-align:center">Action</th>
        </tr>
      </thead>
      <tbody>
      	<?php  	
          $no = 1;

      		$result = $mysqli->query("SELECT * from detailpengiriman,tblbarang, tblpengiriman where tblbarang.matnr=detailpengiriman.matnr and detailpengiriman.no_surat=tblpengiriman.no_surat and detailpengiriman.sn like '%$sn%' ");
      		while ( $row = $result -> fetch_array()) {
      	?>
      	<tr style="text-align:center">
          <td><?php echo $no; ?></td>
          <td><?php echo $row['no_surat']; ?></td>
          <td><?php echo $row['nama_brg']; ?></td>
          <td><?php echo $row['sn']; ?></td>
          <td><?php echo $row['penerima']; ?></td>
          <td><?php echo $row['pengirim']; ?></td>                              
          <td>
            <a href="detail_barangKeluar.php?id=<?php echo $row['no_surat'];?>" class="btn btn-sm btn-success"  title="Detail"><span class="fa fa-search"></span></a>
          </td>
        </tr>

        <?php $no++;} ?>
      </tbody>
    </table>

<?php
;}
}else{
  echo "<h4 style='color:red'>Serial Number tidak ditemukan!</h4>";
}}?>