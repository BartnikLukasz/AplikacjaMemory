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
        
        if($(this).attr("reveal") == "true" || active_card_2 != null){
            return false;
        }
        else{

            number_of_cards++;

           $(this).css({"background": $(this).data("url"), 
                        "background-position": "center", 
                        "background-size": "cover", 
                        "background-repeat": "no-repeat"});

            if(number_of_cards<2){
                active_card = $(this);
            }
            else{
                number_of_moves++;
                number_of_moves_showed.text(number_of_moves);
                
                number_of_cards = 0;

                    active_card_2 = $(this);

                    if(active_card.data("url") != $(this).data("url")){
                        setTimeout(function(){
                            active_card.css("background", "#25EF39");
                            active_card_2.css("background", "#25EF39");
                            active_card.attr("reveal", "false");
                            active_card_2.attr("reveal", "false");
                            active_card_2 = null;
                        }, 500);    
                    }
                    else{
                        active_card.attr("reveal", "true");
                        active_card_2.attr("reveal", "true");
                        active_card_2 = null;
                        complete_pairs++;
                        
                        setTimeout(function(){
                            if (complete_pairs == "3"){
                                alert("Wygrałeś!\nCzas gry: " + seconds + "\nLiczba ruchów: " + number_of_moves);
                                $('.game-card').css("background", "#25EF39");
                                $('.game-card').attr("reveal", "false");
                                complete_pairs = 0;
                            }
                        }, 300);  
                    }
            }

        }

        $(this).attr("reveal", "true");
    });

    var start = Date.now();
    setInterval(function() {
        var delta = Date.now() - start; // milliseconds elapsed since start
        seconds = Math.floor(delta / 1000);
        timer.text(seconds);
    }, 1000);

});