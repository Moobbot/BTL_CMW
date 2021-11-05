<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include '../reuse/header.php' ?>

<?php include '../reuse/config.php' ?>

<?php
$id = $_GET['id']; //teach_learn_id
// echo $id;
?>

<div class="container-fluid bg-light h-100 p-0 m-0">
    <?php
    // BEGIN HEADER

    include '../reuse/header_body.php';

    // END HEADER
    ?>
    <!-- BEGIN CONTAINER -->

    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
    <?php
    if (empty($_SESSION['current_user'])) {
        header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
    ?>
    <?php
    } else {
        $currentUser = $_SESSION['current_user'];
    ?>
    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-lg-10 col-12">
            <!-- Thông báo -->
            <div class="row bg-warning">

                <table class="table mb-0">
                    <thead>
                        <h2 class="text-center">Thông báo</h2>
                    </thead>
                    <tbody>
                        <form method="POST" id="process_note">
                            <!-- Dữ liệu thay đổi theo CSDL -->

                            <?php
                                $sql = "SELECT `note_id`, `note_mes` FROM db_note WHERE teach_learn_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<th>';
                                        echo $row['note_mes'];
                                        echo '</th>';
                                ?>

                            <th class="col-md-1">
                                <!-- href="./process_edit_note.php?id=</?= $row['note_id'] ?>" -->
                                <button class="btn btn-success mb-md-0 mb-2" id="process_edit_note">Sửa</button>
                            </th class="col-md-1">
                            <th>
                                <!-- href="./process_delete_note.php?id=</?= $row['note_id'] ?>" -->
                                <button class="btn btn-success mb-md-0 mb-2" id="process_delete_note">Xóa</button>
                            </th>
                            <?php
                                    }
                                    echo '</tr>';
                                }
                                ?>

                            <tr>
                                <th class="col-11">
                                    <input type="text" id="note_mes" class="w-100" placeholder="Thông báo">
                                </th>
                                <th class="col-1">
                                    <input type="hidden" id="t_learn_id" value="<?php echo $id ?>">
                                    <input type="button" name="process_add_note" id="process_add_note" value="Insert"
                                        class="btn btn-success"></input>
                                </th>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>

            <!-- Bảng thông tin tài liệu -->
            <div class="row px-0 mx-0 mt-4">
                <div class="col-12">
                    <h2 class=" text-center">Tài liệu môn học</h2>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="col">
                                    STT
                                </th>
                                <th class="col">
                                    Tên tài liệu
                                </th>
                                <th class="col">
                                    Ngày đăng
                                </th>
                                <th class="col">
                                    Status
                                </th>
                                <th class="col"></th>
                                <th class="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu thay đổi theo CSDL -->
                            <?php
                                $id = $_GET['id'];
                                $sql = "SELECT `doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status` FROM `db_doc` WHERE teach_learn_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $STT = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $STT += 1;
                                        echo '<tr>';
                                        echo '<th scope="row">' . $STT . '</th>';
                                        echo '<td>' . '<a href="' . $row['doc_link'] . '">' . $row['doc_name'] . '</a>' . '</td>';
                                        echo '<td>' . $row['date_sub'] . '</td>';
                                        echo '<td>' . $row['status'] . '</td>';
                                        echo '<td>' . '<a href="' . '" class="btn btn-success">Sửa</a>' . '</td>';
                                        echo '<td>' . '<a href="' . '" class="btn btn-success">Xóa</a>' . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            <tr>
                                <th>
                                    <?= $STT += 1 ?>
                                </th>
                                <td>
                                    <input type="text" id="" placeholder="Tên tài liệu" class="text-center mb-2">
                                    <input type="text" id="" placeholder="Link tài liệu" class="text-center">
                                </td>
                                <td>
                                    <input type="text" id="" placeholder="Là ngày thêm" disabled class="text-center">
                                </td>
                                <td>
                                    <input type="text" id="" placeholder="Ghi chú" class="text-center">

                                </td>
                                <th>
                                    <a href="" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Comments của sinh viên-->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <div class="container">
      
    
    <!-- END CONTAINER -->
    
    <div class="container ">
    <h2 class="my-5" >Rating and review</h2>
    	<div class="card my-5">
    		
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
        <?php include '../subject/comment.php' ?>
    </div>
   
  
    <!-- BEGIN FOOTER -->

    <?php include '../reuse/footer_body.php' ?>

    <!-- END FOOTER -->

</div>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src='../assets/js/process_teacher.js'> </script>

<?php include '../reuse/footer.php' ?>