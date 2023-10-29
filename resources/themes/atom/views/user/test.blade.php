<!DOCTYPE html>
<html>
<head>
    <title>Afbeeldingen Overzicht</title>
</head>
<body>
    <h1>Afbeeldingen Overzicht</h1>
    <table border="1">
        <tr>
            <th>Afbeelding</th>
            <th>Naam</th>
            <th>Datum toegevoegd</th>
        </tr>

        <?php
        $imageDirectory = 'pad/naar/afbeeldingen/'; // Vervang dit door het daadwerkelijke pad naar je afbeeldingen
        $imageFiles = scandir($imageDirectory);

        foreach ($imageFiles as $file) {
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'png', 'jpeg', 'gif'))) {
                $filePath = $imageDirectory . $file;
                $dateAdded = date("Y-m-d H:i:s", filemtime($filePath));

                echo '<tr>';
                echo '<td><img src="' . $filePath . '" width="100" height="100"></td>';
                echo '<td>' . $file . '</td>';
                echo '<td>' . $dateAdded . '</td>';
                echo '</tr>';
            }
        }
        ?>

    </table>
</body>
</html>