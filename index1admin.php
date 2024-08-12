<?php
include "commonAdmin.php";
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
					// Employee ID for which you want to count entries
					$employee_id = $_SESSION['employee_id'];

					// SQL query to count entries for the specified employee ID
					$sql = "SELECT COUNT(*) AS entry_count FROM researchpapersbyfaculty group by status having status=1";

					// Execute query
					$result = mysqli_query($conn, $sql);

					if ($result) {
						// Fetch the result row
						$row = mysqli_fetch_assoc($result);

						// Get the count of entries
						$entry_count = $row['entry_count'];

						echo "$entry_count". " Journal Paper";
					} else {
						echo "Error executing query: " . mysqli_error($conn);
					}

					// Close connection
					//mysqli_close($conn);
				?>
                </div>
                <div class=" text-green-800 mt-2">Approved</div>
            </div>

            <!-- Books -->
            <div class="bg-blue-100 max-w-md m-2 p-4 rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
				<?php
					// Employee ID for which you want to count entries
					$employee_id = $_SESSION['employee_id'];

					// SQL query to count entries for the specified employee ID
					$sql = "SELECT COUNT(*) AS entry_count FROM booksbyfaculty group by status having status=1";

					// Execute query
					$result = mysqli_query($conn, $sql);

					if ($result) {
						// Fetch the result row
						$row = mysqli_fetch_assoc($result);

						// Get the count of entries
						$entry_count = $row['entry_count'];

						echo "$entry_count"." Book";
					} else {
						echo "Error executing query: " . mysqli_error($conn);
					}

					// Close connection
					//mysqli_close($conn);
				?>

                </div>
                <div class="text-blue-600 mt-2">Approved</div>
            </div>

            <!-- Conference Papers -->
            <div class="bg-yellow-100 p-4 max-w-md m-2 rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
				<?php
					// Employee ID for which you want to count entries
					$employee_id = $_SESSION['employee_id'];

					// SQL query to count entries for the specified employee ID
					$sql = "SELECT COUNT(*) AS entry_count FROM papersbyfaculty group by status having status=1";

					// Execute query
					$result = mysqli_query($conn, $sql);

					if ($result) {
						// Fetch the result row
						$row = mysqli_fetch_assoc($result);

						// Get the count of entries
						$entry_count = $row['entry_count'];

						echo "$entry_count"." Conference Paper";
					} else {
						echo "Error executing query: " . mysqli_error($conn);
					}

					// Close connection
					//mysqli_close($conn);
				?>
                </div>
                <div class="text-yellow-600 mt-2">Approved</div>
            </div>

            <!-- Chapters -->
            <div class="bg-purple-100 p-4 max-w-md m-2 rounded-lg shadow">
                <div class="text-gray-800 text-xl font-semibold">
				<?php
					// Employee ID for which you want to count entries
					$employee_id = $_SESSION['employee_id'];

					// SQL query to count entries for the specified employee ID
					$sql = "SELECT COUNT(*) AS entry_count FROM bookchaptersbyfaculty group by status having status=1";

					// Execute query
					$result = mysqli_query($conn, $sql);

					if ($result) {
						// Fetch the result row
						$row = mysqli_fetch_assoc($result);

						// Get the count of entries
						$entry_count = $row['entry_count'];

						echo "$entry_count"." Chapter";
					} else {
						echo "Error executing query: " . mysqli_error($conn);
					}

					// Close connection
					//mysqli_close($conn);
				?>
                </div>
                <div class="text-purple-600 mt-2">Approved</div>
            </div>
        </div>

        <!-- Journal Papers Section -->
        <div class="mt-8">
            <?php
    		$sql = "SELECT * FROM researchpapersbyfaculty WHERE status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mb-4'>Pending Journal Papers</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">Approve</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Paper Title</th><th class="py-2 px-4">Journal</th><th class="py-2 px-4">Status</th></tr></thead>';
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
						  echo '<td>
						  <form method="post">
							  <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
							  <button type="submit" name="approve" onclick="return confirmApproval();" class="btn btn-sm">Approve</button>
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
                    if($row['status']==0){
						echo '<td>Not Approved</td>';
						}

                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>No Journal Papers found for Approval.</p>";
            }
            ?>
        </div>

        <!-- Chapters Section -->
        <div class="mt-8">
            <?php
  			  $sql = "SELECT * FROM bookchaptersbyfaculty WHERE status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mb-4'>Pending Chapters</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">Approve</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Chapter Title</th><th class="py-2 px-4">Status</th></tr></thead>';
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
					  echo '<td>
					  <form method="post">
						  <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
						  <button type="submit" name="approve1" onclick="return confirmApproval();" class="btn btn-sm">Approve</button>
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
                    if($row['status']==0){
						echo '<td>Not Approved</td>';
						}
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>No pending Chapters found.</p>";
            }

            // Conference Papers
			$sql = "SELECT * FROM papersbyfaculty WHERE status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mt-8 mb-4'>Conference Papers</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">Approve</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Paper Title</th><th class="py-2 px-4">Journal</th><th class="py-2 px-4">Status</th></tr></thead>';
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
						  echo '<td>
						  <form method="post">
							  <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
							  <button type="submit" name="approve3" onclick="return confirmApproval();" class="btn btn-sm">Approve</button>
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
                    if($row['status']==0){
						echo '<td>Not Approved</td>';
						}
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'> Conference Papers For Approval are Shown here</p>";
            }

            // Books
            $sql = "SELECT * FROM booksbyfaculty WHERE status=0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h5 class='text-2xl font-medium font-serif mt-8 mb-4'>Books</h5>";
                echo '<table class="w-full border border-gray-300 text-center bg-white rounded-lg shadow overflow-hidden">';
                echo '<thead class="bg-gray-200"><tr><th class="py-2 px-4">Edit</th><th class="py-2 px-4">Delete</th><th class="py-2 px-4">Approve</th><th class="py-2 px-4">ID</th><th class="py-2 px-4">University</th><th class="py-2 px-4">Department</th><th class="py-2 px-4">Faculty/Scientist</th><th class="py-2 px-4">Employee ID</th><th class="py-2 px-4">Author/s</th><th class="py-2 px-4">Co-author</th><th class="py-2 px-4">Book Title</th><th class="py-2 px-4">Status</th></tr></thead>';
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
						  echo '<td>
						  <form method="post">
							  <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
							  <button type="submit" name="approve2" onclick="return confirmApproval();" class="btn btn-sm">Approve</button>
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
                    if($row['status']==0){
						echo '<td>Not Approved</td>';
						}
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p class='text-gray-500'>Books for Approval are Shown here</p>";
            }
            ?>
        </div>
    </div>
