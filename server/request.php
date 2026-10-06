<?php

session_start();

include '../common/db.php';

if(isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("Insert into users 
    (id, username, email, password, address)
    VALUES (NULL, '$username', '$email', '$password', '$address')"
    );

    $result = $user->execute();

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id, "address" => $address];
        header("Location: /AskNest");
        exit;
    } else {
        echo "Error: ";
    }

} else if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;

    $query = "select * from users where email = '$email' and password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        foreach($result as $row) {
            $username = $row['username'];
            $user_id = $row['id'];
        }

        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("Location: /AskNest");
        exit;
    } else {
        echo "New user not registered";
    }

} else if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: /AskNest");
    exit;

} else if (isset($_POST['ask'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $question = $conn->prepare("INSERT INTO questions (id, title, description, category_id, user_id) VALUES (NULL, '$title', '$description', '$category_id', '$user_id')");
    $result = $question->execute();

    if ($result) {
        header("Location: /AskNest");
        exit;
    } else {
        echo "Error: ";
    }

} else if(isset($_POST["answer"])){
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $query = $conn->prepare("INSERT INTO answers (id, answer, question_id, user_id) VALUES (NULL, '$answer', '$question_id', '$user_id')");
    $result = $query->execute();

    if ($result) {
        header("Location: /AskNest?q-id=$question_id");
        exit;
    } else {
        echo "Error: ";
    }

} else if(isset($_GET["delete"])){
    $qid = (int) $_GET["delete"];
    $user_id = (int) $_SESSION['user']['user_id'];

    // remove the question's answers first, then the question (only if it belongs to this user)
    $conn->query("delete from answers where question_id=$qid");
    $result = $conn->query("delete from questions where id=$qid and user_id=$user_id");

    if($result){
        header("Location: /AskNest?u-id=$user_id");
        exit;
    } else {
        echo "Question not deleted";
    }
}

?>