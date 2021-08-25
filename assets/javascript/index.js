const searchInput = document.getElementById("Search");
const searchButton = document.getElementById("searchButton");

const validateBarSearch = () => {
    const valueInput = searchInput.value;
    if (valueInput == "") {
        alert("Ta vacio");
        return;
    }    
}

searchButton.addEventListener("click",()=>{
    alert("entro")
    validateBarSearch();
});

