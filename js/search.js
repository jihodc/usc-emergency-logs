// Toggle navigation menu
$(".menu-icon").click(function() {
	$("#nav-links").slideToggle("100");
});

// Toggle filter
$("#filter h6").click(function() {
	$("#detail").slideToggle("100");
});

// Keyword click
$(".tag").click(function() {
	$("input[name='log-search']").val($(this).html());
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