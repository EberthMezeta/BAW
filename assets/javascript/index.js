const searchInput = document.getElementById("Search");
const searchButton = document.getElementById("searchButton");
const containerArticles = document.getElementById("articles-container");
const categorySelect = document.getElementById("Category");

const validateBarSearch = () => {
  const valueInput = searchInput.value;
  if (valueInput.trim() !== "") {
    return true;
  }
  return false;
};

const getResponse = async () => {
  try {
    let Search = searchInput.value;
    let Category = categorySelect.value;
    const res = await fetch(
      `http://localhost/BAW/services/service.php?q=${Search}&c=${Category}`,
      {
        method: "GET",
        headers: {
          "Accept-Language": window.navigator.language.toString(),
        },
      }
    );
    containerArticles.innerHTML = await res.text();
  } catch (error) {
    console.log(error);
    containerArticles.innerHTML = "ocurrio un error indesperado";
  }
};

searchButton.addEventListener("click", () => {
  if (validateBarSearch()) {
    getResponse();
    return;
  }
  alert("Barra de busqueda vacía");
});
