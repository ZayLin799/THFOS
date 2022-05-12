let aa = $('#change_nav').waypoint(function(direction) {
    if(direction == "down"){
        //console.log("down");
     $('.header').removeClass("bg-light");
     $('.navbar').removeClass("navbar-light");
     $('.header-btn').removeClass("btn-outline-success");
     
     $('.header').addClass("bg-success");
     $('.navbar').addClass("navbar-dark");
     $('.header-btn').addClass("btn-outline-light");
     $('li.nav-item.active').css("border-bottom-color", "#fff");
     $('#active-a').css("color", "#fff")
    //$('.header').toggleClass("bg-light").toggleClass("bg-success")
    }else{
        //console.log("up");
        $('.header').removeClass("bg-success");
        $('.navbar').removeClass("navbar-dark");
        $('.header-btn').removeClass("btn-outline-light");
        $('.header').addClass("bg-light");
        $('.navbar').addClass("navbar-light");
        $('.header-btn').addClass("btn-outline-success");
        $('li.nav-item.active').css("border-bottom-color", "#0fa402");
        $('#active-a').css("color", "#0fa402");
    } 
    },{
        offset: '10%'
    })

    // let bb = $('#four').waypoint(function(direction) {
    //     if(direction == "down"){
    //         console.log("four down");
    //         $('.header').removeClass("bg-success");
    //         $('.navbar').removeClass("navbar-dark");
    //         $('.header').addClass("bg-light");
    //         $('.navbar').addClass("navbar-light");
    //     }else{
    //         console.log("four up");
    //     $('.header').removeClass("bg-light");
    //     $('.header').addClass("bg-success");
    //     $('.navbar').addClass("navbar-dark");
    //     //$('.header').toggleClass("bg-light").toggleClass("bg-warning")
    //     } 
    //     },{
    //         offset: '10%'
    // })