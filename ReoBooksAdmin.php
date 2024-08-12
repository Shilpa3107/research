<?php
include "commonAdmin.php";
?>

<div class="main-content p-2 bg-purple-100 w-full overflow-hidden">
    <div class="main-content-inner">
        <nav class="p-3" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li>
                    <a href="index1.php" class="text-blue-400 hover:text-blue-700 flex items-center">
                        <i class="fa fa-home mr-2"></i>Home
                    </a>
                </li>
                <li>
                    <span class="mx-2 text-gray-700">/</span>
                </li>
                <li>
                    <a href="#" class="text-blue-400 hover:text-blue-700">Reports</a>
                </li>
                <li>
                    <span class="mx-2 text-gray-700">/</span>
                </li>
                <li class="text-blue-400">Books</li>
            </ol>
        </nav>
    </div>

    <style>
        .table-responsive {
            max-width: 1600px;
            margin: auto;
            max-height: 50rem;
            overflow-x: auto;
            border: 1px solid #ddd;
            background-color: white; /* Ensure the background is white */
        }

        /* Zebra striping for rows */
        #papersTable tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        #papersTable tbody tr:nth-child(even) {
            background-color: #eef2ff;
        }

        /* Style for table header */
        #papersTable thead {
            background-color: #9370DB; /* Tailwind blue-600 */
            color: white;
        }

        /* Button styling */
        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 0.375rem; /* Tailwind's rounded-md */
            transition: background-color 0.2s ease;
        }

        .btn-icon.edit {
            background-color: #60a5fa; /* Tailwind blue-400 */
        }

        .btn-icon.edit:hover {
            background-color: #3b82f6; /* Tailwind blue-600 */
        }

        .btn-icon.delete {
            background-color: #f87171; /* Tailwind red-400 */
        }

        .btn-icon.delete:hover {
            background-color: #ef4444; /* Tailwind red-600 */
        }

        .btn-icon i {
            font-size: 1.0rem; /* Adjust icon size */
            color: white;
        }
    </style>

    <div class="flex justify-center p-2 m-5">
        <div class="table-responsive p-2 rounded-md">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "scholarsphere";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $emp_id = $_SESSION['employee_id'];
            // SQL query to fetch data from the table
            $sql = "SELECT * FROM booksbyfaculty";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data in a table format
                echo '<table id="papersTable" class="min-w-full border-collapse bg-white border-gray-200 text-left">';
                echo '<thead>';
                echo '<tr>';
                echo '<th class="px-4 py-2">Edit</th>';
                echo '<th class="px-4 py-2">Delete</th>';
                echo '<th class="px-4 py-2">ID</th>';
                echo '<th class="px-4 py-2">University</th>';
                echo '<th class="px-4 py-2">Department</th>';
                echo '<th class="px-4 py-2">Faculty/Scientist</th>';
                echo '<th class="px-4 py-2">Employee ID</th>';
                echo '<th class="px-4 py-2">Author/s</th>';
                echo '<th class="px-4 py-2">Co-author</th>';
                echo '<th class="px-4 py-2">Chapter Title</th>';
                echo '<th class="px-4 py-2">Region</th>';
                echo '<th class="px-4 py-2">Publication Date</th>';
                echo '<th class="px-4 py-2">Publication Year</th>';
                echo '<th class="px-4 py-2">Volume</th>';
                echo '<th class="px-4 py-2">Page From</th>';
                echo '<th class="px-4 py-2">Page To</th>';
                echo '<th class="px-4 py-2">Listed in Scopus</th>';
                echo '<th class="px-4 py-2">Listed In</th>';
                echo '<th class="px-4 py-2">Listed in Web of Science</th>';
                echo '<th class="px-4 py-2">Peer Reviewed</th>';
                echo '<th class="px-4 py-2">ISSN</th>';
                echo '<th class="px-4 py-2">ISBN</th>';
                echo '<th class="px-4 py-2">Publisher</th>';
                echo '<th class="px-4 py-2">Institutional affiliation</th>';
                echo '<th class="px-4 py-2">Co-Author</th>';
                echo '<th class="px-4 py-2">Citation Index</th>';
                echo '<th class="px-4 py-2">Number of Citation</th>';
                echo '<th class="px-4 py-2">Evidence</th>';
                echo '<th class="px-4 py-2">Any Info</th>';
                echo '<th class="px-4 py-2">Reference</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="hover:bg-gray-100">';
                    echo '<td class="border px-4 py-2 text-center">
                            <a href="editReoBooks.php?id=' . $row['user_id'] . '" class="btn-icon edit">
                                <i class="fas fa-edit"></i>
                            </a>
                          </td>';
                    echo '<td class="border px-4 py-2 text-center">
                            <form method="post" action="deleteReoBooks.php">
                                <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                                <button type="submit" class="btn-icon delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                          </td>';
                    echo '<td class="border px-4 py-2">' . $row['user_id'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['University'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['Department'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['Faculty'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['Employee ID'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['other Author'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['Co-author'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['booktitle'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['region'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['pubdate'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['pubyear'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['volume'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['pagefrom'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['pageto'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['scopus'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['listedin'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['wos'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['peer'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['issn'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['isbn'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['pubname'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['affltn'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['corrauthor'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['citind'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['nocit'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['evdupload'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['othrinfo'] . '</td>';
                    echo '<td class="border px-4 py-2">' . $row['ref'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="text-gray-800 text-2xl">No Books found.</p><br><p class="text-gray-800 text-md">Once submitted, your entry will appear on the <a href="index1.php" class="text-blue-500">Dashboard</a> before approval. After it is approved, it will be visible here.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>
</div>
<?php
include "footer.php"?>
</body>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        // Make the table interactive with DataTables plugin
        $('#papersTable').DataTable();
    });
</script>


</html>
