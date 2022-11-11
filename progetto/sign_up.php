<?php require("_index_header.php");?>
<body>
        <div id="logo_sito"><img src="logo.png" alt="logo"></div>
        <div>
        <form method="get" action="registra.php" >
            <label>Inserisci i dati per registrarti</label> <br>     <!-- le label sono inline elements, metto display block e poi text align -->
            <input type="text" name="user" value="" placeholder="Username" required>
            <br>
            <input type="text" name="email" value="" placeholder="Indirizzo Email" required>
            <br>
            <input type="password" name="psw" value="" placeholder="Password" required>
            <br>
            <button type="submit" id="bottone">Registrati</button> <br>
        </form>
        </div>
        <br>
        <br>
        <?php require("_index_footer.php")?>
    </body>
</html>