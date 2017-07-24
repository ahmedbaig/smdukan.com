<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
    header('location: ../../.././404.html');
} else if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    $conn = null;
    require('../scripts/acceptor.php');
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM Admins WHERE username = '$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_array()) {
            ?>
	        <style>
				.content{  background-image: url("../assets/img/algo9.jpg");  background-repeat: no-repeat;  background-size: cover;  background-attachment: fixed;  }
				.content tr {box-shadow: 0px 11px 7px -7px rgba(0,0,0,0.5); transition: all 70ms ease-in-out;}
				.content tr:hover {box-shadow: 0px 16px 14px -3px rgba(0,0,0,0.5); }
				.text
				@media screen and (max-width:1024px) {  .content { background-attachment: scroll; background-size: cover;}  }
	        </style>
			<div id="back" class="container-fluid">
				<div class="row text-center">
					<div class="col-md-4 col-sm-3">

					</div>
					<div class="col-md-4 col-sm-5">
						<div class="card card-profile">
							<div class="card-avatar">
								<a target="_blank" href="<?php echo "scripts/showimage.php?id=$row[0]"; ?>"><?php
                                    if (empty($row[10])) {
	                                    echo '<img src="pages/avatar/admin.png"/>';
                                    } else {
                                        echo '<img height="67" width="67" style=" display: inline-block;" src="scripts/showimage.php?id=' . $row[0] . '"/>';
                                    }
                                    ?>
								</a>
							</div>
							<div class="card-content">
								<h6 class="category text-gray text-capitalize">
									<?php
										echo $row[5];
									?>
								</h6>
								<h4 class="card-title">
									<?php
										echo "<span class='text-capitalize'>".$row[3]." ".$row[4]."</span>"."<span class='text-gray'> (".$row[1].")</span>";
									?>
								</h4>
								<table class="table table-condensed">
									<tr>
										<td><strong>Job Title</strong></td>
										<td><?php echo $row[5];?></td>
									</tr>
									<tr>
										<td><strong>Access Level</strong></td>
										<td><?php
												if($row[13] == 0){
													echo "Standard";
												}else if($row[13] == 1){
													echo "VIP";
												}else if(empty($row[13])){
                                                    echo "Standard";
												}
											?></td>
									</tr>
									<tr>
										<td><strong>Total Entries</strong></td>
										<td><?php echo $row[6]; ?></td>
									</tr>
									<tr>
										<td><strong>Join Date</strong></td>
										<td><?php echo $row[7]?></td>
									</tr>
									<tr>
										<td><strong>CNIC</strong></td>
										<td><?php echo $row[8]?></td>
									</tr>
									<tr>
										<td><strong>Phone Number</strong></td>
										<td><?php echo $row[9]?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
        }
    }
}
?>