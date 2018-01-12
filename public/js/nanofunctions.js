    
function btc_submit_new_address() {
        
    var data_url =  "/app/requests/new_address";
    $.ajax({
        type: "POST",
        url: data_url,
        data: $("#form_new_address").serialize(),
        dataType: "json",
        success: function (data) {
            if(data.status == "success") {
                btc_refresh_addresses();
                $("#html_new_address_results").html(data.msg);
                $("#modal_new_address").delay(5000).modal("hide");
            } else {
                $("#html_new_address_results").html(data.msg);
            }
        }
    });
}

function btc_refresh_addresses() {
	var data_url = "/app/requests/refresh_addresses";
	$.ajax({
		type: "POST",
		url: data_url,
		dataType: "html",
		success: function (data) {
			$("#btc_addresses").html(data);
		}
	});
}
