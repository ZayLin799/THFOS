function toggle(IDS) {
  function myFunction(x) {
    if (x.matches) { // If media query matches
      document.getElementById("mySidepanel").style.width = "0";
    } else {
      
    }
  }
  var x = window.matchMedia("(max-width: 780px)");
  myFunction(x);
  x.addListener(myFunction);
    // document.getElementById("mySidepanel").style.width = "0";
    var sel = document.getElementById('pg-content').getElementsByClassName('pg-content');
    for (var i=0; i<sel.length; i++) { 
      if (sel[i].id != IDS) { sel[i].style.display = 'none'; }
      else{sel[i].style.display = 'block';}
    }
    var status = document.getElementById(IDS).style.display;
    // if (status == 'block') { document.getElementById(IDS).style.display = 'none'; }
    //                   else { document.getElementById(IDS).style.display = 'block'; }
      
    // function show(id) {
    //   if(visibleId !== id) {
    //     visibleId = id;
    //   } 
    //   hide();
    // }
    // function hide() {
    //   var div, i, id;
    //   for(i = 0; i < divs.length; i++) {
    //     id = divs[i];
    //     div = document.getElementById(id);
    //     if(visibleId === id) {
    //       div.style.display = "block";
    //     } else {
    //       div.style.display = "none";
    //     }
    //   }
    return false;

  }

////////////////vendobox//////////////////////////////
  $(document).ready(function(){
    $('.venobox').venobox({
        framewidth : '600px',                            // default: ''
        frameheight: 'auto',                            // default: ''
        border     : '2px',                             // default: '0'
        bgcolor    : '#ffffff60',                          // default: '#fff'
        titleattr  : 'data-title',                       // default: 'title'
        numeratio  : true,                               // default: false
        infinigall : false,                               // default: false
        share      : ['facebook', 'twitter', 'download'] // default: []
    });
});
  
  
  