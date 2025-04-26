<html>

<head>
    <title>SIA: Users - View</title>
    <style>
        /* Style the whole table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style the header row using its class */
        .blog_view_head td {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            padding: 12px 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        /* Style all data rows */
        tr:not(.blog_view_head) td {
            padding: 10px 8px;
            border: 1px solid #ddd;
        }

        /* Alternate row color for readability */
        tr:not(.blog_view_head):nth-child(even) td {
            background-color: #f9f9f9;
        }

        /* Hover effect */
        tr:not(.blog_view_head):hover td {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <h1>Hello World!</h1>
    <div>

        <?php
        // Assuming $query is the result from a database query
        // If you want to display the data from a database result:
        // print_r($query); // Un-comment this if you want to see the array output
        
        // Example for displaying the data in a table
        if (!empty($query)) {  // Ensure that $query has data
            echo '<table>';
            echo '<tr class="blog_view_head">';
            echo '<td>Blog ID</td>';
            echo '<td>Message</td>';
            echo '<td>Author</td>';
            echo '<td>Date Posted</td>';
            echo '<td>Time Posted</td>';
            echo '</tr>';

            // Loop through $query and display the rows
            foreach ($query as $row) {
                echo '<tr>';
                echo "<td>{$row->id}</td>";
                echo "<td>{$row->blog_message}</td>";
                echo "<td>{$row->editor_name}</td>";
                echo "<td>{$row->date_posted}</td>";
                echo "<td>{$row->time_posted}</td>";
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No blog posts available.</p>';
        }
        ?>

    </div>
</body>

</html>