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
    var valuesWords = [];
    var valuesWordsEdit = [];
    var submitAccept = 0;
    var imageNamesValidation = 0;
    $(document).on('click', '#add-category .add-category-button', function(){

        //Sprawdzanie powtórzeń nazwy obrazków
        $('input[name="words[]"]').each(function(){
            if( !$(this).val() ) {
                imageNamesValidation = 1;
            } else if($.inArray(this.value, valuesWords) >= 0) {
                submitAccept = 0;
                alert("Nazwy obrazków nie mogą się powtarzać");
                $(this).val("");
                
            } else{
                submitAccept++;
            }
            valuesWords.push(this.value);
        });
        valuesWords = [];
        if (imageNamesValidation == 1) {
            alert("Dodaj nazwy do wszystkich obrazków");
            imageNamesValidation = 0;
            return false;
        }

        //Sprawdzanie unikalności nazwy obrazków podczas edycji kategorii
        var titleLength = $('.category-title').length;
        $('.category-title').each(function(index){
            valuesWordsEdit.push($(this).text());
            if(index === titleLength-1){
                $('input[name="words[]"]').each(function(){
                    if($.inArray(this.value, valuesWordsEdit) >= 0) {
                        submitAccept = 0;
                        alert("Nazwy obrazków nie mogą się powtarzać");
                        $(this).val("");
                    } 
                });
            }
        });
        valuesWordsEdit = [];

        //Sprawdzanie liczby obrazków
        if($('.add-category-img').length < 10){
            alert("Dodaj minimum 10 obrazków");
            submitAccept = 0;
        } else submitAccept++; 
            
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