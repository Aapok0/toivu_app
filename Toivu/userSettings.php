<?php
    session_start();
    include("includes/iheader.php");
?>

    <!-- Sivun säiliö alkaa -->
    <div class="page-container">

        <!-- Uusi päänavigaatio alkaa -->
        <div class="header-background">
            <div class="container">
                <header class="site-header site-header__wrapper">
                    <div class="site-header__start">
                        <!-- Logo vasempaan ylälaitaan -->
                        <div id="logo">
                            <a href="index.php">
                                <img src="images/Toivu2.png" alt="Toivu-logo">
                            </a>
                        </div>
                    </div>

                    <!-- Navigaation oikea laita alkaa -->
                    <div class="site-header__end">
                        <nav>
                            <!-- Navigaation tilalle tulee hampurilaismenu ruudun pienentyessä -->
                            <button class="nav__toggle button-light" aria-expanded="false" type="button">
                                Päävalikko
                            </button>
                            <!-- Navigaatiolinkit alkaa -->
                            <ul class="nav__wrapper no-bullets">
                                <li class="nav__item">
                                    <a href="index.php">
                                        <img class="nav-icon" src="images/iconfinder_home_1608930.png" alt="Home">
                                        <span>Koti</span>
                                    </a>
                                </li>
                                <li class="nav__item">
                                    <a href="infoPage.php">
                                        <img class="nav-icon" src="images/iconfinder_ic_info_48px_352431.png" alt="Info">
                                        <span>Tietoa</span>
                                    </a>
                                </li>
                                <!-- Käyttäjätunnistus -->
                                <!-- Kirjautumis- ja rekisteröintilinkki ja kirjautumisen jälkeen uloskirjaus- ja oma sivu -linkki sekä profiilinavigaatio -->
                                <?php
                                    include("includes/inavIndex.php");
                                ?>
                            </ul>
                            <!-- Navigaatiolinkit loppuu -->
                        </nav>
                    </div>
                    <!-- Navigaation oikea laita loppuu -->
                </header>
            </div>
        </div>
        <!-- Uusi päänavigaatio loppuu -->

        <!-- Profiilinavigaatio alkaa -->
        <!-- Näkyy vain kirjautuneille -->
        <div class="container">
            <div class="row">
                <div class="twelve columns profile-header profile-header__wrapper">
                    <nav class="profile-header__end">
                        <!-- Navigaation tilalle tulee hampurilaismenu ruudun pienentyessä -->
                        <button class="pro-nav__toggle button-light" aria-expanded="false" type="button"> 
                            Profiilivalikko
                        </button>
                        <ul class="pro-nav__wrapper no-bullets">
                            <?php
                                include("includes/inavProfile.php");
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Profiilinavigaatio loppuu -->

        <!-- Asetukset alkaa -->
        <div class="container top_content">
            <h1 class="text-center">Asetukset</h1>
            <div class="row">
                <!-- Käyttäjätiedot alkaa -->
                <div class="one-half column">
                    <!-- Haetaan käyttäjätiedot -->
                    <!-- Ensiksi käyttäjän nykyiset tiedot, jonka jälkeen nappi niiden päivitykseen ja toinen tilin poistoon. -->
                    <?php
                        $query = "SELECT * FROM wsk21_toivu_user WHERE userID = :suser";
                        $stmt = $DBH -> prepare($query);
                        $stmt -> bindParam(':suser', $_SESSION['toivu_userID']);
                        $stmt -> execute();
                        $result = $stmt -> fetch();
                        
                        //Lasketaan ikä
                        if ($result[6] != "0000-00-00") {
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($result[6]), date_create($today));
                            $age = $diff -> format('%y');
                            $age = round($age, PHP_ROUND_HALF_DOWN);
                        }
                        else {
                            $age = "";
                        }

                        //Suomennetaan sukupuoli
                        $sex = "";
                        if ($result[7] == "male") {
                            $sex = "mies";
                        }
                        else if ($result[7] == "female") {
                            $sex = "nainen";
                        }
                        else if ($result[7] == "other") {
                            $sex = "muu";
                        }
                        
                        //Käyttäjätiedot
                        echo "<h3 class=\"setting_head\">Käyttäjätiedot</h3>";
                        echo "<p class=\"setting_par\">Käyttäjänimi: " . $result[1] . "</p>";
                        echo "<p class=\"setting_par\">Sähköposti: " . $result[3] . "</p>";
                        echo "<p class=\"setting_par\">Ikä: " . $age . "</p>";
                        echo "<p class=\"setting_par\">Sukupuoli: " . $sex . "</p>";
                        echo "<p class=\"setting_par\">Pituus: " . $result[4] . "</p>";
                        echo "<p class=\"setting_par\">Paino: " . $result[5] . "</p>";
                        echo "<h3 class=\"setting_par\">Tietojen päivitys</h3>";
                    ?>
                    <!-- Tietojen päivitys -->
                    <input class="setting_par" type="button" onclick="location.href='./updateAccount.php'" value="Päivitä">

                    <!-- Tilin poisto -->
                    <h3 class="setting_rem">Tilinpoisto</h3>
                    <input class="setting_par" type="button" onclick="removeUser()" value="Poista tili">
                </div>
                <!-- Käyttäjätiedot loppuu -->
                
                <!-- Lomakkeet alkaa -->
                <!-- Mahdollisuus antaa palautetta ja pyytää tukea -->
                <div class="one-half column">
                    <h3 class="setting_head">Palaute</h3>
                    <?php
                        include("forms/fgiveFeedback.php");
                    ?>

                    <h3 class="setting_par">Tuki</h3>
                    <?php
                        include("forms/faskSupport.php");
                    ?>
                </div>
                <!-- Lomakkeet loppuu -->
            </div>
        </div>
        <!-- Asetukset loppuu -->
        
        <!-- Lomakkeiden validointi submitin jälkeen ja sen läpi mennessä lähetys -->
        <?php
            //Lomakkeen submit painettu?
            if (isset($_POST['submitFeedback'])) {
                include("includes/isendFeedback.php");
            }
        ?>

        <?php
            //Lomakkeen submit painettu?
            if (isset($_POST['submitSupport'])) {
                //***Tarkistetaan syötteet myös palvelimella
                if (!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)) { //onko validi osoite?
                    $_SESSION['swarningInputSettings'] = "Virheellinen sähköposti";
                }
                else {
                    include("includes/isendSupportTicket.php"); //validaatio ok? -> siirrytään laittamaan tietokantaan
                }
            }
        ?>
        
        <!-- Virheviesti, jos lomake ei mene läpi serveripuolen validoinnista -->
        <div class="container">
            <?php
                //***Näytetäänkö lomakesyötteen aiheuttama varoitus?
                if (isset($_SESSION['swarningInputSettings'])) {
                    echo("<p class=\"warning\">Virheellinen syöte: ". $_SESSION['swarningInputSettings']."</p>");
                }
            ?>
        </div>
        
        <!-- Skriptit alkaa -->
        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Toivu scripts -->
        <script src="js/collapse-menu.js"></script>
        <script src="js/removeUser.js"></script>
        <script src="js/rating.js"></script>
        <script src="js/confirmEmpty.js"></script>
        <!-- Skriptit loppuu -->

<?php
    include("includes/ifooter.php");
?>