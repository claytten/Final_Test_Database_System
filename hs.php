<?php
//isikan dengan query select data
include"action/koneksi.php";
session_start();
$id_user = $_SESSION['id_user'];
$output = '';
// $src_edit = 'edit_mahasiswa.php';
// $src_hapus = 'action/hapus_mahasiswa.php';
var_dump($_POST["query"]);
die();
if(isset($_POST["query"])) {
	$valu = filter_var($_POST['query'], FILTER_SANITIZE_STRING);
	$search = mysqli_real_escape_string($connect, $valu);
	$query = "
		  SELECT * FROM history 
		  WHERE id_user LIKE '%".$search."%'
		  OR name_github LIKE '%".$search."%' 
		  OR url LIKE '%".$search."%' 
		  OR date LIKE '%".$search."%'
	";
	var_dump($query);
	die();
} else {
	$query = "SELECT * from history WHERE id_user='$id_user' AND ORDER BY id";

}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		if($row > 0) {
			$output .= '
				<div class="az-mail-item unread">
                  <div class="az-mail-checkbox">
                    <label class="ckbox">
                      <input type="checkbox" name="ids[]" value="'.$row['id'].'">
                      <span></span>
                    </label>
                  </div><!-- az-mail-checkbox -->

                  <?php include"../../action/star_condition.php" ?>

                  <div class="az-img-user"><img src="'.$row['avatar'].'" alt=""></div>
                  <div class="az-mail-body">
                    <div class="az-mail-from">'date('d-m-Y', strtotime($row['date']) ).'</div>
                    <a href="'.$row['url'].'" target="_blank" title="">
                      <div class="az-mail-subject">
                      <strong>'.$row['name_github'].'</strong><br>
                      <span>'.$row['url'].'</span>
                    </div>
                    </a>
                  </div><!-- az-mail-body -->
                  <div class="az-mail-attachment"></div>
                  <div class="az-mail-date">'.date('H:i', strtotime($row['date']) ).'</div>
                </div><!-- az-mail-item -->
			';
		}
    }
    echo $output;
} else {
	echo 'Data Not Found';
}

?>