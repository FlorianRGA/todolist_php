<?php
require_once "./views/_doctype.php";
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
        $newTodo = '            <div class="todo">
        <p><strong>' . $_POST['todo'] . '</strong></p>
    </div>';
    } elseif (!$error == "") {
        $incorrectTodo = $_POST['todo'];
    }
}
?>
<title>PHP</title>
</head>

<body>
    <?php
    require_once "./views/_header.php";
    ?>
    <main>
        <div>
            <h2>Ma todo</h2>
            <form action="/" method="POST">
                <label for="todo" hidden>Ajouter un objectif</label>
                <input type="text" id="todo" name="todo" placeholder="Entrez un nouveau todo.." value="<?= $incorrectTodo ?>">
                <button type="submit">Ajouter &nbsp;+</button>
            </form>
            <span class="error"><?= $error ?></span>
            <?= $newTodo ?>
        </div>
    </main>
    <?php
    require_once "./views/_footer.php";
