var $ = jQuery;
$(function(){
    var audio = new Audio("../music/background_music.mp3");
    audio.loop = true;
    $(document).on('click', '.sound-button', function(){
        
        if(audio.paused){
            audio.play();
            $('.sound-button .bi.bi-volume-up-fill').css("display", "block");
            $('.sound-button .bi.bi-volume-mute-fill').css("display", "none");
        } else{
            audio.pause();
            $('.sound-button .bi.bi-volume-up-fill').css("display", "none");
            $('.sound-button .bi.bi-volume-mute-fill').css("display", "block");
        }
    });
    
});