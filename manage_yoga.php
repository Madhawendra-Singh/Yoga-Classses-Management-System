<div class="container">
    <form class="form-group mt-3" method="post" action="home.php?info=yoga_search">
        <h3 class="lead">SEARCH YOGA</h3>
        <input type="text" name="name" class="form-control" placeholder="ENTER YOGA NAME OR YOGA ID">
    </form>

    <div class="container">
        <table class="table table-bordered table-hover">
            <tr>
                <th>YOGA ID</th>
                <th>YOGA NAME</th>
                <th>YOGA ADDRESS</th>
                <th>YOGA TYPE</th>
            </tr>
            <?php
           require('db.php');

$all="SELECT * FROM yoga";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
        echo "<td>".$row['yoga_id']."</td>";
        echo "<td>".$row['yoga_name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['type']."</td>";
        echo "</tr><br>";
    }
} else {
    echo "0 results";
}

?>
        </table>
    </div>
</div>

