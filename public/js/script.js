var $ = jQuery;
$(function(){
    var active_card = null;
    var active_card_2 = null;
    var number_of_cards = 0;
    var complete_pairs = 0;


    $(document).on('click', '.game-card', function(){
        
        if($(this).attr("reveal") == "true"){
            return false;
        }
        else{

            number_of_cards++;

            $(this).css("background-color", $(this).css("color"));

            if(number_of_cards<2){
                active_card = $(this);
            }
            else{
                number_of_cards = 0;

               /* if(active_card.css("color") === $(this).css("color")){
                    $(this).css("background-color", "white");
                }
                else{ */
                    active_card_2 = $(this);

                    if(active_card.css("color") != $(this).css("background-color")){
                        setTimeout(function(){
                            active_card.css("background-color", "white");
                            active_card_2.css("background-color", "white");
                        }, 300);    
                    }
                    else{
                        active_card.attr("reveal", "true");
                        active_card_2.attr("reveal", "true");
                        complete_pairs++;
                        
                        setTimeout(function(){
                            if (complete_pairs == "6"){
                                alert("Wygrałeś!");
                                $('.game-card').css("background-color", "white");
                                $('.game-card').attr("reveal", "false");
                                complete_pairs = 0;
                            }
                        }, 300);  
                    }
               // } Naprawić podwójny klik na jedną kartę

            }

        }

    });



});