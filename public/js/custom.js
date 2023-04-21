/**
 * Created by ThePhotoSide on 18/04/2018.
 */
(function($) {
    /*$('#sendat').datepicker({
        uiLibrary: 'bootstrap4'
    });*/

    $('#sendat').datetimepicker({
        footer: true,
        modal: true,
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd HH:MM',
    });

    $('#message').on("blur focusin focusout keyup", function(){

        var txtVal = $('#message').val();
        txtVal = txtVal.replace(/\s+/gi, ' ');
        $('#message').val( txtVal );

        var nchar = txtVal.length;

        var charCtrText = "";

        var msgCtrText = "";

        if( nchar > 160 ){
            var nmultipart = 156;
            var nmessages = Math.floor(nchar / nmultipart) ;
            /*var nrchar = nchar % nmultipart ;*/
            nmessages = ( (nchar % nmultipart) == 0 ) ? nmessages : nmessages + 1 ;
            charCtrText = "Characters: " + nchar + "/" + ( nmessages * nmultipart ) ;
            msgCtrText = "Messages: " + nmessages;
        } else {
            charCtrText = "Characters: " + nchar + "/160";
            msgCtrText = "Messages: 1";
        }

        $('#charcounter').text(charCtrText + " " + msgCtrText);


        var reg = /(\{[a-z0-9]+\})/ig;
        var match=[];
        var counter = 66;
        var parts=[];
        var f_set = false;
        while ( ( match = reg.exec(txtVal) ) !== null) {
            if( ("{name}" == match[0]) || ("{Name}" == match[0]) ){
                parts.push( match[0] + "=" + "F" );
                f_set = true;
                continue;
            }

            if( f_set && (String.fromCharCode(counter) == "F") ){
                counter++;
            }

            parts.push( match[0] + "=" + String.fromCharCode(counter++) );
        }

        $('#customisations').val( parts.join("|") );

        /*if(parts.length > 0){
            $('#phonenumbers').prop('disabled', true);
        } else {
            $('#phonenumbers').prop('disabled', false);
        }*/

    });

})(jQuery); // End of use strict