</div>
</div>
<?php
if (isset($_POST['approve'])) {
    // Ensure user_id is set and is numeric to avoid SQL injection
    if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        // Fetch Employee ID, papertitle, and Faculty from researchpapersbyfaculty table
        $sql = "SELECT `Employee ID`, `papertitle`, `Faculty` FROM `researchpapersbyfaculty` WHERE `user_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($employee_id, $papertitle, $Faculty);
        if ($stmt->fetch()) {
            $stmt->close();

            // Fetch email address from registerinfo table using Employee ID
            $sql = "SELECT `email` FROM `registerinfo` WHERE `emp_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();
            $stmt->bind_result($email);
            if ($stmt->fetch()) {
                $stmt->close();

                // Update the researchpapersbyfaculty table
                $sql = "UPDATE `researchpapersbyfaculty` SET `status` = 1 WHERE `user_id` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->close();

                // Send the email with detailed message
                $subject = "Approval of Your Research Paper Titled \"$papertitle\"";
                $message = "Dear $Faculty,\n\n" .
                           "I hope this message finds you well.\n\n" .
                           "We are pleased to inform you that your research paper titled \"$papertitle\" has been successfully reviewed and approved by the faculty review committee.\n\n" .
                           "We appreciate your hard work and dedication to advancing research in this field. Your contribution is highly valued, and we look forward to seeing the positive impact of your research.\n\n" .
                           "Should you require any further assistance or have any questions, please feel free to reach out.\n\n" .
                           "Thank you once again for your excellent work.\n\n" .
                           "Best regards,\n" .
                           "Shilpa Sinha\n" .
                           "Assistant Professor\n" .
                           "Computer Science Department, Amity University\n" .
                           "Contact: +91-XXXXXXXXXX\n" .
                           "Email: shilpa.sinha3107@gmail.com";

                $check = mail($email, $subject, $message, "From:shilpa.sinha3107@gmail.com");

                if ($check) {
                    echo "<script>alert('Approved and email sent successfully'); location.replace('index1admin.php');</script>";
                } else {
                    echo "<script>alert('Approved but email not sent successfully'); location.replace('index1admin.php');</script>";
                }
            } else {
                echo "<script>alert('Employee ID not found in registerinfo'); location.replace('index1admin.php');</script>";
            }
        } else {
            echo "<script>alert('User ID not found in researchpapersbyfaculty'); location.replace('index1admin.php');</script>";
        }
    } else {
        echo "<script>alert('Invalid user ID'); location.replace('index1admin.php');</script>";
    }
}

    
	//header("location: index1admin.php");
	

	
    //exit();


