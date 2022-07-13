<?php

include_once 'fluent_db.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $query = $fluent->from('product')->where('id', $id);
    $row = $query->fetch();

    $pd_name = $row['pd_name'];
    $user_id = $row['user_id'];
    $pd_amount = $row['pd_amount'];
    $pd_price = $row['pd_price'];
}

?>


<div class="modal fade" id="updateProductModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="editProductForm" method="POST">

                <div class="modal-body">
                    <div class="row text-dark">
                        <input type="hidden" name="product_id" value="<?php echo $id ?>">


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input id="edit_product_name" name="edit_product_name" type="text" class="form-control" value="<?php echo $pd_name ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Product Amount</label>
                                <input id="edit_product_amount" name="edit_product_amount" type="text" class="form-control" value="<?php echo $pd_amount ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Product Price</label>
                                <input id="edit_product_price" name="edit_product_price" type="text" class="form-control" value="<?php echo $pd_price ?>">
                            </div>
                        </div>
                    </div>

                </div>


                <div class=" modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-success">Update Product</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>





<script>
    $(document).ready(function() {
        $("#editProductForm").submit(function(e) {
            e.preventDefault()


            var pd_name = $("#edit_product_name").val();
            var pd_amount = $("#edit_product_amount").val();
            var pd_price = $("#edit_product_price").val();


            if (pd_name == '' || pd_amount == '' || pd_price == '') {

                Swal.fire({
                    title: 'Error!',
                    text: 'Fill up the blank',
                    icon: 'warning',
                    confirmButtonText: 'Cool'
                })
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to edit this Product?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, edit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'edit_product.php',
                            type: 'POST',
                            cache: false,
                            data: $(this).serialize(),
                            success: function(data) {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Update Product Successfully',
                                    timer: 1500,
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
    })
</script>