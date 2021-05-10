// Check if username or password is not empty
document.querySelector('form').onsubmit = function(event) {
    if(document.querySelector('input[name=username]').value.trim().length == 0 || document.querySelector('input[name=password]').value.trim().length == 0) {
        alert("PLEASE ENTER BOTH USERNAME AND PASSWORD!");
        // stop from being submitted
        event.preventDefault();
        // Empty out the values
        document.querySelector('input[name=username]').value = "";
        document.querySelector('input[name=password]').value = "";
    }
}