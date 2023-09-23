<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="radio"], select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .submit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .result-container {
            display: none;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }
    </style>
    <script>
        function showResult() {
            document.getElementById("form-container").style.display = "none";
            const lastname = document.getElementById("lastname").value;
            const firstname = document.getElementById("firstname").value;
            const gender = document.querySelector('input[name="sex"]:checked').value;
            const department = document.getElementById("department").value;
            const campus = document.getElementById("campus").value;
            const seminars = Array.from(document.querySelectorAll('input[name="seminar"]:checked')).map(input => input.value).join(", ");
            const comments = document.getElementById("comments").value;

            const resultContainer = document.getElementById("result-container");
            resultContainer.innerHTML = `
                <h2>Registration Details:</h2>
                <p>Last Name: ${lastname}</p>
                <p>First Name: ${firstname}</p>
                <p>Gender: ${gender === "1" ? "Female" : "Male"}</p>
                <p>Department: ${department}</p>
                <p>Campus: ${campus}</p>
                <p>Seminars/Workshops Attended: ${seminars}</p>
                <p>Comments and Suggestions: ${comments}</p>
            `;

            resultContainer.style.display = "block";
        }
    </script>
</head>
<body>
    <div class="form-container" id="form-container">
        <h2>Registration Form</h2>
        <form onsubmit="event.preventDefault(); showResult();">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname"><br>

            <label for="firstname">First Name:</label> 
            <input type="text" name="firstname" id="firstname"><br>

            <label>Sex:</label>
            <input type="radio" name="sex" value="1" id="female"><label for="female">Female</label>
            <input type="radio" name="sex" value="0" id="male"><label for="male">Male</label><br>

            <label for="department">Department:</label>
            <select id="department" name="department">
                <option value="science">Science</option>
                <option value="arts">IT</option>
                <option value="engineering">Engineering</option>
            </select><br><br>

            <label for="campus">Campus:</label>
            <select id="campus" name="campus">
                <option value="Asingan">Asingan Campus</option>
                <option value="Urdaneta City Campus">Urdaneta City Campus</option>
                <option value="Sta, Maria Campus">Sta. Maria Campus</option>
            </select><br><br>

            <label>Seminars/Workshops Attended:</label><br>
            <input type="checkbox" name="seminar" value="Web Marketing" id="Web Marketing"><label for="Web Marketing">Web Marketing</label><br>
            <input type="checkbox" name="seminar" value="AI and Youth Employment" id="AI and Youth Employment"><label for="AI and Youth Employment">AI and Youth Employment</label><br>
            <input type="checkbox" name="seminar" value="Anti-Bullying Activities and Tips." id="Anti-Bullying Activities and Tips."><label for="Anti-Bullying Activities and Tips.">Anti-Bullying Activities and Tips.</label><br>
         
            <label for="comments">Comments and Suggestions:</label><br>
            <textarea id="comments" name="comments" rows="4" cols="30"></textarea><br>

            <input type="submit" class="submit-button" value="Submit">
        </form>
    </div>
    
    <div class="result-container" id="result-container"></div>
</body>
</html>

