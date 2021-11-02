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
    var minutes = 0;
    var timerInterval = null;

    $(document).on('click', '.game-card', function(){
        
        if(active_card == null){
            //var start = Date.now();
            timerInterval = setInterval(function() {
               // var delta = Date.now() - start; 
               // seconds = Math.floor(delta / 1000);

                if (seconds === 59){
                    minutes++;
                    seconds = 0;
                } else{
                    seconds++;
                }

                if (seconds < 10){
                    timer.text(minutes+":0"+seconds);
                } else{
                    timer.text(minutes+":"+seconds);
                }
            }, 1000);
       }
        
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
                                if (seconds < 10){
                                    alert("Wygrałeś!\nCzas gry: " + minutes + ":0" + seconds + "\nLiczba ruchów: " + number_of_moves);
                                } else{
                                    alert("Wygrałeś!\nCzas gry: " + minutes + ":" + seconds + "\nLiczba ruchów: " + number_of_moves);
                                }
                                $('.game-card').css("background", "#25EF39");
                                $('.game-card').attr("reveal", "false");
                                complete_pairs = 0;

                                clearInterval(timerInterval);
                                active_card = null;
                                minutes = 0;
                                seconds = 0;
                                timer.text("0:00");
                                number_of_moves = 0;
                                number_of_moves_showed.text(0);
                                
                            }
                        }, 300);  
                    }
            }

        }

        $(this).attr("reveal", "true");
    });

});