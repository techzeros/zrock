function myfirstest() {
    var id = 12; // A random variable for this example

$.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/app/ajaxtest', // This is the url we gave in the route
    data: {'id' : id}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
        console.log(response); 
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});
}


    
function btc_submit_new_address() {
        
    var data_url =  "/app/ajaxtest";
    $.ajax({
        type: "POST",
        url: data_url,
        data: $("#form_new_address").serialize(),
        dataType: "json",
        success: function (data) {
            if(data.status == "success") {
             //   btc_refresh_addresses();
                $("#html_new_address_results").html(data.msg);
                $("#modal_new_address").delay(5000).modal("hide");
            } else {
                $("#html_new_address_results").html(data.msg);
            }
        }
    });
}
