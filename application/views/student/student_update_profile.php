<?php $this->load->view('partial/header'); ?>
<link href="<?php echo base_url('assets'); ?>/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-2">&nbsp;</div>
                <div class="col-lg-8">
                    <div class="widget navy-bg text-center">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?php echo base_url('profile_pictures/' . $user->profile_pic); ?>"
                                     class="img-circle circle-border m-b-md" width="128px"
                                     alt="profile">
                            </div>
                            <div class="col-lg-8">
                                <div class="m-b-md">
                                    <h2 class="font-bold no-margins">
                                        <?= $user->first_name . " " . $user->last_name ?>
                                    </h2>
                                    <small><?= $position ?></small>
                                </div>
                                <h3 class="font-bold pull-left">E-Mail Address: <?= $user->email ?></h3>

                                <h3 class="font-bold pull-left">Contact Number: <?= $user->contact_no ?></h3>

                                <h3 class="font-bold pull-left">
                                    Address: <?= $student->address_1 . ", " . $student->address_2 . ", " . $student->city ?></h3>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-2">&nbsp;</div>
                <div class="col-lg-8">
                    <h2>Update Profile</h2>

                    <form method="post" id="update-user" class="dropzone form-horizontal"
                          action="<?= base_url('/index.php/users/update_profile') ?>" enctype="multipart/form-data">
                        <input type="text" name="id" class="hidden" hidden="hidden" value="<?= $user->id ?>"/>

                        <h3>Basic Details</h3>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">First Name</label>

                            <div class="col-sm-8">
                                <input name="first_name" required="" type="text" class="form-control"
                                       placeholder="First Name" value="<?= $user->first_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Last Name</label>

                            <div class="col-sm-8">
                                <input name="last_name" required="" type="text" class="form-control"
                                       placeholder="Last Name" value="<?= $user->last_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">E-Mail Address</label>

                            <div class="col-sm-8">
                                <input name="email" required="" type="text" class="form-control"
                                       placeholder="E-Mail Address" value="<?= $user->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Contact No.</label>

                            <div class="col-sm-8">
                                <input name="contact_no" required="" type="text" class="form-control"
                                       placeholder="Contact No."
                                       value="<?= $user->contact_no ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Address</label>

                            <div class="col-sm-8">
                                <input name="address_1" required="" type="text" class="form-control"
                                       placeholder="Address Line 1"
                                       value="<?= $student->address_1 ?>">
                                <input name="address_2" required="" type="text" class="form-control"
                                       placeholder="Address Line 2"
                                       value="<?= $student->address_2 ?>">
                                <input name="city" required="" type="text" class="form-control"
                                       placeholder="City"
                                       value="<?= $student->city ?>">

                            </div>
                        </div>
                        <h3>Change Password</h3>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Current Password</label>

                            <div class="col-sm-8">
                                <input name="password" type="password" required="" class="form-control"
                                       placeholder="Current Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">New Password</label>

                            <div class="col-sm-8">
                                <input name="new_password" type="password" class="form-control"
                                       placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Confirm New Password</label>

                            <div class="col-sm-8">
                                <input name="confirm_new_password" type="password" class="form-control"
                                       placeholder="Confirm New Password">
                            </div>
                        </div>
                        <h3>Change Profile Picture</h3>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">New Profile Picture</label>

                            <div class="col-sm-8">
                                <input type="file" name="profile_picture"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-outline pull-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<!-- Input Mask-->
<script src="<?php echo base_url('assets'); ?>/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $("#update-user").validate({

            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    minlength: 3,
                    email: true
                },
                contact_no: {
                    required: true,
                    number: true
                },
                password: {
                    required: true
                }


            }
        });

        var success = <?= $success ?>;

        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        switch (success) {
            case 0:
                break;
            case 1:
                toastr.success('Successfully Updated');
                break;
            case 2:
                toastr.error('Failed to update');
                break;
            case 3:
                toastr.error('Password Mismatch');
                break;
            case 4:
                toastr.error('Failed to authenticate you');
                break;
            case 5:
                toastr.error('Error in updating profile picture');
                break;
            default:
                toastr.error('Something went wrong');
        }
    });
</script>

</body>
</html>
