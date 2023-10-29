<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .list-group {
            display: flex;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            color: black;
            border-radius: 0.25rem;
        }
    </style>
</head>

<body class="body-pd mt-5">
    <div class="main-content">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_purchase_items">
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-4"></div>
            <div class="col-lg-6 col-md-4 col-sm-4">
                <div class="card-footer">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total
                            Quantity:
                            <strong id="quantity"> 0 </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total:
                            <strong id="price_without_vat"> 0 </strong>
                        </li>

                    </ul> <br>

                    <label>Pay By</label> <select class="form-control" id="cash_type">
                        <option value="Cash">Cash</option>

                        <option value="Online">Online</option>
                    </select> <br>
                    </form>
                    <button class="btn btn-success" id="printButton">Submit</button>
                </div>
            </div>
        </div>
        <div class="row mt-3" id="show_products" style="background: white;">
        </div>
    </div>

    </div>
</body>

</html>


<script>
    var user_name = "<?= $_SESSION['username'] ?>"
</script>