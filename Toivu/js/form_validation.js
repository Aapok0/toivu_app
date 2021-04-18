function validateForm() {
    //Rekisteröinnin sähköpostin validointi
    var email = document.forms["reg_form"]["givenEmail"].value;
    var atposition = email.indexOf("@");  
    var dotposition = email.lastIndexOf(".");  
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
        alert("Sähköposti ei ole oikeassa muodossa.");
        document.forms["reg_form"]["givenEmail"].focus();
        return false;
    }

    //Kirjautumisen sähköpostin validointi
    var logemail = document.forms["log_form"]["givenEmail"].value;
    var atposition = logemail.indexOf("@");  
    var dotposition = logemail.lastIndexOf(".");  
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= logemail.length) {
        alert("Sähköposti ei ole oikeassa muodossa.");
        document.forms["log_form"]["givenEmail"].focus();
        return false;
    }

    //Täsmääkö rekisteröinnin salasanat?
    var pass = document.forms["reg_form"]["givenPassword"].value;
    var pass_ver = document.forms["reg_form"]["givenPasswordVerify"].value;
    if (pass != pass_ver) {
        alert("Salasana ja sen vahvistus eivät täsmää");
        document.forms["reg_form"]["givenPassword"].focus();
        return false;
    }
}