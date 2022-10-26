<?php

$regex0or1 = '/^[01]$/';
$error = "";
$incorrectTodo = "";
$newTodo = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen($_POST['todo']) == 0) {
        $error = "Veuillez saisir une entrée";
    } elseif (strlen($_POST['todo']) < 5) {
        $error = "Veuillez saisir une todo supérieur a 5 caracteres";
    }
    $_POST['todo'] = filter_var($_POST['todo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($error == "") {
        $todo = $_POST['todo'];
        $request = "INSERT INTO todo (id,nom,done) VALUES ('DEFAULT','$todo', 'false')";
        $req = $dbh->prepare($request);
        $req->execute();
    } elseif (!$error == "") {
        $incorrectTodo = $_POST['todo'];
    }
}

$selectRequest = "SELECT * FROM todo";
$req = $dbh->prepare($selectRequest);
$req->execute();
$selectAll = $req->fetchAll();


if (isset($_GET["deleteID"])) {

    $_GET['deleteID'] = filter_var($_GET['deleteID'], FILTER_SANITIZE_NUMBER_INT);

    if (!filter_var($_GET['deleteID'], FILTER_VALIDATE_INT)) {
        header("location: /");
    } else {
        $id = $_GET["deleteID"];
        $request = "DELETE FROM todo WHERE id= $id";
        $req = $dbh->prepare($request);
        $req->execute();
        header('Location: ./index.php');
    }
} elseif (isset($_GET["changeStateID"])) {

    $_GET['changeStateID'] = filter_var($_GET['changeStateID'], FILTER_SANITIZE_NUMBER_INT);
    $_GET['actualState'] = filter_var($_GET['actualState'], FILTER_SANITIZE_NUMBER_INT);

    if (filter_var($_GET['changeStateID'], FILTER_VALIDATE_INT)) {
        if (preg_match($regex0or1, $_GET['actualState'])) {
            $id = $_GET["changeStateID"];
            $state = $_GET["actualState"];
            if ($state === "0") {
                $state = 1;
            } else {
                $state = 0;
            }
            $request = "UPDATE todo
            SET done = $state
            WHERE id=$id";
            $req = $dbh->prepare($request);
            $req->execute();
            header('Location: ./index.php');
        } else {
            // var_dump('c pa ok');
            // die();
            header("location: /");
        }
    } else {
        // var_dump('c pa ok');
        // die();
        header("location: /");
    }
}
