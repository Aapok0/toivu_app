            <!-- Footer alkaa -->
            <footer>
                <div class="container">
                    <!-- Ensimmäinen kolumni alkaa -->
                    <div class="one-half column footer-col">
                        <!-- Lisätietolinkkejä Toivu-sovellukseen liittyen -->
                        <h5>Resursseja</h5>
                        <ul class="no-bullets">
                            <li class="footer-link">
                                <a href="infoPage.php">
                                    Meidän yritys
                                </a>
                            </li>
                            <li class="footer-link">
                                <a href="privacyPolicy.php">
                                    Tietosuojaseloste
                                </a>
                            </li>
                            <li class="footer-link">
                                <a href="termsConditions.php">
                                    Käyttöehdot
                                </a>
                            </li>
                        </ul>

                        <!-- Sosiaalisen median linkit -->
                        <h5>Sosiaalinen media</h5>
                        <ul class="socials no-bullets">
                            <li class="social-item">
                                <a href="#">
                                    <img src="images/iconfinder_Facebook_social_media_logo_1964400.png" alt="facebook">
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <img src="images/iconfinder_Circled_Instagram_svg_5279112.png" alt="instagram">
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <img src="images/iconfinder_Circled_Twitter_svg_5279123.png" alt="twitter">
                                </a>
                            </li>
                            <li class="social-item">
                                <a href="#">
                                    <img src="images/iconfinder_Circled_Linkedin_svg_5279114.png" alt="linkedin">
                                </a>
                            </li>
                        </ul>

                        <!-- Logo ensimmäisen kolumnin lopussa -->
                        <div class="footer_logo__wrapper">
                            <img class="footer_logo" src="images/Toivu3.png" alt="Toivu-logo">
                        </div>

                        <!-- Toivu copyright -->
                        <span class="copyright">© Toivu 2021</span>
                    </div>
                    <!-- Ensimmäinen kolumni loppuu -->

                    <!-- Toinen kolumni alkaa -->
                    <div class="one-half column footer-col">
                        <!-- Perusyhteystiedot -->
                        <h5>Ota meihin yhteyttä!</h5>
                        <p>puh. +358 99 123 1231</p>
                        <p>contact@toivu.fi</p>
                        <!-- Yhteydenottolomake, joka lähettää sähköpostia kehittäille -->
                        <?php
                            include("forms/fcontactForm.php");
                        ?>
                    </div>
                    <!-- Toinen kolumni loppuu -->
                </div>
            </footer>
            <!-- Footer loppuu -->
        </div>
        <!-- Sivun säiliö loppuu -->
    </body>
</html>