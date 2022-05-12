/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

