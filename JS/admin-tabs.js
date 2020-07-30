// Add JQuery to html/php page.
var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

// Run onload on window load to prevent jquery running first.
window.addEventListener ? 
window.addEventListener("load",onload,false) : 
window.attachEvent && window.attachEvent("onload", onload);

function onload(){ 
    $("td input").html('');

    // Change Paid State Funtionality
    $("div.tabs input").click(function(){
        // Get the id of the Ticket Purchase
        id = $(this).attr("class")
        section = $(this).closest("div").attr("class")
        // Get if the box is being checked.
        checked = $(this).is(':checked')
        // Create a url for the ajax request
        let url = "setpaid.php?id=" + id + "&paid=" + checked
        $.ajax({url, success: function(result){
            // Split result into its parts  
            result = result.split(",")
            // Convert bool to int
            i = checked ? 1 : 0;
            // If the result is different from the checked state of the box.
            if(parseInt(result[0]) != i){
                // Alert the user.
                alert("Error \n Refresh the page and retry")
                //Then return the checkbox to its original state.
                $("input." + id).prop( "checked", !checked)
            }
            else {
                // Else change the colour
                colourClass = parseInt(result[0]) ? "green" : (parseInt(result[1]) ? "orange" : "red");
                $("div input." + id).parent().parent().children().first().attr("class", colourClass);
            }
        }
    });
    });
}


function reload() {
    window.location.reload(false); 
}

function setactive(id){
    // The tab select menu using classes to show and hide the different pages.
    $(".tab-menu li").removeClass("active")
    $("#" + id).addClass("active")
    $(".tabs").children().addClass("hidden")
    $("." + id).removeClass("hidden")
}