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
        .container {
            background: white;
            padding: 20px;
        }
        label, input {
            padding: 10px;
        }
        button#add_new_product {
            background: #bc0201;
            color: white;
            padding: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body class="body-pd mt-5">
    <div class="container">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="product_name">Product Name: </label><br>    
                <input type="text" class="form-control" id="product_name" placeholder="Ex: Panipuri">
            </div>
            <div class="col-sm-6">
                <label for="product_code">Product Code: </label><br>
                <input type="text" class="form-control" id="product_code" placeholder="Ex: 23D118">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label for="product_code">Product Price: </label><br>
                <input type="text" class="form-control" id="product_price" placeholder="Ex: 23D118">
            </div>
            <div class="col-sm-6">
                <label for="get_img">Choose File: </label><br>
                <input type="file" class="form-control" id="get_img" placeholder="Choose File">
            </div>
        </div>
        <br>
        <div class="row">
            <button class="btn" id="add_new_product">Submit</button>
        </div>
    </div>
</body>

</html>


<script>
    add_new_product.addEventListener("click", () => {
  console.log(product_name.value);
  console.log(product_code.value);
  console.log(product_price.value);
  // console.log(customFile.value)

  var files = $("#get_img")[0].files[0];
  if (typeof files === "undefined") {
    // $("#file-msg").html("Please select CSV file!")
    return false;
  } else {
    // $("#file-msg").html("");
    console.log(files);
    var fd = new FormData();
    fd.append("product_image", files);
    fd.append("product_price", product_price.value);
    fd.append("product_code", product_code.value);
    fd.append("product_name", product_name.value);
    fd.append("function", "set_product_details");
    $.ajax({
      url: "api.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (response) {
        //alert(response);
        console.log(response);
      },
      beforeSend: function (d) {
        $(".modal-body").append("Please Wait...");
      },
    });
  }
});

</script>