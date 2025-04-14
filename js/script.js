function toggleReasonField(select, orderId) {
    const reasonField = document.getElementById(`reason${orderId}`);
    reasonField.style.display = select.value === 'cancelled' ? 'block' : 'none';
}