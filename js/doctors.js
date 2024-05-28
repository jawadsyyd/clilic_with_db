
const submit = document.getElementById('submit');
var doctorFirstName = document.getElementById('doctorFirstName'),
    doctorLastName = document.getElementById('doctorLastName'),
    doctorLicenseNumber = document.getElementById('doctorLicenseNumber'),
    doctorPhoneNumber = document.getElementById('doctorPhoneNumber'),
    doctorSpeciality = document.getElementById('doctorSpeciality');
submit.onsubmit = () => {
    doctorFirstName.value = doctorLastName.value = doctorLicenseNumber.value = doctorPhoneNumber.value =
        doctorSpeciality.value = '';
};

function setButtonId(buttonId) {
    document.querySelector(".update-btn").value = buttonId;
    document.querySelector(".delete-btn").value = buttonId;
}

function removeTableRowsOnLoad() {

    const table = document.getElementById("doctorInfo");
    if (!table) {
        return;
    }

    const tr = table.querySelector("tr");
    if (!tr) {
        return;
    }

    tr.outerHTML = "<th>#</th><th>First Name</th><th>Last Name</th><th>License Number</th><th>Phone Number</th><th>Speciality</th><th>******</th>";
}

window.onload = removeTableRowsOnLoad;