var count = 1; 

function addData() {
    var no = document.getElementById("no").value;
    var name = document.getElementById("name").value;
    var nim = document.getElementById("nim").value;
    var jurusan = document.getElementById("jurusan").value;

    if (no === "" || name === "" || nim === "" || jurusan === "") {
        alert("Mohon lengkapi semua inputan!");
        return;
    }

    var table = document.getElementById("attendance").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);

    cell1.innerHTML = no;
    cell2.innerHTML = name;
    cell3.innerHTML = nim;
    cell4.innerHTML = jurusan;

    cell1.innerText = count; 
    count++; 

    cell5.innerHTML = '<button onclick="editData(this)">Edit</button> <button onclick="deleteData(this)">Hapus</button>';

    document.getElementById("form").reset();
}

function editData(row) {
    var currentRow = row.parentNode.parentNode;
    var cells = currentRow.getElementsByTagName("td");
    var no = cells[0].innerText; 
    var name = cells[1].innerText; 
    var nim = cells[2].innerText; 
    var jurusan = cells[3].innerText; 

    document.getElementById("no").value = no;
    document.getElementById("name").value = name;
    document.getElementById("nim").value = nim;
    document.getElementById("jurusan").value = jurusan;

    currentRow.remove(); 
}


function deleteData(row) {
    var currentRow = row.parentNode.parentNode;
    currentRow.remove(); 
}

// JAVASCRIPT SOAL 1
function showDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.style.display = "block";
}

function hideDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.style.display = "none";
}

document.addEventListener("DOMContentLoaded", function() {
    var dropdown = document.querySelector(".dropdown");
    dropdown.addEventListener("mouseleave", function() {
        hideDropdown();
    });
});

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
}
