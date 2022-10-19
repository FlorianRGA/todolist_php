<?php
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
            <form action="" method="POST">
                <label for="todo" hidden>Ajouter un objectif</label>
                <input type="text" id="todo" name="todo" placeholder="Entrez un nouveau todo..">
                <button type="submit">Ajouter &nbsp;+</button>
            </form>
        </div>
    </main>
    <?php
    require_once "./views/_footer.php";
