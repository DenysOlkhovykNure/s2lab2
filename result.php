<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client;
$collection = $client->dbforlab->library;
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <div class="block2">
    <table class="styled-table">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saveButton1"])) {
    $text = $_POST["text1"];
    echo '<th>Назва</th>';
    echo '<th>Рік публікації</th>';
    echo '<th>Автор(и)</th>';
    echo '<th>Кі-сть сторінок</th>';
    echo '<th>ISBN</th>';
    echo '<th>Номер</th>';
    $cursor = $collection->find(["publisher" => $text]); 
    foreach ($cursor as $document) {
        echo "<tr>";
        echo "<td>" . $document->title . "</td>";
        echo "<td>" . date('Y-m-d', $document->publication_year->toDateTime()->getTimestamp()) . "</td>";
        echo "<td>";
        if (!empty($document->authors)) {
            foreach ($document->authors as $author) {
                echo $author . "<br>";
            }
        } else {
            echo "No authors available";
        }
        echo "</td>";
        echo "<td>" . (!empty($document->pages) ? $document->pages : "-") . "</td>";
        echo "<td>" . (!empty($document->isbn) ? $document->isbn : "-") . "</td>";
        echo "<td>" . (!empty($document->issue_number) ? $document->issue_number : "-") . "</td>";
        echo "<tr>";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saveButton2"])) {
    $dateStart = date("Y-m-d", strtotime($_POST["text2"]));
    $dateEnd = date("Y-m-d", strtotime($_POST["text3"]));
    echo '<th>Назва</th>';
    echo '<th>Видавництво</th>';
    echo '<th>Рік публікації</th>';
    echo '<th>Автор(и)</th>';
    echo '<th>Кі-сть сторінок</th>';
    echo '<th>ISBN</th>';
    echo '<th>Номер</th>';
    $cursor = $collection->find([
    "publication_year" => [
        '$gt' => new MongoDB\BSON\UTCDateTime(strtotime($dateStart) * 1000),
        '$lt' => new MongoDB\BSON\UTCDateTime(strtotime($dateEnd) * 1000)
        ]
    ]);
    foreach ($cursor as $document) {
        echo "<tr>";
        echo "<td>" . $document->title . "</td>";
        echo "<td>" . $document->publisher . "</td>";
        echo "<td>" . date('Y-m-d', $document->publication_year->toDateTime()->getTimestamp()) . "</td>";
        echo "<td>";
        if (!empty($document->authors)) {
            foreach ($document->authors as $author) {
                echo $author . "<br>";
            }
        } else {
            echo "No authors available";
        }
        echo "</td>";
        echo "<td>" . (!empty($document->pages) ? $document->pages : "-") . "</td>";
        echo "<td>" . (!empty($document->isbn) ? $document->isbn : "-") . "</td>";
        echo "<td>" . (!empty($document->issue_number) ? $document->issue_number : "-") . "</td>";
        echo "<tr>";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saveButton3"])) {
    $text = $_POST["text4"];
    echo '<th>Назва</th>';
    echo '<th>Видавництво</th>';
    echo '<th>Рік публікації</th>';
    echo '<th>Автор(и)</th>';
    echo '<th>Кі-сть сторінок</th>';
    echo '<th>ISBN</th>';
    echo '<th>Номер</th>';
    $cursor = $collection->find(["authors" => $text]); 
    foreach ($cursor as $document) {
        echo "<tr>";
        echo "<td>" . $document->title . "</td>";
        echo "<td>" . $document->publisher . "</td>";
        echo "<td>" . date('Y-m-d', $document->publication_year->toDateTime()->getTimestamp()) . "</td>";
        echo "<td>";
        if (!empty($document->authors)) {
            foreach ($document->authors as $author) {
                echo $author . "<br>";
            }
        } else {
            echo "No authors available";
        }
        echo "</td>";
        echo "<td>" . (!empty($document->pages) ? $document->pages : "-") . "</td>";
        echo "<td>" . (!empty($document->isbn) ? $document->isbn : "-") . "</td>";
        echo "<td>" . (!empty($document->issue_number) ? $document->issue_number : "-") . "</td>";
        echo "<tr>";
    }
}
?>
</table>
</div>
</div>
</body>

</html>