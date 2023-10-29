<!DOCTYPE html>
<html>
<head>
    <title>Receipt Printing</title>
</head>
<body>
    <button id="printButton">Print Receipt</button>
    
    <script>
        // Function to generate a simple receipt
        function generateReceipt() {
            const receiptContent = `
                <h1>Receipt</h1>
                <hr>
                <p></p>
                <p>Item 2: $15.00</p>
                <p>Total: $25.00</p>
                <p>Thank you for your purchase!</p>
            `;

            return receiptContent;
        }

        // Function to open a new window with the receipt and print it
        function printReceipt() {
            const receipt = generateReceipt();

            const printWindow = window.open('', '', 'width=600,height=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Babhi ka chat</title></head><body>');
            printWindow.document.write(receipt);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            // Wait for the content to be fully loaded before printing
            printWindow.onload = function () {
                printWindow.print();
                printWindow.close();
            };
        }

        // Add a click event listener to the "Print Receipt" button
        document.getElementById('printButton').addEventListener('click', printReceipt);
    </script>
</body>
</html>
<!-- <!DOCTYPE html>

<html>

<body>

<h2>The window.print() Method</h2>

<p>Click the button to print the current page.</p>

<button onclick=”window.print()”>Print this page</button>

</body>

</html> -->