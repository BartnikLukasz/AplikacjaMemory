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
    var diffucultLevel = $('#levelDifficultySend').val();
    var gamePart = 1;

    if(diffucultLevel == 2){
        $(".word").css("bottom", "20px");
        $(".word h3").css("font-size", "1.6em");
    }
    else if(diffucultLevel == 3){
        $(".word").css("bottom", "10px");
        $(".word h3").css({"font-size": "1.4em", "letter-spacing": "initial"});
    }

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

            if(gamePart == 1){
                $(this).find('.word').show();
            }
            else if(gamePart == 2){
                if(number_of_cards<2){
                    $(this).find('.word').show();
                }
            }
            else{
                if(number_of_cards == 2){
                    $(this).find('.word').show().css({"bottom": "50%", "transform": "translateX(-50%) translateY(50%)"});
                    $(this).css("background", "#fff");
                }
            }            
            
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
                            active_card.find('.word').hide();
                            active_card_2.find('.word').hide();
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
                            if ((complete_pairs == "3" && diffucultLevel == 1) ||
                                (complete_pairs == "6" && diffucultLevel == 2) ||
                                (complete_pairs == "10" && diffucultLevel == 3) ){

                                if(gamePart == 3){
                                    endGame();
                                    clearInterval(timerInterval);
                                } else{
                                    gamePart++;
                                    $("#gamePart").text(gamePart);
                                    $('.game-card').css("background", "#25EF39");
                                    $('.game-card').attr("reveal", "false");
                                    $('.word').hide();
                                    complete_pairs = 0;
                                }

                            }
                        }, 300);  
                    }
            }

        }

        $(this).attr("reveal", "true");
    });

    function endGame(){
        var timeEndShow = $('#timeP');
        var movesEndShow = $('#numberOfMovesP');
        var scoreShow = $('#scoreP');
        var timeEndSend = $('#time');
        var scoreSend = $('#score');
        var multiplier = $('#levelDifficultySend').val();
        var minMoves = 0; //minimalna ilość ruchów konieczna do ukończenia poziomu
        if (multiplier == 1){
            minMoves = 9;
        } else if(multiplier == 2){
            minMoves = 18;
        } else{
            minMoves = 30;
        }
        var endSeconds = minutes*60 + seconds;
        
        timeEndSend.val(seconds);
        //scoreSend.val(Math.floor(150/((seconds/2)*(number_of_moves/(multiplier**5)))));
        //if(scoreSend.val()>500) scoreSend.val(500);

        scoreSend.val(Math.round((100-(100*(number_of_moves/(minMoves*3))*(endSeconds/(90*multiplier))))*multiplier));
        if(scoreSend.val()<1) scoreSend.val(1);
        
        if (seconds < 10){
            timeEndShow.text("Czas gry: "+ minutes+":0"+seconds);
        } else{
            timeEndShow.text("Czas gry: "+ minutes+":"+seconds);
        }
        movesEndShow.text("Liczba ruchów: " + number_of_moves);
        scoreShow.text("Zdobyte punkty: " + scoreSend.val());

        $('#quit-game-button').hide();
        $('#end-game-form').show();
    }


});