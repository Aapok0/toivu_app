<?php
    session_start();
    include("includes/iheader.php");
?>

    <!-- Sivun säiliö alkaa -->
    <div class="page-container">

        <!-- Uusi päänavigaatio alkaa -->
        <div class="header-background noprint">
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
                                <!-- Kirjautumis- ja rekisteröintilinkki ja kirjautumisen jälkeen uloskirjaus- ja oma sivu -linkki -->
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
        <div class="container noprint">
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

        <div class="container profile-page">
            <!-- Graafit -->
            <?php
                include("includes/igraph1.php");
                include("includes/igraph2.php");
                include("includes/igraph3.php");
            ?>
        </div>

        <!-- HRV-analyysit ja tiedot taulukkoon -->
        <div class="container row">
            <div class="twelve columns">
                <?php
                    include("includes/ireadiness.php");
                ?>
            </div>
        </div>

        <!-- Skriptit alkaa -->
        <!-- Toivu scripts -->
        <script src="js/collapse-menu.js"></script>
        <script src="js/confirmEmpty.js"></script>
        <script src="js/ToivuTheme.js"></script>
        <!-- amGraph scripts -->
        <script src="amcharts4/core.js"></script>
        <script src="amcharts4/charts.js"></script>
        <script src="amcharts4/animated.js"></script>
        <script src="amcharts4/fi_FI.js"></script>
        <!-- Skriptit loppuu -->

<?php
    include("includes/ifooter.php");
?>