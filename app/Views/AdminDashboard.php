<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 m-5 p-5 text-center">
                <h1>Welcome, To Dashboared <?= $admin['Username']; ?></h1>
            </div>
            <div class="col-md-10">
                <a href="<?= base_url() ?>Logout" class="float-end  fw-bold">LogOut</a>
            </div>
            <div class="col-md-10">
                <p class="fs-3 fw-bold">List Of User</p>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile </th>
                                <th scope="col">Gender</th>
                                <th scope="col">DOB </th>
                                <th scope="col">Action </th>
                                <!-- <th scope="col">Activity</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $users) : ?>
                                <tr>
                                    <td scope="row" id="userinfo"><?= $users['ID']; ?></td>
                                    <td scope="row" id=""><?= $users['Username']; ?></td>
                                    <td scope="row" id=""><?= $users['Email']; ?></td>
                                    <td scope="row" id=""><?= $users['Mobile']; ?></td>
                                    <td scope="row" id=""><?= $users['Gender']; ?></td>
                                    <td scope="row" id=""><?= $users['DOB']; ?></td>
                                    <td scope="row" id="">
                                        <a href="<?= base_url() ?>viewUpdate/<?= $users['ID'] ?>" class="text-success" id="Update" class="text-success text-decoration-none m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="bi bi-pencil-square"></i></a>
                                        <a href="" id="removeUser" class="text-danger text-decoration-none m-1"> <i class="bi bi-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">User Details <span id="campIDs"></span> </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="submit_form" class="row g-3 needs-validation" novalidate>
                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                                <input type="hidden" name="campIDrecord" class="form-control" id="campIDrecord" placeholder="User Name" required>

                                            </div>
                                            <label for="validationCustom01" class="form-label"> Name</label>
                                            <input type="text" name="username" class="form-control" id="username" placeholder="User Name" required>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Email </label>
                                            <input type="text" name="organizename" class="form-control" id="email" placeholder="User Email" required>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Mobile </label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="User Mobile" required>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">User ID</label>
                                            <input type="text" name="IDuser" class="form-control" id="IDuser" placeholder="IDuser" readonly>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Gender </label>
                                            <input type="text" name="gender" class="form-control" id="gender" placeholder="User gender" required>

                                        </div>

                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">DOB </label>
                                            <input type="date" name="dob" class="form-control" id="dob" placeholder="User dob" required>

                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" id="updateinsert">Submit form</button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="res"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- alertify cdn -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- datatable cdn -->
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <script>
        let table = new DataTable('#myTable');

        $(document).ready(function() {

            //UserList
            userList();

            function userList() {
                $.ajax({
                    url: '<?php base_url() ?>userList',
                    type: "GET",
                    success: function(response) {
                        console.log(response)
                        // alert(response.status);
                        $.each(response, function(key, value) {
                            console.log(value['ID']);
                            // $('#campIDrecord').val(value['ID']);

                            // $('#username').val(value['Username']);
                            // $('#email').val(value['Email']);
                            // $('#mobile').val(value['Mobile']);
                            // $('#IDuser').val(value['UserID']);

                            // $('#gender').val(value['Gender']);
                            // $('#dob').val(value['DOB']);
                        });

                    }
                })
            }


            //View Detils of user in model
            $(document).on('click', '#Update', function(e) {
                e.preventDefault();
                var IDinfo = $(this).closest('tr').find('#userinfo').html();
                //alert(IDinfo);
                $.ajax({
                    url: '<?php base_url() ?>viewUpdate',
                    type: "POST",
                    data: {
                        IDinfo: IDinfo,
                    },
                    success: function(response) {
                        console.log(response)
                        // alert(response.status);
                        $.each(response, function(key, value) {
                            console.log(value['ID']);
                            $('#campIDrecord').val(value['ID']);

                            $('#username').val(value['Username']);
                            $('#email').val(value['Email']);
                            $('#mobile').val(value['Mobile']);
                            $('#IDuser').val(value['UserID']);

                            $('#gender').val(value['Gender']);
                            $('#dob').val(value['DOB']);
                        });

                    }
                })
            });

            //update change
            $(document).on('click', '#updateinsert', function(e) {
                //  e.preventDefault();
                var campIDrecord = $('#campIDrecord').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var mobile = $('#mobile').val();

                var gender = $('#gender').val();
                var dob = $('#dob').val();

                alert(gender + " " + campIDrecord)
                $.ajax({
                    url: '<?php base_url() ?>Updateuser',
                    type: "POST",
                    data: {
                        campIDrecord: campIDrecord,
                        username: username,
                        email: email,
                        mobile: mobile,
                        gender: gender,
                        dob: dob,
                    },
                    // dataType:"json",
                    success: function(response) {
                        console.log(response)
                        // alertify.set('notifier', 'position', 'top-right');
                        // alertify.success("Record Update Succesfully");
                        // // alert(response.status);
                        // $.each(response, function(key, value) {});

                    }
                })

            })

            //Remove user 
            $(document).on('click', '#removeUser', function(e) {
                
                var IDinfo = $(this).closest('tr').find('#userinfo').html();
                if (confirm("Are You Sure You Want To deleted Record ?")) {
                    alert(IDinfo);
                    $.ajax({
                        url: '<?php base_url() ?>remove',
                        type: "POST",
                        data: {
                            IDinfo: IDinfo,
                        },
                        success: function(response) {
                            console.log(response)

                        }
                    })
                }

            });

        })
    </script>
</body>

</html>