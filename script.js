function openNewModal() {
    document.getElementById('sign-in-modal').style.display='none';
    document.getElementById('not-customer-modal').style.display='block';
}

function goBack() {
    document.getElementById('not-customer-modal').style.display='none';
    document.getElementById('sign-in-modal').style.display='block';
}

function closeNewModal() {
    document.getElementById('not-customer-modal').style.display='none';
}

function doSomething() {
    // Do something when the "Do Something" button is clicked
}