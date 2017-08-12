$(document).ready(function() {
    /*           */
    /* FUNCTIONS */
    /*           */

    // append a footer to the bottom of every page
    function appendFooter(){
      var footer = "<div class='footer'>";
      footer += "<center><div class='copyrightText'>&copy; 2017 ITEE Group Canada</div></center>";
      footer += "</div>";
      $('body').append(footer);
    }

    //read variable from URL
    function getURLVar(variable) {
        var query = window.location.href;
        if (query.indexOf(variable) == -1) {
            return false;
        } else {
            return query[query.indexOf(variable) + variable.length + 1];
        }
    }

    // check if the user entered from a form submit
    function checkFormSubmit() {
        var errCode = getURLVar("error");
        if (errCode !== false) {
            if (errCode == "0") {
                $('#errorMSG').css("color", "green");
                $('#errorMSG').html('Success! Thanks for contacting us.');
            } else if (errCode == "1") {
                $('#errorMSG').css("color", "red");
                $('#errorMSG').html('Please complete all fields.');
            } else if (errCode == "2") {
                $('#errorMSG').css("color", "red");
                $('#errorMSG').html('Please enter a valid email address.');
            }
        }
    }



    /*            */
    /*    MAIN    */
    /*            */
    appendFooter();
    checkFormSubmit();


});
