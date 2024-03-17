<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client;
$collection = $client->dbforlab->library;
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form action="result.php" method="post">
        <div class="container">
            <div class="block">
                <p>Література видавництва</p>
                <select class="text-area" name="text1">
                    <?php
                    $distinctPublishers = $collection->distinct("publisher");
                    foreach ($distinctPublishers as $publisher) {
                        echo "<option value='" . $publisher . "'>" . $publisher . "</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="saveButton1">Зберегти зміни</button>
            </div>
            <div class="block">
                <p>Література опублікована за період</p>
                <input type="date" class="text-area" name="text2">
                <input type="date" class="text-area" name="text3">
                <button type="submit" name="saveButton2">Зберегти зміни</button>
            </div>
            <div class="block">
                <p>Література автора</p>
                <select class="text-area" name="text4">
                    <?php
                    $distinctAuthors = $collection->distinct("authors");
                    foreach ($distinctAuthors as $author) {
                        echo "<option value='" . $author . "'>" . $author . "</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="saveButton3">Зберегти зміни</button>
            </div>
        </div>
    </form>
    <script src="index.js"></script>
</body>

</html>