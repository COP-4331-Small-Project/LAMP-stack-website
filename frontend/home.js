$(() => {
	// Get user details
    $.ajax({
    	url: '/api/login.php',
    	method: 'POST',
    	success: (user) => {
    		$('#welcomeText').text('Welcome, ' + user.username);
    		$('body').addClass(user.house);
    	},
    	error: () => {
    		window.location = '/';
    	}
    });

    // Sets the table with the given contacts
    function setTable(contacts) {
    	const table = $('#contacts tbody').empty();
    	contacts.forEach((contact) => {
    		table.append(`
    			<tr>
    				<th>${contact.firstName}</th>
    				<th>${contact.lastName}</th>
    				<th>${contact.phoneNumber}</th>
    				<th>${contact.email}</th>
    				<th>${contact.house}</th>
    				<th>
    					...
					</th>
    			</tr>
			`);
    	});
    }

    $.ajax({
    	url: '/api/contacts/search.php',
    	method: 'GET',
    	success: (contacts) => {
    		setTable(contacts);
    	},
    	error: () => {

    	}
    });
});