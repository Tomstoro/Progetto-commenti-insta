<?php require("_index_header.php");?>
    <body>
        <div id="logo_sito"><img src="images/logo.png" alt="logo"></div>
        <div>
        <form method="get" action="verifica.php" >
            <label>Inserisci dati per accedere</label> <br>     <!-- le label sono inline elements, metto display block e poi text align -->
            <input type="text" name="user" value="" placeholder="Username o Email" required>
            <br>
            <input type="password" name="psw" value="" placeholder="Password" required>
            <br>
            <button type="submit" id="bottone">Accedi</button> <br>
            <hr>
            <div id="sign_up" >
            Non hai un account? <a href="sign_up.php">Sign Up</a>
            </div>
        </form>
        </div>
        <br>
        <br>
        <?php require("_index_footer.php")?>
    </body>
</html>