// Close connection
//$conn->close();
   
?>
<?php
if (isset($_POST['approve1'])) {
    // Ensure user_id is set and is numeric to avoid SQL injection
    if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        // Fetch Employee ID, booktitle, and Faculty from bookchaptersbyfaculty table
        $sql = "SELECT `Employee ID`, `booktitle`, `Faculty` FROM `bookchaptersbyfaculty` WHERE `user_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($employee_id, $booktitle, $Faculty);
        if ($stmt->fetch()) {
            $stmt->close();

            // Fetch email address from registerinfo table using Employee ID
            $sql = "SELECT `email` FROM `registerinfo` WHERE `emp_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();
            $stmt->bind_result($email);
            if ($stmt->fetch()) {
                $stmt->close();

                // Update the bookchaptersbyfaculty table
                $sql = "UPDATE `bookchaptersbyfaculty` SET `status` = 1 WHERE `user_id` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->close();

                // Send the email with detailed message
                $subject = "Approval of Your Book Chapter Titled \"$booktitle\"";
                $message = "Dear $Faculty,\n\n" .
                           "I hope this message finds you well.\n\n" .
                           "We are pleased to inform you that your Book Chapter titled \"$booktitle\" has been successfully reviewed and approved by the faculty review committee.\n\n" .
                           "We appreciate your hard work and dedication to advancing research in this field. Your contribution is highly valued, and we look forward to seeing the positive impact of your research.\n\n" .
                           "Should you require any further assistance or have any questions, please feel free to reach out.\n\n" .
                           "Thank you once again for your excellent work.\n\n" .
                           "Best regards,\n" .
                           "Shilpa Sinha\n" .
                           "Assistant Professor\n" .
                           "Computer Science Department, Amity University\n" .
                           "Contact: +91-XXXXXXXXXX\n" .
                           "Email: shilpa.sinha3107@gmail.com";

                $check = mail($email, $subject, $message, "From:shilpa.sinha3107@gmail.com");

                if ($check) {
                    echo "<script>alert('Approved and email sent successfully'); location.replace('index1admin.php');</script>";
                } else {
                    echo "<script>alert('Approved but email not sent successfully'); location.replace('index1admin.php');</script>";
                }
            } else {
                echo "<script>alert('Employee ID not found in registerinfo'); location.replace('index1admin.php');</script>";
            }
        } else {
            echo "<script>alert('User ID not found in bookchaptersbyfaculty'); location.replace('index1admin.php');</script>";
        }
    } else {
        echo "<script>alert('Invalid user ID'); location.replace('index1admin.php');</script>";
    }
}
    
	//header("location: index1admin.php");
	

	
    //exit();


// Close connection
//$conn->close();
   
