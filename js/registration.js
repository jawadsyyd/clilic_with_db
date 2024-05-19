var fname = document.getElementById('fname'),
    lname = document.getElementById('lname'),
    email = document.getElementById('email'),
    username = document.getElementById('username'),
    password = document.getElementById('password'),
    role = document.getElementById('role'),
    dateOfBirth = document.getElementById('dob'),
    gender = document.getElementById('gender'),
    phone = document.getElementById('phone'),
    emrgencyPhone = document.getElementById('emrgencyPhone'),
    submitBtn = document.getElementById('submit'),
    labelDob = document.querySelector('.ldob'),
    labelGender = document.querySelector('.lgender'),
    labelphone = document.querySelector('.lphone'),
    labelemergency = document.querySelector('.lemergency');

// d-none
role.addEventListener('change', () => {
    if (role.value == 'Patient') {
        document.getElementById('dob').classList.toggle('d-none');
        document.getElementById('gender').classList.toggle('d-none');
        document.getElementById('phone').classList.toggle('d-none');
        document.getElementById('emrgencyPhone').classList.toggle('d-none');
        document.querySelector('.ldob').classList.toggle('d-none');
        document.querySelector('.lgender').classList.toggle('d-none');
        document.querySelector('.lphone').classList.toggle('d-none');
        document.querySelector('.lemergency').classList.toggle('d-none');
    } else {
        document.getElementById('dob').classList.toggle('d-none');
        document.getElementById('gender').classList.toggle('d-none');
        document.getElementById('phone').classList.toggle('d-none');
        document.getElementById('emrgencyPhone').classList.toggle('d-none');
        document.querySelector('.ldob').classList.toggle('d-none');
        document.querySelector('.lgender').classList.toggle('d-none');
        document.querySelector('.lphone').classList.toggle('d-none');
        document.querySelector('.lemergency').classList.toggle('d-none');
    }
})