// Toggle navigation menu
$(".menu-icon").click(function() {
	$("#nav-links").slideToggle("100");
});

// Toggle filter
$("#filter h6").click(function() {
	$("#detail").slideToggle("100");
});

// Keyword click
// Event Delegation
$("#frequent-incidents").on("click", "div", function(event) {
	if($("#detail").css("display") == "none") {
		$("#detail").slideToggle("100");
	}
	// $("input[name='log-search']").val($(this).html().toLowerCase());
	$("select").val($(this).data("id"));

});

// Toggle stack-map display
// Event Delegation
$("#stack-map").click(function() {
	$("#stack", this).toggleClass("selected");
	$("#outcome-stack").toggleClass("hide");
	$("#map", this).toggleClass("selected");
	$("#outcome-map").toggleClass("hide");
});

// Toggle the details of the result panel
$(".result-card").click(function() {
	$(".details", this).slideToggle("100");
})

// Date checker
$("form").submit(function(event) {
	if($("input[name='date-start']").val() > $("input[name='date-end']").val()) {
		alert("From date must be earlier than to date. Please enter the date again");
		// stop from being submitted
		event.preventDefault();
		// Empty out the values
		$("input[name='date-start']").val("");
		$("input[name='date-end']").val("");
	}
})