?>
<?php
if (isset($_POST['approve2'])) {
    // Ensure user_id is set and is numeric to avoid SQL injection
    if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        // Fetch Employee ID, papertitle, and Faculty from booksbyfaculty table
        $sql = "SELECT `Employee ID`, `booktitle`, `Faculty` FROM `booksbyfaculty` WHERE `user_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($employee_id, $booktitle, $Faculty);
        if ($stmt->fetch()) {
            $stmt->close();

            // Fetch email address from registerinfo table using Employee ID
            $sql = "SELECT `email` FROM `registerinfo` WHERE `emp_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();
            $stmt->bind_result($email);
            if ($stmt->fetch()) {
                $stmt->close();

                // Update the booksbyfaculty table
                $sql = "UPDATE `booksbyfaculty` SET `status` = 1 WHERE `user_id` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->close();

                // Send the email with detailed message
                $subject = "Approval of Your Book Titled \"$booktitle\"";
                $message = "Dear $Faculty,\n\n" .
                           "I hope this message finds you well.\n\n" .
                           "We are pleased to inform you that your book titled \"$booktitle\" has been successfully reviewed and approved by the faculty review committee.\n\n" .
                           "We appreciate your hard work and dedication to advancing research in this field. Your contribution is highly valued, and we look forward to seeing the positive impact of your research.\n\n" .
                           "Should you require any further assistance or have any questions, please feel free to reach out.\n\n" .
                           "Thank you once again for your excellent work.\n\n" .
                           "Best regards,\n" .
                           "Shilpa Sinha\n" .
                           "Assistant Professor\n" .
                           "Computer Science Department, Amity University\n" .
                           "Contact: +91-XXXXXXXXXX\n" .
                           "Email: shilpa.sinha3107@gmail.com";

                $check = mail($email, $subject, $message, "From:shilpa.sinha3107@gmail.com");

                if ($check) {
                    echo "<script>alert('Approved and email sent successfully'); location.replace('index1admin.php');</script>";
                } else {
                    echo "<script>alert('Approved but email not sent successfully'); location.replace('index1admin.php');</script>";
                }
            } else {
                echo "<script>alert('Employee ID not found in registerinfo'); location.replace('index1admin.php');</script>";
            }
        } else {
            echo "<script>alert('User ID not found in booksbyfaculty'); location.replace('index1admin.php');</script>";
        }
    } else {
        echo "<script>alert('Invalid user ID'); location.replace('index1admin.php');</script>";
    }
}
    
	//header("location: index1admin.php");
	

	
    //exit();


// Close connection
//$conn->close();
   
?>
<?php
if (isset($_POST['approve3'])) {
    // Ensure user_id is set and is numeric to avoid SQL injection
    if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        // Fetch Employee ID, booktitle, and Faculty from papersbyfaculty table
        $sql = "SELECT `Employee ID`, `booktitle`, `Faculty` FROM `papersbyfaculty` WHERE `user_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($employee_id, $booktitle, $Faculty);
        if ($stmt->fetch()) {
            $stmt->close();

            // Fetch email address from registerinfo table using Employee ID
            $sql = "SELECT `email` FROM `registerinfo` WHERE `emp_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();
            $stmt->bind_result($email);
            if ($stmt->fetch()) {
                $stmt->close();

                // Update the papersbyfaculty table
                $sql = "UPDATE `papersbyfaculty` SET `status` = 1 WHERE `user_id` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->close();

                // Send the email with detailed message
                $subject = "Approval of Your Paper Titled \"$booktitle\"";
                $message = "Dear $Faculty,\n\n" .
                           "I hope this message finds you well.\n\n" .
                           "We are pleased to inform you that your paper titled \"$booktitle\" has been successfully reviewed and approved by the faculty review committee.\n\n" .
                           "We appreciate your hard work and dedication to advancing in this field. Your contribution is highly valued, and we look forward to seeing the positive impact of your research.\n\n" .
                           "Should you require any further assistance or have any questions, please feel free to reach out.\n\n" .
                           "Thank you once again for your excellent work.\n\n" .
                           "Best regards,\n" .
                           "Shilpa Sinha\n" .
                           "Assistant Professor\n" .
                           "Computer Science Department, Amity University\n" .
                           "Contact: +91-XXXXXXXXXX\n" .
                           "Email: shilpa.sinha3107@gmail.com";

                $check = mail($email, $subject, $message, "From:shilpa.sinha3107@gmail.com");

                if ($check) {
                    echo "<script>alert('Approved and email sent successfully'); location.replace('index1admin.php');</script>";
                } else {
                    echo "<script>alert('Approved but email not sent successfully'); location.replace('index1admin.php');</script>";
                }
            } else {
                echo "<script>alert('Employee ID not found in registerinfo'); location.replace('index1admin.php');</script>";
            }
        } else {
            echo "<script>alert('User ID not found in papersbyfaculty'); location.replace('index1admin.php');</script>";
        }
    } else {
        echo "<script>alert('Invalid user ID'); location.replace('index1admin.php');</script>";
    }
}

?>
<?php
include "footer.php"
?>
<script>
	function confirmApproval() {
    // Showing confirmation box
    return confirm("Are you sure you want to approve this?");
	}
</script>
</body>
</html>
