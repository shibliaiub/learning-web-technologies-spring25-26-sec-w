// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    const unitPrice = 1000;          // Fixed unit price
    const quantityInput = document.getElementById("quantity");
    const totalPriceField = document.getElementById("totalPrice");

    // Function to update total price and check coupon eligibility
    function updateTotal() {
        let quantity = parseInt(quantityInput.value);

        // Validation: if quantity is negative or NaN, reset to 0
        if (isNaN(quantity) || quantity < 0) {
            quantity = 0;
            quantityInput.value = 0;
        }

        // Calculate total
        const total = unitPrice * quantity;
        totalPriceField.value = total;

        // Gift coupon notification if total exceeds 1000
        if (total > 1000) {
            alert("Congratulations! You are now eligible for a gift coupon.");
        }
    }

    // Add event listener for 'input' event (real-time as user types)
    quantityInput.addEventListener("input", updateTotal);

    // Initial update to set total to 0
    updateTotal();
});