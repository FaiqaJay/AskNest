<?php
include("./common/db.php");

$cid = isset($cid) ? $cid : 0;
$uid = isset($uid) ? $uid : 0;

$heading = "Questions";

if(isset($_GET["c-id"])){
    $query = "select * from questions where category_id=$cid";

    $categoryResult = $conn->query("select name from category where id=$cid");
    $categoryRow = $categoryResult->fetch_assoc();
    if($categoryRow){
        $heading = ucfirst($categoryRow['name']);
    }
} else if(isset($_GET["u-id"])){
    $query = "select * from questions where user_id=$uid";
} else if(isset($_GET["latest"])){
    $query = "select * from questions order by id desc";
} else if(isset($_GET["search"])){
    $searchText = $conn->real_escape_string($_GET["search"]);
    $query = "select * from questions where `title` LIKE '%$searchText%' ";
} else {
    $query = "select * from questions";
}
?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading"><?php echo $heading; ?></h1>
            <?php
            $result = $conn->query($query);
            foreach($result as $row) {
                $title = $row['title'];
                $id = $row['id'];
                echo "<div class='row question-list'>
                <h4 class='my-questions'><a href='?q-id=$id'>$title</a>";
                echo $uid ? "<a href='./server/request.php?delete=$id'>Delete</a>" : NULL;
                echo "</h4>
                </div>";
            }
            ?>
        </div>
        <div class="col-4">
            <?php include('category-list.php'); ?>
        </div>
    </div>
</div>