<?php
require_once "./controllers/connect.php";
require_once "./controllers/todo_controller.php";
require_once "./views/_doctype.php";
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
            <form class="insert" action="/" method="POST">
                <label for="todo" hidden>Ajouter un objectif</label>
                <input type="text" id="todo" name="todo" placeholder="Entrez un nouveau todo.." value="<?= $incorrectTodo ?>">
                <button type="submit">Ajouter &nbsp;+</button>
            </form>
            <span class="error"><?= $error ?></span>
            <?php foreach ($selectAll as $tdo) { ?>

                <div class="d-flex box">
                    <h3 class="todoRow"><?= $tdo['done']  == 0 ? '' : '<del>' ?> <?= $tdo['nom'] ?><?= $tdo['done']  == 0 ? '' : '</del>' ?> </h3>
                    <div class="">
                        <a class="btn cancel" href="/index.php?changeStateID=<?= $tdo['id'] ?>&actualState=<?= $tdo['done'] ?>"><?= $tdo['done']  == 0 ? 'valider' : 'Annuler' ?></a>
                        <a class="btn delete" href="/index.php?deleteID=<?= $tdo['id'] ?>">Supprimer</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
    <?php
    require_once "./views/_footer.php";
