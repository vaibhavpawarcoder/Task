<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blodd-Bank Admin Login</title>
    <!-- Bootstap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <style>
        input {
            border: none !important;
            outline: none;
        }

        input:focus {
            outline: none;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid bg-light">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6 mt-5 p-5 rounded-4 bg-white ">
                <h1 class="fw-bolder">Sign in</h1>
                <div class="row">
                    <?php if (isset($validation)) : ?>
                        <div role="alert" id="errorMessage" class="alert bg-white text-danger border border-danger p-2 ">
                            <?= $validation->listErrors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-5 mt-5 order-lg-2 ">
                        <?= form_open();  ?>
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control  border-bottom border-dange" id="exampleFormControlInput1" placeholder="@example.com">
                        </div>
                        <div class="mb-4">
                            <input type="password" name="password" class="form-control  border-bottom border-dange" id="exampleFormControlInput1" placeholder="enter password">
                        </div>
                        <div class="mb-4">
                            <a href="<?= base_url() ?>Registration" class="text-dark mx-5">create account </a>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-outline-primary">Login</button>
                        </div>
                        <?= form_close();  ?>
                    </div>

                    <div class="col-md-5 mt-5 order-lg-1  p-3 ">
                        <img src="<?= base_url() ?>public/Images/Login.png" class="img-fluid" alt="registor" srcset="">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- bootstap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- alertify cdn -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
         setTimeout(function() {
            $('#errorMessage').fadeOut('fast');
        }, 2000); // <-- time in milliseconds
        <?php if (session()->getTempdata('status')) :  ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success(" <?= session()->getTempdata('status'); ?>");
        <?php endif; ?>
        // alertify.set('notifier', 'position', 'top-right');
        // alertify.success('Current position : ' + alertify.get('notifier', 'position'));
    </script>
</body>

</html>