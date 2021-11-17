<?php
session_start();

if (isset($_POST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    $password = stripslashes($_REQUEST['password']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `user` WHERE user_name='$username' and user_password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);

    $rows = mysqli_num_rows($result);
    $row = $result->fetch_assoc();
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['clubid'] = $row['club_id'];
        // Redirect user to index.php
        header("Location: index.php");
    } else {
?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Błąd logowania, spróbuj ponownie! </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php }
}
?>