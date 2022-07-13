<?php
session_start();

include 'fluent_db.php';

if (!isset($_SESSION['user'])) {
    header("location: ../UserForm/index.php");
    exit();
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!--    google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <!--    icon scout cdn-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--    css file-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top">
                    <h1>Table of Products</h1>
                    <!--Start of Search-->
                    <section class="search__bar">
                        <div class="d-flex flex-row m">
                            <form action="" class="container search__bar-container m-2">
                                <div>
                                    <i class="uil uil-search"></i>
                                    <input type="search" name="" placeholder="Search" id="myInput">
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary okay" data-toggle="modal" data-target="#newProductModal">Create</button>
                        </div>
                    </section>
                    <!--End of Search-->
                </div>
                <table class='table'>
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Amount </th>
                            <th> Price </th>
                            <th> Modifier </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody id="mytb">
                        <?php

                        $joinQuery = $fluent->from('product')->select('user.name');

                        foreach ($joinQuery as $row) {


                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['pd_name'] ?></td>
                                <td><?= $row['pd_amount'] ?></td>
                                <td><?= $row['pd_price'] ?></td>

                                <td><?= $row['name'] ?></td>

                                <td>
                                    <button type="button" class="btn btn-warning mx-1 updateProduct" id=<?php echo $row['id'] ?>>Edit</button>
                                    <button type="button" class="btn btn-danger deleteProduct" id=<?php echo $row['id'] ?>>Delete</button>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="modal fade" id="newProductModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="newProductForm" method="POST">


                    <div class="modal-body text-dark">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input id="product_name" name="product_name" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Product Amount</label>
                                    <input id="product_amount" name="product_amount" type="text" class="form-control">
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input id="product_price" name="product_price" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-success">Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="display_product"></div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {


            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mytb tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


            $(document).on('click', '.updateProduct', function() {
                var id = $(this).attr('id');

                $("#display_product").html('');
                $.ajax({
                    url: 'viewProduct.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#display_product").html(data);
                        $("#updateProductModal").modal('show');
                    }
                })


            })





            $(document).on('click', '.deleteProduct', function() {
                var id = $(this).attr('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'deleteProduct.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Delete Product',
                                    timer: 1500,
                                    showConfirmButton: false,
                                }).then(() => {
                                    window.location.reload();
                                })
                            }
                        })
                    }
                })

            })

            $("#newProductForm").submit(function(e) {
                e.preventDefault();
                var product_name = $("#product_name ").val();
                var product_amount = $("#product_amount ").val();
                var product_price = $("#product_price ").val();

                if (product_name == '' || product_amount == '' || product_price == '') {

                    Swal.fire(
                        'Error',
                        'You clicked the button!',
                        'error'
                    )
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, added it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'add_product.php',
                                type: 'POST',
                                data: $(this).serialize(),
                                cache: false,
                                success: function(data) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Add Product successfully',
                                        icon: 'success',
                                        timer: 2000,
                                        showConfirmButton: false,
                                    }).then(() => {
                                        window.location.reload();
                                    })

                                }
                            })
                        }
                    })
                }
            })
        });
    </script>

</body>

</html>