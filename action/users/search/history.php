<?php
//isikan dengan query select data
include"../../koneksi.php";

session_start();
$id_user = $_SESSION['id_user'];

$output = '';
// $src_edit = 'edit_mahasiswa.php';
// $src_hapus = 'action/hapus_mahasiswa.php';
if(isset($_POST["query"]) != null ) {
	$valus= filter_var($_POST['query'], FILTER_SANITIZE_STRING);
	$search = mysqli_real_escape_string($connect, $valus);
  
	$query = "
		  SELECT * FROM history 
		  WHERE id_user LIKE '%".$search."%'
		  OR name_github LIKE '%".$search."%' 
		  OR url LIKE '%".$search."%' 
		  OR date LIKE '%".$search."%'
      ORDER BY date DESC
	";
} else {
	$query = "SELECT * from history WHERE id_user='$id_user' ORDER BY date DESC";
}

//get data star condition
ob_start();
include "../../star_condition.php";
$star_condition = ob_get_contents();
ob_end_clean();

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
			$output .= '
				        <div class="az-mail-item unread">
                  <div class="az-mail-checkbox">
                    <label class="ckbox">
                      <input type="checkbox" name="ids[]" value="'.$row['id'].'" id="get__checkbox">
                      <span></span>
                    </label>
                  </div><!-- az-mail-checkbox -->

                  '.$star_condition.'

                  <div class="az-img-user"><img src="'.$row['avatar'].'" alt=""></div>
                  <div class="az-mail-body">
                    <div class="az-mail-from">'.date('d-m-Y', strtotime($row['date']) ).'</div>
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

                <div id="modaldemo1" class="modal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                      <div class="modal-header">
                        <h6 class="modal-title">Bookmarks</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                          <form action="../../action/users/add_bookmarks.php" method="POST" accept-charset="utf-8">
                            <div class="modal-body">
                              <div class="m-b-20">
                                <input type="hidden" name="id" value="'.$row[id].'">
                                <label>Name Bookmark</label>
                                <input type="text" name="name_github" class="form-control" placeholder="Input Name Bookmark" value="'.$row['name_github'].'">
                                <input type="hidden" name="url_github" class="form-control" value="'.$row['url'].'" readonly>
                                <input type="hidden" name="avatar_github" class="form-control" value="'.$row['avatar'] .'" readonly>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-indigo" id="saved">Save</button>
                              <button type="button" class="btn btn-outline-light" id="closed" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                      
                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- modal -->
			';
  }
    echo $output;
} else {
	echo 'Data Not Found';
}

?>