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
                        <nav class="nav">
                            <!-- Navigaation tilalle tulee hampurilaismenu ruudun pienentyessä -->
                            <button class="nav__toggle" aria-expanded="false" type="button">
                                Menu
                            </button>
                            <!-- Navigaatiolinkit alkaa -->
                            <ul class="nav__wrapper no-bullets">
                                <li class="nav__item">
                                    <a href="index.php">
                                        <img class="nav-icon" src="images/iconfinder_home_1608930.png" alt="Home">
                                        <span>Koti</span>
                                    </a>
                                </li>
                                <li class="nav__item active">
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

        <!-- Infoteksti alkaa -->
        <div class="container">
            <div class="row">
                <div class="twelve columns top_content">
                    <h1 class="text-center">Tietoa Toivu-sovelluksesta</h1>
                    <h3 class="text-center">...ja sen kehitystiimistä</h3>

                    <!-- Iso logo keskellä infosivua -->
                    <img class="logo__banner" src="images/Toivu.png" alt="Toivu-logo">

                    <!-- Lisätietoa sovelluksesta -->
                    <h3 class="text-center">Mitä hyötyä voit saada itsellesi, työntekijöillesi?</h3>
                    <p>Kyky saada tarkkaa tietoa stressistä ja palautumisesta on arvokas työkalu sekä työnantajalle että yksittäiselle työntekijälle. Sekä stressiä, että palautumista on mahdollista mitata sykevälivaihtelulla, jonka mittaamiseen on tarjolla monia hyvinvointilaitteita. Tämä mittaus tapahtuu siten, että sensorit mittaavat sykkeiden välistä aikaa ja tämä data tuodaan sovellukseen käsiteltäväksi. Sovelluksen ideana on kehittää työterveyttä ja ehkäistä ongelmia hyödyntämällä tätä mittausta.</p>
                    <p>Sovelluksen tarkoitus on antaa käyttäjälle tietoa hänen stressistään työpäivän aikana ja antaa heille työkaluja stressistä selviämiseen ja sen vähentämiseen. Sovelluksen toimintaperiaate on kerätä kannettavalla Bluetooth-laitteella sykevälivaihteludataa ja tallentaa se sovelluksen tietokantaan Kubios-sovelluksen kautta. Sovellus laskee mitatusta sykevälivaihteludatasta käyttäjän stressin määrän, jonka jälkeen tarjotaan keinoja sen ehkäisyyn ja vähentämiseen. Käyttäjä voi myös nähdä sekä sykevälivaihteludatan, että stressiarvot graafien avulla.</p>
                    <p>Sovelluksen keskeisiä ominaisuuksia ovat stressiarvojen mittaus, tauottamisen suunnittelu, ohjeet stressistä toipumiseen ja stressin vähentämiseen sekä työterveyteen ohjaus, mikäli arvot eivät parane. Sovelluksen käyttö tapahtuu verkkoselaimessa älypuhelimella tai tietokoneella.</p>
                    
                    <!-- Kehitystiimin esittely -->
                    <h3 class="text-center">Keitä me olemme?</h3>
                    <p>Toivu on Metropoliasta lähtöisin oleva startup ja sen kehtitystiimi kyseisen korkeakoulun opiskelijoita. Tiimiimme kuuluvat seuraavat jäsenet: Jaakko Buchelnikov, Roni Heininen, Aapo Kokko, Aku Korhonen. Tulemme erilaisista taustoista. Kaksi meistä opiskelee ensimmäistä tutkintoa ja kaksi meistä tekee toista. Olemme saaneet sovellukseen tuotua erilaisia näkökulmia ja yhdistänyt ne yhteiseksi visioksi. Kehityksen aikana vallinneen koronan vuoksi työ on tehty täysin etänä, mutta emme ole antaneet sen estää tai hidastaa toimintaa.</p>
                    <p>Työskentely on sujunut hyvin pitkälle itseohjautuvasti, mutta niin että olemme pitäneet jatkuvasti yhteyttä ja tasaisin väliajoin koonnut ajatukset yhteen. Ennen kehitystä tehtiin laaja pohjatyö vaatimusten keräämiseen ja luomiseen, jonka jälkeen kehitys on edennyt kahden viikon sprinteissä. Voimme julkaista Toivun ensimmäisen version ylpeydellä.</p>
                </div>
            </div>
        </div>
        <!-- Infoteksti loppuu -->

        <!-- Skriptit alkaa -->
        <!-- Toivu scripts -->
        <script src="js/collapse-menu.js"></script>
        <script src="js/confirmEmpty.js"></script>
        <!-- Skriptit loppuu -->

<?php
    include("includes/ifooter.php");
?>