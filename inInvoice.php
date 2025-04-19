
 <html>
    <head>
        <title>Invoice</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f4f4f4;
            }
            .container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background: white;
                border-radius: 10px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }
            h1, h2, p {
                text-align: center;
                color: #333;
            }
            .buttons {
                display: inline-block;
                padding: 10px 20px;
                margin: 10px;
                font-size: 16px;
                color: white;
                background-color: #4CAF50;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
            }
            .buttons.red {
                background-color: #f44336;
            }
            .buttons:hover {
                opacity: 0.9;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Invoice</h1>
            <h2 id="paymentAmount">Loading...</h2>
            <p id="paymentDetails">Loading details...</p>
            <p>Date: <span id="date"></span></p>
            <button class="buttons" onclick="printInvoice()">Print Invoice</button>
            <button class="buttons red" onclick="goBack()">Continue to sign up</button>
        </div>
    
        <script>
            
            function displayInvoice() {
                
                const urlParams = new URLSearchParams(window.location.search);
                const paymentValue = urlParams.get('payment');
    
               
                let paymentDetails = '';
                if (paymentValue === '10') {
                    paymentDetails = "Monthly Subscription (1 Month)";
                } else if (paymentValue === '100') {
                    paymentDetails = "Yearly Subscription (12 Months)";
                } else {
                    paymentDetails = "Unknown payment plan.";
                }
    
               
                document.getElementById('paymentAmount').textContent = `Amount Paid: $${paymentValue}`;
                document.getElementById('paymentDetails').textContent = paymentDetails;
    
               
                document.getElementById('date').textContent = new Date().toLocaleString();
            }
    
           
            function printInvoice() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

   
    const paymentAmount = document.getElementById('paymentAmount').textContent;
    const paymentDetails = document.getElementById('paymentDetails').textContent;
    const date = document.getElementById('date').textContent;

    doc.setFont("Helvetica", "bold");
    doc.setFontSize(20);
    doc.text("Payment Invoice", 20, 20);

    doc.setFontSize(12);
    doc.setFont("Helvetica", "normal");
    doc.text(paymentAmount, 20, 40);
    doc.text(paymentDetails, 20, 50);
    doc.text(`Date: ${date}`, 20, 60);

    
    doc.save("Invoice.pdf");

    
}

    
            
            function goBack() {
                window.location.href = "signup.php";
            }
            
            saveInvoice();
         
            displayInvoice();

            async function saveInvoice() {
    try {
        const response = await fetch('save_invoice.php', {
            method: 'POST'
        });

        const result = await response.text();
        console.log(result); 
    } catch (error) {
        console.error('Error saving invoice:', error);
    }
}

        </script>
        
    </body>
    </html>
    