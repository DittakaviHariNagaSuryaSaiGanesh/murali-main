// localStorage.setItem("u_id", 0)

if (!localStorage.getItem("u_id")) {
  // Set the data only if it doesn't exist
  localStorage.setItem("u_id", 0);
}
// alert("hello")
var show_products = document.getElementById("show_products");
var show_purchase_items = document.getElementById("show_purchase_items");
var quantity = document.getElementById("quantity");
var price_without_vat = document.getElementById("price_without_vat");
// var vat = document.getElementById("vat")
var product_name = document.getElementById("product_name");
var product_code = document.getElementById("product_code");
var product_price = document.getElementById("product_price");
var customFile = document.getElementById("customFile");
var add_new_product = document.getElementById("add_new_product");
var add_items = "";
var count = 1;
var printButton = document.getElementById("printButton");
var cash_type = document.getElementById("cash_type");

function generateUniqueId() {
  const today = new Date();
  const year = today.getFullYear().toString();
  const month = (today.getMonth() + 1).toString().padStart(2, "0");
  const date = today.getDate().toString().padStart(2, "0");
  const GET_UID = localStorage.getItem("u_id");
  const uniqueId = year + month + date + GET_UID;
  localStorage.setItem("u_id", parseInt(GET_UID) + 1);
  return uniqueId;
}

printButton.addEventListener("click", () => {
  const UID = generateUniqueId();
  // alert(UID);
  var names = [];
  var quantity = [];
  for (var i = 0; i < show_purchase_items.rows.length; i++) {
    var row = show_purchase_items.rows[i];
    if (row.cells.length > 0) {
      var name = row.cells[0].textContent;
      var q = row.cells[1].querySelector("input").value;
      // var user_name = "<?= $_SESSION['username'] ?>"
      names.push(name);
      quantity.push(q);
      var form = new FormData();
      form.append("function", "store_sales");
      form.append("name", row.cells[0].textContent);
      form.append("quantity", row.cells[1].querySelector("input").value);
      form.append("customer_code", UID);
      form.append("p_type", cash_type.value);
      form.append("user_name", user_name);

      var settings = {
        url: "http://localhost/murali-main/api.php",
        method: "POST",
        timeout: 0,
        processData: false,
        mimeType: "multipart/form-data",
        contentType: false,
        data: form,
      };

      $.ajax(settings).done(function (response) {
        console.log(response);
        show_purchase_items.innerHTML = ""
      });
      // alert(UID)
    }
  }

  // Output the names (you can do anything you want with the names)
  console.log(names);
  console.log(quantity);

  const receipt = generateReceipt();

  const printWindow = window.open("", "", "width=300,height=300");
  printWindow.document.open();
  printWindow.document.write(
    "<html><head><title>Babhi ka chat</title></head><body>"
  );
  printWindow.document.write(receipt);
  printWindow.document.write("</body></html>");
  printWindow.document.close();

  // Wait for the content to be fully loaded before printing
  printWindow.onload = function () {
    printWindow.print();
    printWindow.close();
  };

  function generateReceipt() {
    var receiptContent =
      " <h5> <center> Babhi ka chat<center></h5> <hr><table><thead> <tr> <td>Name</td><td>Qty</td><td>API</td></tr></thead><tbody>";
    var temp = 0;
    for (var i = 0; i < names.length; i++) {
      receiptContent +=
        "<tr> <td>" +
        names[i] +
        "</td><td>" +
        quantity[i] +
        "</td><td>" +
        30 * parseInt(quantity[i]) +
        "</td></tr>";
      temp += 30 * parseInt(quantity[i]);
    }

    receiptContent +=
      "</tbody></table><hr><p>total: " +
      temp +
      "</p> <p> Pay mode: " +
      cash_type.value +
      "</p>";

    return receiptContent;
  }
});

// console.log(show_products)

var form = new FormData();
form.append("function", "get_product_details");

var settings = {
  url: "api.php",
  method: "POST",
  timeout: 0,
  processData: false,
  mimeType: "multipart/form-data",
  contentType: false,
  data: form,
};

$.ajax(settings).done(function (response) {
  //   console.log(response);
  var obj = JSON.parse(response);
  console.log(obj);
  for (var i = 0; i < obj.length; i++) {
    show_products.innerHTML +=
      `<div class="col-lg-2 col-md-4 col-sm-6"><button
 class="btn btn-sm" onclick="addtocart('` +
      obj[i].product_name +
      `', '` +
      obj[i].product_price +
      `')">
    <div class="card"
        style="width: 8.5rem; margin-bottom: 5px;"><img
         src="` +
      obj[i].product_image +
      `"
            id="em_photo" class="card-img-top">
        <div class="card-body">
            <h6 class="card-title">` +
      obj[i].product_name +
      `</h6>
            <span
                class="badge badge-success"> Buynow </span>
        </div>
    </div>
</button></div>`;
  }
});

