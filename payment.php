/
<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/butons.css">
    <link rel="stylesheet" href="css/videobackground.css">
    <link rel="stylesheet" href="css/container.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", "sans-serif";
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(131, 131, 131, 0.259);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: relative;
            z-index: 2;
        }
        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            color: #fff;
            margin-bottom: 5px;
            display: block;
        }
        .payment-option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .payment-option input[type="radio"] {
            margin-right: 10px;
        }
        .buttons {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 25px;
            font-weight: bold;
            border: 2px solid #b0bc00;
            background: transparent;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .buttons span {
            background: #a59427;
            height: 100%;
            width: 0%;
            border-radius: 25px;
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: 0;
            transition: width 0.5s;
        }
        .buttons:hover span {
            width: 100%;
        }
        .buttons p {
            margin: 0;
        }
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
    </style> 
</head>
<body>
    <video class="video-background" src="Images/CinemaAnimatedVideoBackgroundLoop.mp4" autoplay loop muted></video>
    <div class="overlay"></div>

    <div class="container">
        <h1>Payment Options</h1>
        <form id="paymentForm" method="POST">
            <div class="form-group">
                <label>Select Payment Type:</label>
                <div class="payment-option">
                    <input type="radio" id="monthly" name="payment-type" value="10" required>
                    <label for="monthly">Monthly 10$</label>
                </div>
                <div class="payment-option">
                    <input type="radio" id="yearly" name="payment-type" value="100" required>
                    <label for="yearly">Yearly 100$</label>
                </div>
            </div>
            <button class="buttons" type="submit" id="payButton" style="margin-top: 10px;"><span></span><p>Pay</p></button>
        </form>
    </div>

    <script>
        // عند إرسال النموذج
        document.getElementById('paymentForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const selectedOption = document.querySelector('input[name="payment-type"]:checked');
            if (selectedOption) {
                const paymentValue = selectedOption.value;

                window.location.href = `inInvoice.php?payment=${encodeURIComponent(paymentValue)}`;
                
            } else {
                alert("Please select a payment option.");
            }
        });
    </script>
</body>
</html>
