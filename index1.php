<?php
include "common.php";
include "connect.php";

?>
<div class="main-content bg-gray-100 min-h-screen w-full rounded-xl p-6">
    <div class="main-content-inner mx-auto">

        <!-- Stats Cards -->
        <div class="p-2 grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl">
            <!-- Research Papers -->
            <div class="bg-green-100 p-4 m-2 max-w-md rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
                    <?php
                    $employee_id = $_SESSION['employee_id'];
                    $sql = "SELECT COUNT(*) AS entry_count FROM researchpapersbyfaculty WHERE `Employee ID` = '$employee_id' and status=1";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $entry_count = $row['entry_count'];
                        echo "$entry_count Research Paper";
                    } else {
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                    ?>
                </div>
                <div class=" text-green-800 mt-2">Submitted and Approved</div>
            </div>

            <!-- Books -->
            <div class="bg-blue-100 max-w-md m-2 p-4 rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
                    <?php
                    $sql = "SELECT COUNT(*) AS entry_count FROM booksbyfaculty WHERE `Employee ID` = '$employee_id' and status=1";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $entry_count = $row['entry_count'];
                        echo "$entry_count Book";
                    } else {
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                    ?>
                </div>
                <div class="text-blue-600 mt-2">Submitted and Approved</div>
            </div>

            <!-- Conference Papers -->
            <div class="bg-yellow-100 p-4 max-w-md m-2 rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
                    <?php
                    $sql = "SELECT COUNT(*) AS entry_count FROM papersbyfaculty WHERE `Employee ID` = '$employee_id' and status=1";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $entry_count = $row['entry_count'];
                        echo "$entry_count Conference Paper";
                    } else {
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                    ?>
                </div>
                <div class="text-yellow-600 mt-2">Submitted and Approved</div>
            </div>

            <!-- Chapters -->
            <div class="bg-purple-100 p-4 max-w-md m-2 rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
                    <?php
                    $sql = "SELECT COUNT(*) AS entry_count FROM bookchaptersbyfaculty WHERE `Employee ID` = '$employee_id' and status=1";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $entry_count = $row['entry_count'];
                        echo "$entry_count Chapter";
                    } else {
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                    ?>
                </div>
                <div class="text-purple-600 mt-2">Submitted and Approved</div>
            </div>
        </div>

        <!-- Journal Papers Section -->
        <div class="mt-8">
            <?php
            $sql = "SELECT * FROM researchpapersbyfaculty WHERE `Employee ID` = '$employee_id' and status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mb-4'>Pending Journal Papers</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Paper Title</th><th class="py-2 px-4">Journal</th><th class="py-2 px-4">Status</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="bg-white hover:bg-gray-50">';
                    echo '<td class="py-2 px-4"><a href="editReoResearchpaper.php?id=' . $row['user_id'] . '" class="text-blue-500 hover:text-blue-700">Edit</a></td>';
                    echo '<td class="py-2 px-4">
                          <form method="post" action="deleteReoResearchPaper.php">
                              <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                              <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                          </form>
                          </td>';
                    echo '<td class="py-2 px-4">' . $row['user_id'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['University'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Department'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Faculty'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Employee ID'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Co-author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['papertitle'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['journalname'] . '</td>';
                    echo '<td class="py-2 px-4">Not Approved</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>No pending Journal Papers found.</p>";
            }
            ?>
        </div>

        <!-- Chapters Section -->
        <div class="mt-8">
            <?php
            $sql = "SELECT * FROM bookchaptersbyfaculty WHERE `Employee ID` = '$employee_id' and status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mb-4'>Pending Chapters</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Chapter Title</th><th class="py-2 px-4">Status</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="bg-white hover:bg-gray-50">';
                    echo '<td class="py-2 px-4"><a href="editReochapters.php?id=' . $row['user_id'] . '" class="text-blue-500 hover:text-blue-700">Edit</a></td>';
                    echo '<td class="py-2 px-4">
                          <form method="post" action="deleteReoChapters.php">
                              <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                              <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                          </form>
                          </td>';
                    echo '<td class="py-2 px-4">' . $row['user_id'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['University'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Department'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Faculty'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Employee ID'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['other Author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Co-author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['booktitle'] . '</td>';
                    echo '<td class="py-2 px-4">Not Approved</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>No pending Chapters found.</p>";
            }

            // Conference Papers
            $sql = "SELECT * FROM papersbyfaculty WHERE `Employee ID` = '$employee_id' and status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mt-8 mb-4'>Conference Papers</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Paper Title</th><th class="py-2 px-4">Journal</th><th class="py-2 px-4">Status</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="bg-white hover:bg-gray-50">';
                    echo '<td class="py-2 px-4"><a href="editReopapers.php?id=' . $row['user_id'] . '" class="text-blue-500 hover:text-blue-700">Edit</a></td>';
                    echo '<td class="py-2 px-4">
                          <form method="post" action="deleteReoPapers.php">
                              <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                              <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                          </form>
                          </td>';
                    echo '<td class="py-2 px-4">' . $row['user_id'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['University'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Department'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Faculty'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Employee ID'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['other Author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Co-author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['booktitle'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['conferencePaper'] . '</td>';
                    echo '<td class="py-2 px-4">Not Approved</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>Your Pending Conference Papers are Shown here</p>";
            }

            // Books
            $sql = "SELECT * FROM booksbyfaculty WHERE `Employee ID` = '$employee_id' and status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mt-8 mb-4'>Books</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Book Title</th><th class="py-2 px-4">Status</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="bg-white hover:bg-gray-50">';
                    echo '<td class="py-2 px-4"><a href="editReoBooks.php?id=' . $row['user_id'] . '" class="text-blue-500 hover:text-blue-700">Edit</a></td>';
                    echo '<td class="py-2 px-4">
                          <form method="post" action="deleteReoBooks.php">
                              <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                              <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                          </form>
                          </td>';
                    echo '<td class="py-2 px-4">' . $row['user_id'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['University'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Department'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Faculty'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Employee ID'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['other Author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['Co-author'] . '</td>';
                    echo '<td class="py-2 px-4">' . $row['booktitle'] . '</td>';
                    echo '<td class="py-2 px-4">Not Approved</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>Your Pending Books are Shown here</p>";
            }
            ?>
        </div>
    </div>
</div>
<?php
include "footer.php"
?>
</body>
</html>