function addtocart(get_name, get_price) {
  // alert(get_id)
  // console.log(get_name, get_price)
  add_items =
    `<tr id="tr` +
    get_name +
    `">
                                <td class="name">` +
    get_name +
    `</td>
                                <td><input type="text" class="number" onchange="show_bill()"
                                         style="width: 15px;" id="count_` +
    get_name +
    `" value="1">
    
                                <td>` +
    get_price +
    `</td>
                                <td id="final_` +
    get_name +
    `">` +
    get_price +
    `</td>
                                <td><a class="btn btn-sm btn-primary" onclick="closetr('tr` +
    get_name +
    `')">
                                        <font color="#ffffff">X</font>
                                    </a></td>
                            </tr>`;
  show_purchase_items.innerHTML += add_items;
  var a = document.getElementById("count_" + get_name);
  var b = document.getElementById("final_" + get_name);
  show_bill();
  count += 1;
}

// function incrimentcount(count_name, final_name, get_price)
// {
//     // console.log(count_name, final_name)
//     var a = document.getElementById(count_name)
//     var b = document.getElementById(final_name)
//     a.value = parseInt(a.value) + 1
//     b.textContent = a.value * parseInt(get_price)
//     show_bill(b.textContent)
//     // console.log(a)
//     // console.log(b)
// }

// function decrimentcount(count_name, final_name, get_price)
// {
//     var a = document.getElementById(count_name)
//     var b = document.getElementById(final_name)
//     console.log(a.value)
//     if(a.value != "1")
//     {
//         a.value = parseInt(a.value) - 1
//         b.textContent -= parseInt(get_price)
//         // show_bill(a.value, b.textContent)
//         quantity.textContent = parseInt(quantity.textContent) - 1
//         price_without_vat.textContent = parseInt(quantity.textContent) * 30
//         var total = parseInt(price_without_vat.textContent) * 10 / 100
//         price_with_vat.textContent = parseInt(price_without_vat.textContent) + total
//     }
// }

function closetr(get_id) {
  var c = document.getElementById(get_id);
  console.log(c);
  c.innerHTML = "";
  show_bill();
}

function show_bill() {
  let sum = 0;
  var number = document.querySelectorAll(".number");
  // console.log(number)
  number.forEach((element) => {
    sum += parseInt(element.value);
  });
  // alert(sum)
  // console.log(total_quantity, sub_total)
  quantity.textContent = sum;
  price_without_vat.textContent = parseInt(quantity.textContent) * 30;
  // var total = parseInt(price_without_vat.textContent) * 10 / 100
  // price_with_vat.textContent = parseInt(price_without_vat.textContent) + total
}

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

// Function to generate a simple receipt
// function generateReceipt() {
//     const receiptContent = `
//         <h1>Receipt</h1>
//         <hr>
//         ${show_purchase_items.textContent}
//         <p>Thank you for your purchase!</p>
//     `;

//     return receiptContent;
// }

// // Function to open a new window with the receipt and print it
// function printReceipt() {
// const receipt = generateReceipt();

// const printWindow = window.open('', '', 'width=300,height=300');
// printWindow.document.open();
// printWindow.document.write('<html><head><title>Babhi ka chat</title></head><body>');
// printWindow.document.write(receipt);
// printWindow.document.write('</body></html>');
// printWindow.document.close();

// // Wait for the content to be fully loaded before printing
// printWindow.onload = function () {
//     printWindow.print();
//     printWindow.close();
// };
// }

// printButton.addEventListener('click', printReceipt);



/* --------------------------------------------------------------- */
/* -- Select the input when clicking inside the input container -- */
/* --------------------------------------------------------------- */
const dateContainers = document.querySelectorAll('.input-container');
dateContainers.forEach(dateContainer => {
  const dateInput = dateContainer.querySelector('.date-field');
  if (dateInput) {
    dateContainer.addEventListener('click', function (event) {
      dateInput.select();
    });
  }
});

/* ----------------------------------------------------------------------------- */
/* -- Automatically set the date for check-in (today) and checkout (tomorrow) -- */
/* ----------------------------------------------------------------------------- */
document.addEventListener("DOMContentLoaded", function () {
  const dateCheckin = document.getElementById("date-checkin");
  const dateCheckout = document.getElementById("date-checkout");
  const today = new Date(); 
  const tomorrow = new Date(today); tomorrow.setDate(tomorrow.getDate() + 1);
  dateCheckin.valueAsDate = today;
  dateCheckout.valueAsDate = tomorrow;
  dateCheckin.addEventListener("input", function () {
    const checkinDate = dateCheckin.valueAsDate;
    const checkoutDate = dateCheckout.valueAsDate;
    if (checkinDate > checkoutDate) {
      const newCheckoutDate = new Date(checkinDate);
      newCheckoutDate.setDate(newCheckoutDate.getDate() + 1);
      dateCheckout.valueAsDate = newCheckoutDate;
    }
  });
  dateCheckout.addEventListener("input", function () {
    const checkinDate = dateCheckin.valueAsDate;
    const checkoutDate = dateCheckout.valueAsDate;
    if (checkoutDate < checkinDate) {
      const newCheckinDate = new Date(checkoutDate);
      newCheckinDate.setDate(newCheckinDate.getDate() - 1);
      dateCheckin.valueAsDate = newCheckinDate;
    }
  });
});




/* -- TESTKIT BUTTON -- */
document.querySelector('.test').addEventListener('click', function () {
  const reservationBox = document.querySelector('.reservation-box');
  const button = document.querySelector('.test');
  reservationBox.classList.toggle('small');
  button.classList.toggle('small');
});