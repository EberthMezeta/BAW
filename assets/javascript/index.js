const searchInput = document.getElementById("Search");
const searchButton = document.getElementById("searchButton");
const 

const validateBarSearch = () => {
    const valueInput = searchInput.value;
    if (valueInput.trim() !== "") {
        return true;
    }
    return false;    
}

searchButton.addEventListener("click",()=>{
    
    if(validateBarSearch()){
        
    }
    alert("Barra de busqueda vacía");
});

