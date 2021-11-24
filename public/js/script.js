var $ = jQuery;
$(function(){

    /* Ścieżka dźwiękowa */
    var audio = new Audio("../../music/background_music.mp3");
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
        if(!$(".categories-default-locked").length){
            $("div").removeClass("categories-non-default-locked");
        }
    });


    /*Walidacja w trakcie dodawania kategorii */ 
    var submitButton = $('#add-category .add-category-button');
    var values = [];
    var submitAccept = 0;
    $(document).on('click', '#add-category .add-category-button', function(){

        //Sprawdzanie powtórzeń nazwy
        $('input[name="words[]"]').each(function(){
            if($.inArray(this.value, values) >= 0) {
                submitAccept = 0;
                alert("Nazwy obrazków nie mogą się powtarzać");
                return false;
                
            } else{
                submitAccept++;
            }
            values.push(this.value);
        });
        values = [];

        //Sprawdzanie ilości obrazków
        if($('.add-category-img').length < 10){
            alert("Dodaj minimum 10 obrazków")
            submitAccept = 0;
        } else{
            submitAccept++;
        } 

        //Sprawdzanie unikalności nazwy podczas edycji kategorii
        var titleLength = $('.category-title').length;
        $('.category-title').each(function(index){
            values.push($(this).text());
            if(index === titleLength-1){
                $('input[name="words[]"]').each(function(){
                    if($.inArray(this.value, values) >= 0) {
                        submitAccept = 0;
                        alert("Nazwy obrazków nie mogą się powtarzać");
                        return false;
                    } 
                });
            }
        });
        values = [];


        if(submitAccept >= 2){
            submitButton.attr("type", "submit");
            submitAccept = 0;
        }

    });

    //Funkcja sprawdzająca podczas edycji kategorii czy usuwając zdjęcie nie zostanie mniej niż 10
    $(document).on("click", ".delete-image", function(){
        if($('.add-category-img').length <= 10){
            alert("Kategoria musi zawierać minimum 10 obrazków.");
            return false;
        }
    });


    //Zamknięcie samouczka po naciśnięciu przycisku
    $(document).on("click", ".tutorial-close", function(){
        $('.tutorial').hide();
    });


    //Walidacja podczas procesu zmiany hasła
    $(document).on("click", "input[value='Zmień hasło']", function(){
        if($('#newPassword').val() != $('#newPassword-confirm').val() ){
            $('.newPassword-confirm-alert').show();
            return false;
        }
    });

    

    
    
});