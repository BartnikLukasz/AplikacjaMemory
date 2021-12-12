var $ = jQuery;
$(function(){
    var active_card = null;
    var active_card_2 = null;
    var number_of_cards = 0;
    var complete_pairs = 0;
    var number_of_moves = 0;
    var seconds = 0;
    var minutes = 0;
    var timerInterval = null;
    var diffucultLevel = $('#levelDifficultySend').val();
    var gamePart = 1;

    $(document).ready(function(){
        $('.game-card').each(function() {
            $(this).css({"background": $(this).data("url"), 
            "background-position": "center", 
            "background-size": "cover", 
            "background-repeat": "no-repeat"});
        });
        if(diffucultLevel == 2){
            $(".word").css("bottom", "20px");
            $(".word h3").css("font-size", "1.6em");
        }
        else if(diffucultLevel == 3){
            $(".word").css("bottom", "10px");
            $(".word h3").css({"font-size": "1.4em", "letter-spacing": "initial"});
        }
    });
    
    $(document).on('click', '.game-card', function(){

        if(active_card == null){ 

            timerInterval = setInterval(function() {
               gameTimer()
            }, 1000);

        };
        
        if($(this).attr("reveal") == "true" || active_card_2 != null) return false;
        else{
            number_of_cards++;
            
            addImageBackgroundtoCard($(this));

            if(gamePart == 1 || gamePart == 2 && number_of_cards<2) $(this).find('.word').show();
            else if(gamePart == 3 && number_of_cards == 2) wordOnCardCenter($(this));
                            
            if(number_of_cards<2) active_card = $(this);
            else{

                active_card_2 = $(this);
                number_of_moves++;
                $("#moves").text(number_of_moves);
                number_of_cards = 0;

                if(active_card.data("url") != active_card_2.data("url")){

                    setTimeout(function(){
                        hideCards(active_card, active_card_2, gamePart);
                        active_card_2 = null;
                    }, 500);   

                } else{
                    if(gamePart == 3) createOutlines(active_card, active_card_2);

                    active_card.attr("reveal", "true");
                    active_card_2.attr("reveal", "true");
                    complete_pairs++;
                    active_card_2 = null;

                    setTimeout(function(){
                        if ((complete_pairs == "3" && diffucultLevel == 1) ||
                            (complete_pairs == "6" && diffucultLevel == 2) ||
                            (complete_pairs == "10" && diffucultLevel == 3)){

                            if(gamePart == 3) endGame();
                            else nextGamePart();
                        }
                    }, 300);  
                }
            }
        }
        $(this).attr("reveal", "true");
    });

    function gameTimer(){
        if (seconds === 59){ minutes++; seconds = 0;}
        else seconds++;
        
        if (seconds < 10) $("#timer").text(minutes+":0"+seconds);
        else $("#timer").text(minutes+":"+seconds);
    }

    function addImageBackgroundtoCard(revealCard){
        revealCard.find(".game-card-hide").hide();
    }

    function hideCards(card_1, card_2, gamePart){
        card_1.find(".game-card-hide").show();
        card_2.find(".game-card-hide").show();
        card_1.attr("reveal", "false").find('.word').hide();
        card_2.attr("reveal", "false").find('.word').hide();
        if(gamePart==3){ card_2.css({"background": card_2.data("url"), 
            "background-position": "center", 
            "background-size": "cover", 
            "background-repeat": "no-repeat"}) };
    }

    function wordOnCardCenter(onlyWordCard){
        onlyWordCard.css("background", "#fff");
        onlyWordCard.find('.word').show().css({"bottom": "50%", 
                                               "transform": "translateX(-50%) translateY(50%)", 
                                               "background-color": "initial",
                                               "border-width": "initial",
                                               "border-style": "initial"});
    }

    function createOutlines(card_1, card_2){
        var randomColor = (0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6);
        card_1.css("outline", "3px solid #"+randomColor);
        card_2.css("outline", "3px solid #"+randomColor);
    }

    function nextGamePart(){
        gamePart++;
        $("#gamePart").text(gamePart);
        $('.game-card .game-card-hide').show();
        $('.game-card').attr("reveal", "false");
        $('.word').hide();
        complete_pairs = 0;
    }

    function endGame(){
        clearInterval(timerInterval);
        $('#quit-game-button').hide();
        $('#end-game-form').show();

        var scoreSend = $('#score');
        var multiplier = $('#multiplier').val();
        var minMoves = 0; 

        if (diffucultLevel == 1) minMoves = 9;
        else if(diffucultLevel == 2) minMoves = 18;
        else minMoves = 30;

        var endSeconds = minutes*60 + seconds;

        scoreSend.val(Math.round((100-(100*(number_of_moves/(minMoves*3))*(endSeconds/(90*multiplier))))*multiplier));
        if(scoreSend.val()<1) scoreSend.val(1);
        
        if (seconds < 10) $('#timeP').text( minutes+":0"+seconds);
        else $('#timeP').text(minutes+":"+seconds);
        
        $('#time').val(endSeconds);
        $('#numberOfMovesP').text(number_of_moves);
        $('#scoreP').text(scoreSend.val());
    }
});