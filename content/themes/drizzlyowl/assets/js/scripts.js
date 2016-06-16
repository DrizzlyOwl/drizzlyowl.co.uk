/**
 * Scripts.js
 * Require scripts for use with Browserify
 */

var body = document.getElementById("body");
var navToggle = document.getElementById("navToggle");
var sidebarToggle = document.getElementById("sidebarToggle");

navToggle.addEventListener("click", function(){
    if (classie.has(navToggle,"fa-bars")) {
        classie.remove(navToggle,"fa-bars");
        classie.add(navToggle,"fa-close")
        classie.toggle(body, "active")
    } else {
        classie.remove(navToggle,"fa-close");
        classie.add(navToggle,"fa-bars");
        classie.toggle(body, "active")
    }
});

sidebarToggle.addEventListener("click", function(){
    if (classie.has(sidebarToggle,"fa-arrow-left")) {
        classie.remove(sidebarToggle,"fa-arrow-left");
        classie.add(sidebarToggle,"fa-arrow-right")
        classie.toggle(body, "close-sidebar")
    } else {
        classie.remove(sidebarToggle,"fa-arrow-right");
        classie.add(sidebarToggle,"fa-arrow-left");
        classie.toggle(body, "close-sidebar")
    }
});

var easter_egg = new Konami();
easter_egg.code = function() { 
    classie.toggle(body, "konami");
}
easter_egg.load();