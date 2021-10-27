var $ = jQuery;
$(function(){
    var active_card = null;
    var active_card_2 = null;
    var number_of_cards = 0;
    var complete_pairs = 0;
    var timer = $("#timer");
    var number_of_moves_showed = $("#moves");
    var number_of_moves = 0;
    var seconds = 0;


    $(document).on('click', '.game-card', function(){

        number_of_moves++;
        number_of_moves_showed.text("Liczba ruchów: " + number_of_moves);
        
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
                                alert("Wygrałeś!\nCzas gry: " + seconds + "\nLiczba ruchów: " + number_of_moves);
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

    var start = Date.now();
    setInterval(function() {
        var delta = Date.now() - start; // milliseconds elapsed since start
        seconds = Math.floor(delta / 1000);
        timer.text("Czas: " + seconds);
    }, 1000);

});