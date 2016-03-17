var Contacts = {
	init: function() {
		$("form").on("submit", function(event) {
		    event.preventDefault();
		    Contacts.addContact(this);
		});
	},
	addContact: function(oForm) {
		$.post("api/contacts/add", {data: $(oForm).serialize()})
		.done(function(data) {
			$("#message-error, #message-success").hide();
		    if (data.status == 'success') {
		    	$("#message-success").html("Contact was added successfully!");
		    	$("#message-success").show();
		    } else if (data.status == 'failure') {
		    	$("#message-error").html(data.error);
		    	$("#message-error").show();
		    }
		    oForm.reset();
		});
	}
};
Contacts.init();