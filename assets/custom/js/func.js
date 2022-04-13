(function($){

    $(window).on('load', () => {
        $('#preloader').fadeOut()
    })

    $('.mobile-toggle').click( function (){
        $('.sidebar').toggleClass('mobile')
    })

    loadNominees = (url) => {
        $.ajax({
            method: 'POST',
            url: url
        })
        .done( (response) => {
            var data = JSON.parse(response)
            if(data.length > 0){
                var strikerCount = midfielderCount = defenderCount = keeperCount = 0;
                data.forEach( e => {
                    if(e.type == 'Striker'){
                        var entry = `<div class="image">
                            <img class="img-fluid" src="http://localhost/poll(mod)/assets/img/nom/${e.image}" alt="" >
                        </div>`
                        $('#strikers').prepend(entry)
                        strikerCount++
                    }
                    else if(e.type == 'Midfielder'){
                        var entry = `<div class="image">
                            <img class="img-fluid" src="http://localhost/poll(mod)/assets/img/nom/${e.image}" alt="" >
                        </div>`
                        $('#midfielder').prepend(entry)
                        midfielderCount++
                    }                    
                    else if(e.type == 'Defender'){
                        var entry = `<div class="image">
                            <img class="img-fluid" src="http://localhost/poll(mod)/assets/img/nom/${e.image}" alt="" >
                        </div>`
                        $('#defender').prepend(entry)
                        defenderCount++
                    }
                    else{
                        var entry = `<div class="image">
                            <img class="img-fluid" src="http://localhost/poll(mod)/assets/img/nom/${e.image}" alt="" >
                        </div>`
                        $('#keeper').prepend(entry)
                        keeperCount++
                    }
                })
            }
        })
        .fail( (response) => {
            alert('Problem loading page....Try reloading page')
        })
    }

    counts = (url) => {
        $.ajax({
            url: url,
            method: 'POST'
        })
        .done( (response) =>{
            var data = JSON.parse(response)
            $('#countNom').html(data.nominees)
            $('#countVot').html(data.voters)
        })
    }
    
}(jQuery))