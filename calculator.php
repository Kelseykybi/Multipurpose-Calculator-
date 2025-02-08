<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title> Multipurpose Calculator</title>  
    <style>  
        body {  
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Playful font */  
            background-color: #f4e1e9; /* Soft pastel background */  
            display: flex;  
            align-items: center;  
            justify-content: center;  
            height: 100vh;  
            margin: 0;  
        }  
        .calculator {  
            background-color: #ffffff; /* White background for the calculator */  
            padding: 20px;  
            border-radius: 15px; /* Rounded corners */  
            box-shadow: 0 0 20px rgba(0,0,0,0.1);  
            width: 350px; /* Width for better spacing */  
        }  
        .title {  
            text-align: center;  
            font-size: 24px;  
            color: #d24d63; /* Soft coral color for the title */  
            margin-bottom: 10px;  
        }  
        .display {  
            background-color: #ffe6e9; /* Soft pink background for the display */  
            color: #3a2c3a; /* Dark grey text color for contrast */  
            padding: 20px;  
            font-size: 28px;  
            text-align: right;  
            border-radius: 10px;  
            margin-bottom: 20px;  
        }  
        .button {  
            width: 70px;  
            height: 70px;  
            margin: 5px;  
            border: none;  
            border-radius: 15px; /* Rounded buttons */  
            font-size: 24px;  
            cursor: pointer;  
            transition: background-color 0.3s;  
            background-color: #d2b5c5; /* Muted pink for buttons */  
            color: white;  
        }  
        .button:hover {  
            background-color: #c49ca5; /* Darker muted pink on hover */  
        }  
        .operator {  
            background-color: #c67d94; /* Darker muted pink for operator buttons */  
        }  
        .result {  
            background-color: #e2b2c6; /* Lighter coral for the result button */  
        }  
        .clear {  
            background-color: #d48bb4; /* Lighter pink for the clear button */  
        }  
        .row {  
            display: flex;  
            justify-content: center;  
        }  
    </style>  
</head>  
<body>  
    <div class="calculator">  
        <div class="title">Kybi's Multipurpose Calculator</div> <!-- Heading added -->  
        <div class="display" id="display">0</div>  
        <div class="row">  
            <button class="button" onclick="appendValue('7')">7</button>  
            <button class="button" onclick="appendValue('8')">8</button>  
            <button class="button" onclick="appendValue('9')">9</button>  
            <button class="button operator" onclick="setOperation('/')">/</button>  
        </div>  
        <div class="row">  
            <button class="button" onclick="appendValue('4')">4</button>  
            <button class="button" onclick="appendValue('5')">5</button>  
            <button class="button" onclick="appendValue('6')">6</button>  
            <button class="button operator" onclick="setOperation('*')">*</button>  
        </div>  
        <div class="row">  
            <button class="button" onclick="appendValue('1')">1</button>  
            <button class="button" onclick="appendValue('2')">2</button>  
            <button class="button" onclick="appendValue('3')">3</button>  
            <button class="button operator" onclick="setOperation('-')">-</button>  
        </div>  
        <div class="row">  
            <button class="button" onclick="appendValue('0')">0</button>  
            <button class="button clear" onclick="clearDisplay()">C</button>  
            <button class="button result" onclick="calculate()">=</button>  
            <button class="button operator" onclick="setOperation('+')">+</button>  
        </div>  
        <div class="row">  
            <button class="button operator" onclick="setOperation('**')">x^y</button> <!-- Exponential button -->  
            <button class="button operator" onclick="calculatePercentage()">x%</button> <!-- Percentage button -->  
            <button class="button operator" onclick="calculateSquareRoot()">√x</button> <!-- Square root button -->  
            <button class="button operator" onclick="calculateLog()">log</button> <!-- Logarithm button -->  
        </div>  
    </div>  

    <script>  
        let display = document.getElementById('display');  
        let currentInput = '';  
        let operation = null;  

        function appendValue(value) {  
            if (currentInput.length < 10) {  
                currentInput += value;  
                display.innerText = currentInput;  
            }  
        }  

        function setOperation(op) {  
            if (currentInput === '') return;  
            operation = op;  
            currentInput += ' ' + op + ' ';  
            display.innerText = currentInput;  
        }  

        function clearDisplay() {  
            currentInput = '';  
            display.innerText = '0';  
        }  

        function calculate() {  
            try {  
                // Evaluate exponentiation, replace '**' with '^'  
                let result = eval(currentInput.replace(/\*\*/g, '^'));  
                clearDisplay();  
                display.innerText = result;  
                currentInput = result.toString();  
            } catch (e) {  
                display.innerText = 'Error';  
            }  
        }  

        function calculatePercentage() {  
            try {  
                if (currentInput === '') return;  
                let result = eval(currentInput) / 100;  
                clearDisplay();  
                display.innerText = result;   
                currentInput = result.toString();  
            } catch (e) {  
                display.innerText = 'Error';  
            }  
        }  

        function calculateSquareRoot() {  
            try {  
                if (currentInput === '') return;  
                let result = Math.sqrt(eval(currentInput));  
                clearDisplay();  
                display.innerText = result;   
                currentInput = result.toString();  
            } catch (e) {  
                display.innerText = 'Error';  
            }  
        }  

        function calculateLog() {  
            try {  
                if (currentInput === '') return;  
                let result = Math.log10(eval(currentInput)); // Logarithm base 10  
                clearDisplay();  
                display.innerText = result;   
                currentInput = result.toString();  
            } catch (e) {  
                display.innerText = 'Error';  
            }  
        }  
    </script>  
</body>  
</html>