function openSignUpModal() {
    document.getElementById('sign-in-modal').style.display='none';
    document.getElementById('sign-up-modal').style.display = 'block';
}

function closeSignUpModal() {
    document.getElementById('sign-up-modal').style.display = 'none';
}

function goBackSignUp() {
    document.getElementById('sign-up-modal').style.display='none';
    document.getElementById('sign-in-modal').style.display='block';
}

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

function openAdminModal() {
    document.getElementById('not-customer-modal').style.display='none';
    document.getElementById('admin-modal').style.display='block';
}

function goBackAdmin() {
    document.getElementById('admin-modal').style.display='none';
    document.getElementById('not-customer-modal').style.display='block';
}

function openEmployeeModal() {
    document.getElementById('not-customer-modal').style.display='none';
    document.getElementById('employee-modal').style.display='block';
}

function goBackEmployee() {
    document.getElementById('employee-modal').style.display='none';
    document.getElementById('not-customer-modal').style.display='block';
}