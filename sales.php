<?php

include("header.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        select#get_shope_name {
            padding: 20px;
            width: 100%;
            border: none;
            box-shadow: 1px 1px 10px 0px darkgray;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background: #DEE0E1;
            font-family: "Ubuntu", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 16px;
        }

        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            outline: none;
            user-select: none;
            -webkit-user-drag: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out, margin 0.3s ease;
            -webkit-transition: all 0.3s ease-in-out, margin 0.3s ease;
        }

        /* RESET FORM ELEMENTS */
        .input-container input[type="date"],
        .input-container input[type="text"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: transparent;
            border: none;
            outline: none;
            box-shadow: none;
        }

        /* INPUT CONTAINER  */
        .input-container {
            display: flex;
            flex-direction: column;
            width: auto;
            height: auto;
            min-width: 200px;
            background: #fff;
            filter: drop-shadow(0px 0px 3px #000);
            -webkit-filter: drop-shadow(0px 0px 3px #000);
            overflow: hidden;
            cursor: pointer;
            padding: 5px;
            height: 60px;
        }

        .input-container:hover,
        .input-container:focus,
        .input-container:active {
            transform: scale(1.1);
            -webkit-transform: scale(1.1);
        }

        .input-container label {
            position: relative;
            width: 100%;
            font-family: "Segoe UI";
            font-weight: 600;
            font-size: 11px;
            letter-spacing: 0.1em;
            line-height: 20px;
            color: #09f;
            margin-left: 2px;
            text-transform: uppercase;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .input-container input {
            position: relative;
            align-items: center;
            width: auto;
            height: auto;
            font-family: "Lekton", Arial, sans-serif;
            font-size: 16px;
            /* letter-spacing: 0.05em; */
            text-transform: uppercase;
            margin-left: 0px;
        }

        .input-container select {
            position: relative;
            align-items: center;
            width: auto;
            height: auto;
            font-family: "Lekton", Arial, sans-serif;
            font-size: 16px;
            /* letter-spacing: 0.05em; */
            text-transform: uppercase;
            margin-left: 0px;
        }

        /* BUTTON CONTAINER */
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: auto;
            min-width: 120px;
            height: 35px;
            padding: 1px;
            padding-bottom: 2px;
            /* background: #09f; */
            border-radius: 8px;
            filter: drop-shadow(0px 0px 3px #000);
            -webkit-filter: drop-shadow(0px 0px 3px #000);
            overflow: hidden;
            cursor: pointer;
        }

        .button-container:hover,
        .button-container:focus {
            background: #09f;
            filter: drop-shadow(0px 0px 3px #09f);
            -webkit-filter: drop-shadow(0px 0px 3px #09f);
        }

        /* -- button -- */
        .button-container .button {
            position: relative;
            width: 100%;
            min-height: 63px;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            background: #fff;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .button-container:hover .button:hover {
            background: #000;
            color: #fff;
        }

        .button-container:hover .button:active {
            background: #000;
            color: #fff;
            background: #09f;
            filter: drop-shadow(0px 0px 3px #09f);
            -webkit-filter: drop-shadow(0px 0px 3px #09f);
        }

        /* -- button ok -- */
        .button-container .button.ok {
            background: #bc0201;
            color: #fff;
        }

        .button-container:hover .button.ok:hover {
            background: #131313;
            color: #09f;
            text-shadow: 0px 0px 10px #09f;
            -webkit-text-shadow: 0px 0px 10px #09f;
        }

        .button-container:hover .button.ok:active {
            color: #fff;
            background: #09f;
            filter: drop-shadow(0px 0px 3px #000);
            -webkit-filter: drop-shadow(0px 0px 3px #000);
        }

        /* RESERVATION BOX */
        .reservation-box {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
            height: auto;
            border-radius: 7px;
            background-color: rgba(255, 255, 255, 1);

        }

        .reservation-box .static {
            position: relative;
            display: flex;
            align-items: center;
            float: left;
            width: auto;
            margin-right: 20px;
        }

        .reservation-box .flex {
            position: relative;
            display: flex;
            float: left;
            flex-direction: table;
            align-items: center;
            gap: 20px;
            width: auto;
        }

        .reservation-box .top {
            display: flex;
            flex-direction: table;
        }

        .reservation-box .bottom {
            position: relative;
            width: 100%;
            text-align: right;
        }

        .reservation-box .info {
            width: auto;
            color: #000;
            font-weight: 500;
            text-decoration: none;
            text-align: right;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .reservation-box .info:hover,
        .reservation-box .info:focus,
        .reservation-box .info:active {
            color: #000;
            border-bottom: 2px solid #09f;
        }

        /* RESERVATION BOX SMALL */
        .reservation-box.small,
        .reservation-box.small .flex {
            flex-direction: column;
        }

        .reservation-box.small .top {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .reservation-box.small .static {
            margin-right: 0px;
        }

        .reservation-box.small .bottom {
            text-align: center;
        }

        .reservation-box.small .button-container {
            min-width: 217px;
        }

        /* ------------ Testkit ------------ */
        .test {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 66px;
            height: 66px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid #000;
            border-radius: 50%;
            cursor: pointer;
        }

        .test svg {
            rotate: 0deg;
        }

        .test svg path {
            fill: #000;
        }

        .test:hover {
            background: rgba(255, 255, 255, 1);
        }

        .test.small svg {
            rotate: 90deg;
        }

        .container-1 {
            padding: 3rem;
            /* margin: 10px; */
        }
    </style>
</head>

<body class="body-pd">
    <div class="container-1" style="background: white;">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="reservation-box">
                    <div class="top">
                        <div class="static">
                            <select name="" id="get_shope_name" class="input-container">
                                <option value="shope1">shope1</option>
                                <option value="shope2">shope2</option>
                                <option value="shope3">shope2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="reservation-box">
                    <div class="top">
                        <div class="static">
                            <div class="input-container" id="date-picker-container">
                                <label for="date-from">Start</label>
                                <input type="date" id="date-checkin" class="date-field" name"date-from">
                            </div>
                        </div>
                        <div class="flex">
                            <div class="input-container" id="date-picker-container">
                                <label for="date-from">End</label>
                                <input type="date" id="date-checkout" class="date-field" name"">
                            </div>
                            <div class="button-container">
                                <span class="button ok" id="submit-btn">submit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test" title="Toggle reservation box size small/normal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="16" viewBox="0 0 36 14">
                        <rect id="switch" data-name="switch" width="36" height="14" rx="7" />
                    </svg>

                </div>
            </div>
        </div>
        <div class="row mt-5 container">
            <table class="table">
                <thead>
                    <th>Item</th>
                    <th>Cash</th>
                    <th>Online</th>
                    <th>Cash-Count</th>
                    <th>Online-Count</th>
                    <th>Total</th>
                </thead>
                <tbody id="show-table-data">
                    
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>

<script>
    var submit_btn = document.getElementById("submit-btn")
    var date_checkin = document.getElementById("date-checkin")
    var date_checkout = document.getElementById("date-checkout")
    var get_shope_name = document.getElementById("get_shope_name")
    var show_table_data = document.getElementById("show-table-data")
    function get_filter_data() {
        // alert(get_shope_name.value)
        var form = new FormData();
        form.append("function", "get_sales");
        form.append("start_date", date_checkin.value);
        form.append("end_date", date_checkout.value);
        form.append("shope", get_shope_name.value);

        var settings = {
            "url": "http://localhost/murali-main/api.php",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Cookie": "PHPSESSID=jkfgbdsh4962echkoelblmpnns"
            },
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
            var obj = JSON.parse(response)
            console.log(obj)
            var cash_sum = 0
            var online_sum = 0
            var total_sum = 0
            var cash_count = 0
            var online_count = 0
            show_table_data.innerHTML = ""
            for(let i = 0; i < obj.length; i++)
            {
                show_table_data.innerHTML += `<tr>
                        <td>${obj[i].item}</td>
                        <td>${obj[i].Cash}</td>
                        <td>${obj[i].Online}</td>
                        <td>${obj[i].Cash * 30}</td>
                        <td>${obj[i].Online * 30}</td>
                        <td>${parseInt(obj[i].Cash * 30) + parseInt(obj[i].Online * 30)}</td>
                    </tr>`
                    cash_sum += parseInt(obj[i].Cash * 30)
                    online_sum += parseInt(obj[i].Online * 30)
                    total_sum += parseInt(obj[i].Cash * 30) + parseInt(obj[i].Online * 30)
                    cash_count += parseInt(obj[i].Cash)
                    online_count += parseInt(obj[i].Online)
            }
            show_table_data.innerHTML += `<tr>
                        <td>Sum</td>
                        <td>${cash_count}</td>
                        <td>${online_count}</td>
                        <td>${cash_sum}</td>
                        <td>${online_sum}</td>
                        <td>${total_sum}</td>
                    </tr>`
        });

    }
    submit_btn.addEventListener("click", get_filter_data)
</script>