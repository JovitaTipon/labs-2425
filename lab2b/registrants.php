<?php
$csv_file = 'registrations.csv';
$opened_file_handler = fopen($csv_file, 'r');

if ($opened_file_handler !== false) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';

    if (($headers = fgetcsv($opened_file_handler)) !== false) {
        foreach ($headers as $header) {
            echo '<th>' . htmlspecialchars($header) . '</th>'; // Safely output headers
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while (($row = fgetcsv($opened_file_handler)) !== false) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo '<td>' . htmlspecialchars($cell) . '</td>'; // Safely output cell data
            }
            echo '</tr>';
        }
        echo '</tbody>';
    }
    echo '</table>';
    fclose($opened_file_handler);
} else {
    echo "Error: Unable to open the CSV file.";
}
?>
