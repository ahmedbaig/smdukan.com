<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
    header('location: ../../.././404.html');
} else if (isset($_SESSION['logged']) || $_SESSION['logged'] == true) {
    require('../scripts/acceptor.php');
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM Admins WHERE username = '$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_array()) {
            ?>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<form method="post" action="" name="upload_data" enctype="multipart/form-data">
								<div class="card-content col-md-9 col-sm-9 ">
									<h4 class="card-title">User Details Editor</h4>
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input type="text" id='firstname' class="form-control"
										       value="<?php echo $row[3]; ?>" required>
										<span class="help-block">Enter your first name.</span>
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input type="text" id='lastname' class="form-control"
										       value="<?php echo $row[4]; ?>" required>
										<span class="help-block">Enter your last name.</span>
									</div>
									<div class="form-group label-floating is-empty ">
										<label class="control-label">Current Password</label>
										<input type="password" id='CurrentPass' autocomplete="off" class="form-control"
										       value="" required>
										<span class="help-block">Enter your current password.</span>
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">New Password</label>
										<input type="password" id="NewPass" class="form-control" disabled="disabled"
										       value="" autocomplete="off" data-toggle="tooltip" data-placement="top"
										       title="If New password is not set, the password will remain unchanged."
										       required>
										<span class="help-block">Enter new password.</span>
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Re-enter Password</label>
										<input type="password" id="ReEnterPass" autocomplete="off" class="form-control"
										       disabled="disabled"
										       value="" required>
										<span class="help-block">Re-enter new password.</span>
									</div>
									<div class="content text-center">
										<a class="btn btn-success" name='submit' id="submitToData">Update</a>
									</div>
								</div>
							</form>
							<form method="post" target="_blank" action="scripts/uploadimage.php" name="upload_img"
							      enctype="multipart/form-data">
								<div class="card-content text-center col-md-3 col-sm-3">
									<legend>Avatar</legend>
									<div class="fileinput fileinput-new text-center" data-provides="fileinput">
										<div class="fileinput-new thumbnail img-circle">
											<img height="67" width="67"
											     src="scripts/showimage.php?id=<?php echo $row[0]; ?>"
											     alt="profilePicture">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
										<div>
											<span class="btn btn-round btn-file">
												<span class="fileinput-new">Add Photo</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" id="upload-image" name="upload_image"/>
											</span>
											<br/>
											<input type="submit" class="btn btn-success btn-round fileinput-exists"
											       value="Upload" name="submit"
											       id="imageFile"/>
											<a class="btn btn-danger btn-round fileinput-exists"
											   data-dismiss="fileinput"><i
														class="fa fa-times"></i> Remove</a>
											<br/>
											<span id="label" class="label label-danger hidden"></span>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<script>
                $(document).ready(function () {
                    $('#CurrentPass').keyup(function () {
                        var $values = parseInt($(this).val().length);
                        if ($values > 0) {
                            $('#NewPass').removeAttr('disabled');
                            $('#ReEnterPass').removeAttr('disabled');
                        } else if ($values <= 0) {
                            $('#NewPass').attr('disabled', 'disabled');
                            $('#ReEnterPass').attr('disabled', 'disabled');
                        }
                    });
                });
			</script>
			<script>
                $(document).ready(function () {
                    $('#CurrentPass').blur(function () {
                        var $values = CryptoJS.MD5($('#CurrentPass').val());
                        if ($values != '<?php echo $row[2]; ?>') {
                            $(this).val('').attr('placeholder', 'Incorrect Password');
                            $('#NewPass').attr('disabled', 'disabled');
                            $('#ReEnterPass').attr('disabled', 'disabled');
                            $('#submitToData').addClass('disabled');
                        } else if ($values == '<?php echo $row[2]; ?>') {
                            $('#submitToData').removeClass('disabled');
                            $('#NewPass').removeAttribute('disabled');
                            $('#ReEnterPass').removeAttribute('disabled');
                        }
                    });
                });
			</script>
			<script>
                $(document).ready(function () {
                    $('#NewPass').keyup(function () {
                        var $newpass = parseInt($(this).val().length);
                        if ($newpass > 0) {
                            $('#submitToData').addClass('disabled');
                        } else {
                            $('#submitToData').removeClass('disabled');
                        }
                    });
                });
			</script>
			<script>
                $(document).ready(function () {
                    $('#ReEnterPass').blur(function () {
                        var $newPass = $('#NewPass').val();
                        var $again = $(this).val();
                        if ($newPass !== $again) {
                            $(this).val('').attr('placeholder', 'Passwords did not match');
                            $('#submitToData').addClass('disabled');
                        } else {
                            $('#submitToData').removeClass('disabled');
                        }
                    });
                });
			</script>
			<script>
                $(document).ready(function () {
                    $('#submitToData').click(function () {
                        var $text = $('.str').html;
                        if ($text !== "") {
                            $('.str').empty();
                        }
                        var $firstName = $('#firstname').val();
                        var $lastName = $('#lastname').val();
                        var $newPass = $('#NewPass').val();
                        if (parseInt($newPass.length) === 0) {
                            $.post("scripts/updateuser.php",
                                {
                                    id: <?php echo $row[0];?>,
                                    firstname: $firstName,
                                    lastname: $lastName,
                                    password: 'null_void(0)'
                                },
                                function (data, status) {
                                    var alert_ = {
                                        showSwal: function (type) {

                                            if (type === 'alert') {
                                                swal({
                                                    title: 'Server Response',
                                                    text: data + '\nStatus: ' + status,
                                                    buttonsStyling: false,
                                                    confirmButtonClass: "btn btn-success"
                                                });

                                            }
                                        }
                                    };
                                    alert_.showSwal('alert');
                                });
                        } else {
                            $.post("scripts/updateuser.php",
                                {
                                    id: <?php echo $row[0];?>,
                                    firstname: $firstName,
                                    lastname: $lastName,
                                    password: $newPass
                                },
                                function (data, status) {
                                    var alert_ = {
                                        showSwal: function (type) {

                                            if (type === 'alert') {
                                                swal({
                                                    title: 'Server Response',
                                                    text: data + '\nStatus: ' + status,
                                                    buttonsStyling: false,
                                                    confirmButtonClass: "btn btn-success"
                                                });

                                            }
                                        }
                                    };
                                    alert_.showSwal('alert');
                                });
                        }
                    });
                });
			</script>
			<script>
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
			</script>
			<script>

			</script>
            <?php
        } else {
            echo 'FATAL ERROR';
        }
    } else {
        echo 'Data not found';
    }
}
?>