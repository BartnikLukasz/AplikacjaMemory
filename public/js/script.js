var $ = jQuery;
$(function(){

    /* Ścieżka dźwiękowa */
    var audio = new Audio("../music/background_music.mp3");
    audio.loop = true;
    $(document).on('click', '.sound-button', function(){
        
        if(audio.paused){
            audio.play();
            $('.sound-button .bi.bi-volume-up-fill').show();
            $('.sound-button .bi.bi-volume-mute-fill').hide();
        } else{
            audio.pause();
            $('.sound-button .bi.bi-volume-up-fill').hide();
            $('.sound-button .bi.bi-volume-mute-fill').show();
        }
    });


    /*Odblokowywanie katagorii użytkowników */
    $(document).ready(function(){
        if($(".categories-default-unlocked").length >= 8){
            $("div").removeClass("categories-non-default-locked");
        }
    });
    
});