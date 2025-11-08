 JavaScript validation and form message
document.getElementById("ticketForm").addEventListener("submit", function(event) {
    const from = document.querySelector("select[name='from']").value;
    const to = document.querySelector("select[name='to']").value;

    if (from === to) {
        alert("Departure and Destination cannot be the same!");
        event.preventDefault();
        return;
    }

    alert("✅ Your ticket request has been sent to the server!");
});