
// $(document).ready(function() {
//     $("#loading-overlay").fadeOut();
// });
  

// $(document).on("click", "a", function() {
//     $("#loading-overlay").fadeIn();
// });

$(document).ready(function() {
    $("#loading-overlay").fadeIn();
    setTimeout(function() {
        $("#loading-overlay").fadeOut();
    }, 800);
});