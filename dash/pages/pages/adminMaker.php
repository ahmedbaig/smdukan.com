<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
    header('location: ../../.././404.html');
} else if (isset($_SESSION['logged']) || $_SESSION['logged'] == true) {
    require('../scripts/acceptor.php');
    ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form id="form">
						<div class="card-content col-md-12">
							<h4 class="card-title">New User Maker</h4>
							<div class="form-group label-floating is-empty">
								<label class="control-label">Username</label>
								<input type="text" id="Username" class="form-control" value="" autocomplete="off"
								       data-toggle="tooltip" data-placement="top"
								       title="This username is required in-order to gain access to the admin section."
								       required>
								<span class="help-block">Enter username.</span>
							</div>
							<div class="form-group label-floating is-empty">
								<label class="control-label">New Password</label>
								<input type="password" id="NewPass" class="form-control" value="" autocomplete="off"
								       data-toggle="tooltip" data-placement="top"
								       title="This password is required in-order to gain access to the admin section"
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
							<div class="form-group label-floating is-empty">
								<label class="control-label">First Name</label>
								<input type="text" id='firstname' class="form-control" value="" required>
								<span class="help-block">Enter first name.</span>
							</div>
							<div class="form-group label-floating is-empty">
								<label class="control-label">Last Name</label>
								<input type="text" id='lastname' class="form-control" value="" required>
								<span class="help-block">Enter last name.</span>
							</div>
							<div class="form-group label-floating is-empty">
								<label class="control-label">Job Title</label>
								<input type="text" id='jobtitle' class="form-control" value="" required>
								<span class="help-block">Enter job title.</span>
							</div>
							<div class="container-fluid">
								<div class="form-inline col-md-12 clearfix">
									<div class="col-md-4">
										<div class="form-group label-floating">
											<label class="control-label">Access Level</label>
											<input type="number" id='access' class="form-control" value="0"
											       data-toggle="tooltip" data-placement="top"
											       title="You can enter either 0 -(Standard Access) or 1 -(VIP Access). Default is 0"
											       required>
											<span class="help-block">Enter access privelages.</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label">CNIC Number</label>
											<input type="text" id='cnic' class="form-control" value=""
											       required>
											<span class="help-block">Enter CNIC number.</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Phone Number</label>
											<input type="text" id='phone' class="form-control" value=""
											       required>
											<span class="help-block">Enter phone number.</span>
										</div>
									</div>
								</div>
							</div>
							<div class="content text-center">
								<input type="submit" class="btn btn-success" name='submit' id="submitToData"
								       value="Insert">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
        $(document).ready(function () {
            $('#form').submit(function (e) {
                e.preventDefault();
                return false;
            });
        });
	</script>
	<script>
        $(document).ready(function () {
            $('#submitToData').click(function () {
                var $user = $('#Username').val();
                var $reenter = $('#ReEnterPass').val();
                var $firstname = $('#firstname').val();
                var $lastname = $('#lastname').val();
                var $job = $('#jobtitle').val();
                var $access = $('#access').val();
                var $cnic = $('#cnic').val();
                var $phone = $('#phone').val();
                var $date = new Date();
                var $entries = 0;
                if (
                    parseInt($user.length) !== 0
                    && parseInt($reenter.length) !== 0
                    && parseInt($firstname.length) !== 0
                    && parseInt($lastname.length) !== 0
                    && parseInt($job.length) !== 0
                    && parseInt($access.length) !== 0
                    && parseInt($cnic.length) !== 0
                    && parseInt($phone.length) !== 0
                ) {
                    $.post("scripts/insertuser.php",
                        {
                            id: 10,
                            username: $user,
                            firstname: $firstname,
                            lastname: $lastname,
                            password: $reenter,
                            designation: $job,
	                        totalEntries: $entries,
	                        joinDate: $date,
                            CNIC: $cnic,
                            PhoneNo: $phone,
                            access: $access
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
                        }
                    );
                }
            });
        });
	</script>
	<script>
        $(document).ready(function () {
            $('#Username').blur(function () {
                var $user = $(this).val();
                <?php
                $sql = "SELECT * FROM Admins";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                ?> if ($user === '<?php echo $row[1];?>') {
                    $(this).val('').attr('placeholder', 'Username already taken');
                }
                <?php
                }
                } else {
                echo 'Script Error';
            }
                ?>
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
                }
            });
        });
	</script>
	<script>
        $(document).ready(function () {
            $('#NewPass').keyup(function () {
                var $newpass = parseInt($(this).val().length);
                if ($newpass > 0) {
                    $('#ReEnterPass').removeAttr('disabled');
                } else if ($newpass === 0) {
                    $('#ReEnterPass').attr('disabled', 'disabled');
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
}
?>