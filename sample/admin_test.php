<?php
include('includes/admin_header.php');
?>
<?php
require_once 'process.php';
?>
<?php
if(isset($_SESSION['message'])):
?>
<div class="alert alert-<?= $_SESSION['msg_type'] ?>">
<?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
?>
</div>
<?php endif; ?>

<?php
$mysqli = new mysqli('localhost', 'root', '', 'draft') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM crud") or die(mysqli_error($mysqli));
?>
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2"> Action </th>
                </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()) :
            ?> <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <a href="admin_test.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <?php
    function pre_r($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    };

    ?>
    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Enter your Name">
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $location ?>" placeholder="Enter your Location">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="save"> Save</button>
            </div>
        </form>
    </div>
</div>
<?php
include('includes/admin_footer.php');
?>