function showDropdown() {
    var dropdownContent = document.getElementById("dropdownContent"); dropdownContent.style.display = "block";
    }
    function hideDropdown() {
    var dropdownContent = document.getElementById("dropdownContent"); dropdownContent.style.display = "none";
    }
    document.addEventListener("DOMContentLoaded", function() { var dropdown = document.querySelector(".dropdown"); dropdown.addEventListener("mouseleave", function() { hideDropdown();
    });
    });
    
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content"); var i;
             for (i = 0; i < dropdowns.length; i++) { var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") { openDropdown.style.display = "none";
             }
         }
    }
}
    