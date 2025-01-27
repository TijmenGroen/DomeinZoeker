<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/index.css">
    <title>DomeinZoeker</title>
</head>

<body>
<div class="search-content">
        <div class="search-header">
            <h1>Domain Search</h1>
        </div>
        <div class="search-body">
            <div class="search-bar-container">
                <form action="resultPage.php" method="POST">
                    <label for="domain-name">Domain Name:</label>
                    <input type="text" name="domain-name" id="domain-name" class="search-bar" placeholder="Enter domain name">
                    
                    <label for="domain-extension">Domain Extension:</label>
                    <input type="text" name="domain-extension" id="domain-extension" class="search-bar" placeholder="Enter domain extension (e.g., com)">
                    
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="results-container">
                
            </div>
        </div>
    </div>
</body>
</html>