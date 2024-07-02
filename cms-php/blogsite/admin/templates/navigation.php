<?php

include("../config/db_connect.php");

//(Delete post, delete user, change user privilages)- Queries and server handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_post'])) {
        $postId = $_POST['post_id'];
        $sql = "DELETE FROM posts WHERE post_id ='$postId'";
         mysqli_query($conn, $sql);
    } elseif (isset($_POST['delete_user'])) {
        $userId = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "DELETE FROM users WHERE id= '$userId'";
        mysqli_query($conn,$sql);
    } elseif (isset($_POST['change_role'])) {
        $userId = mysqli_real_escape_string($conn, $_POST['id']);
        $newRole = mysqli_real_escape_string($conn,$_POST['new_role']);
        $sql = "UPDATE users SET role = '$newRole' WHERE id = '$userId'";
        mysqli_query($conn, $sql);
    }
}

// Fetch all posts and users
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);
$posts = [];

//Add every post in the database in posts[] array
while($row = mysqli_fetch_assoc($result)){
    $posts[] = $row;
}

mysqli_free_result($result);

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = [];

//Add every user in the database in users[] array
while($row = mysqli_fetch_assoc($result)){
    $users[] = $row;
}

mysqli_free_result($result);

?>

<!-- Set up wrapper container for admin navigation and user display users and posts-->
<div class="wrapper mx-2">
        <div class="sidebar">
            <h2>Admin Menu</h2>
            <a href="#manage-posts" class="text-dark">Manage Posts</a>
            <a href="#manage-users" class="text-dark">Manage Users</a>
        </div>
        <div class="main-content">
            <h1>Admin Dashboard</h1>

            <h2 id="manage-posts">Manage Posts</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Display every post with functionality to delete them-->
                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['post_id']) ?></td>
                        <td><?= htmlspecialchars($post['post_title']) ?></td>
                        <td style="word-break: break-all;"><?= htmlspecialchars($post['post_content']) ?></td>
                        <td>
                            <form method="post" id="delete_form" style="display:inline;">
                                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                                <button type="submit"  name="delete_post" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2 id="manage-users">Manage Users</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <!-- Display every user with functionality to delete user account or change its privilages-->
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td>
                            <form method="post" id="delete_form" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                            </form>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <select name="new_role" class="form-control" style="display:inline;width:auto;">
                                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <button type="submit" name="change_role" class="btn btn-primary">Change Role</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Script for form confirmation to submit.-->
    <script>
        document.getElementById('delete_form').addEventListener('submit', function(event) {
          
            var userConfirmed = confirm("Are you sure you want to submit the form?");
            
            if (!userConfirmed) {
                event.preventDefault(); 
            }
        });
    </script>