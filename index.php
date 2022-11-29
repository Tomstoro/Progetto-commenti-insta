<?php require("_index_header.php");?>
    <body>
        <div id="logo_sito"><img src="images/logo.png" alt="logo"></div>
        <div>
            <?php /*LOGIN FORM*/ ?>
        <form method="get" action="_verifica.php" >
            <label>Inserisci dati per accedere</label> <br>    
            <input type="text" name="user" value="" placeholder="Username o Email" required>
            <br>
            <input type="password" name="psw" value="" placeholder="Password" required>
            <br>
            <button type="submit" id="bottone">Accedi</button> <br>
            <hr>
            <div id="sign_up" >
            Non hai un account? <a href="sign_up.php">Sign Up</a>
    <br> <br>
            Vuoi accedere in sola visualizzazione? <a href="home.php">Accedi</a>
            </div>
        </form>
        </div>
        <br>
        <br>
        <?php require("_index_footer.php")?>
    </body>
</html>