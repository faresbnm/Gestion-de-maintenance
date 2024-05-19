<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polite Jokes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #joke-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        #get-joke-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #get-joke-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="joke-container">
        <!-- Polite joke will be displayed here -->
    </div>

    <button id="get-joke-btn">Get Polite Joke</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch a polite joke
            function getPoliteJoke() {
                $.ajax({
                    url: "https://official-joke-api.appspot.com/random_joke",
                    method: "GET",
                    success: function(data) {
                        // Display the polite joke with fade-in effect
                        $("#joke-container").html("<p>" + data.setup + "</p><p>" + data.punchline + "</p>").css({opacity: 0}).animate({opacity: 1}, 500);
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error('There was a problem with the fetch operation:', error);
                        $("#joke-container").html("<p>Error fetching polite joke. Please try again later.</p>");
                    }
                });
            }

            // Event listener for the button click
            $("#get-joke-btn").click(function() {
                getPoliteJoke();
            });

            // Fetch a polite joke on page load
            getPoliteJoke();
        });
    </script>
</body>
</html>
