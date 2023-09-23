<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Courier, Helvetica, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 10px solid #ccc;
            border-radius: 5px;
            background-color: #495F75;
        }

        label {
            font-weight: medium;
            color: #fff;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .radio-label {
            color: #fff;
            margin-right: 20px;
        }

        .submit-button {
            background-color: #E66C2C;
            color: #FFE4C4;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #3EA99F;
        }

        .results-container {
            display: none;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        }

        .results-label {
            font-weight: bold;
            color: #333; 
        }

        .result-item {
            margin-bottom: 10px;
        }

        .thank-you-message {
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
        }

        /* Responsive CSS */
        @media (max-width: 600px) {
            .form-container {
                width: 90%;
            }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Student Registration Form</h2>
        <form id="registration-form">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" required><br>

            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" required><br>

            <div>
                <label>Sex:</label>
                <label class="radio-label"><input type="radio" name="sex" value="1" id="female"> Female</label>
                <label class="radio-label"><input type="radio" name="sex" value="0" id="male"> Male</label>
            </div>

            <label for="department">School Department:</label>
            <select id="department" name="department">
                <option value="architecture"> BS Architecture</option>
                <option value="information technology">BS Information Technology</option>
                <option value="civil engineering">BS Civil Engineering</option>
            </select><br><br>

            <label for="campus">Campus:</label>
            <select id="campus" name="campus">
                <option value="Asingan">PSU Asingan Campus</option>
                <option value="Urdaneta City Campus">PSU Urdaneta City Campus</option>
                <option value="Sta, Maria Campus">PSU Sta. Maria Campus</option>
            </select><br><br>

            <label>Seminars/Workshops Attended:</label><br>
            <input type="checkbox" name="seminar" value="Web Marketing" id="Web Marketing"><label for="Web Marketing">Web Marketing</label><br>
            <input type="checkbox" name="seminar" value="AI and Youth Employment" id="AI and Youth Employment"><label for="AI and Youth Employment">AI and Youth Employment</label><br>
            <input type="checkbox" name="seminar" value="Anti-Bullying Activities and Tips." id="Anti-Bullying Activities and Tips."><label for="Anti-Bullying Activities and Tips.">Anti-Bullying Activities and Tips.</label><br>

            <label for="comments">Comments and Suggestions:</label><br>
            <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br>

            <input type="submit" class="submit-button" value="Submit">
        </form>
    </div>

    <div class="results-container" id="results">
        <h2>Registration Results</h2>
        <div class="results-label">Last Name:</div>
        <div id="result-lastname"></div>

        <div class="results-label">First Name:</div>
        <div id="result-firstname"></div>

        <div class="results-label">Sex:</div>
        <div id="result-sex"></div>

        <div class="results-label">School Department:</div>
        <div id="result-department"></div>

        <div class="results-label">Campus:</div>
        <div id="result-campus"></div>

        <div class="results-label">Seminars/Workshops Attended:</div>
        <div id="result-seminar"></div>

        <div class="results-label">Comments and Suggestions:</div>
        <div id="result-comments"></div>

        <div class="thank-you-message">
        Thank you for registering!
    </div>

    <script>
        document.getElementById("registration-form").addEventListener("submit", function (event) {
            event.preventDefault();
            displayResults();
        });

        function displayResults() {
            const form = document.getElementById("registration-form");
            const results = document.getElementById("results");

            document.getElementById("result-lastname").textContent = form.lastname.value;
            document.getElementById("result-firstname").textContent = form.firstname.value;

            const sex = form.querySelector('input[name="sex"]:checked').value === "1" ? "Female" : "Male";
            document.getElementById("result-sex").textContent = sex;

            document.getElementById("result-department").textContent = form.department.value;
            document.getElementById("result-campus").textContent = form.campus.value;

            const seminars = [];
            const seminarCheckboxes = form.querySelectorAll('input[name="seminar"]:checked');
            for (const checkbox of seminarCheckboxes) {
                seminars.push(checkbox.value);
            }
            document.getElementById("result-seminar").textContent = seminars.join(", ");

            document.getElementById("result-comments").textContent = form.comments.value;

            // Hide the form and display the results
            document.querySelector(".form-container").style.display = "none";
            results.style.display = "block";
        }
    </script>
</body>

</html>
