const searchBarToggler = document.querySelector("#button-search-toggler");
const backButton = document.querySelector("#back-button");
const responsiveDropdown = document.querySelector("#responsive-dropdown");
const responsiveSearchInput = document.querySelector("#responsive-inputSearch");
const searchInput = document.querySelector("#inputSearch");
const dropdown = document.querySelector("#dropdown");

// responsiveSearchInput.addEventListener("input", (e) => {
//   const xhttp = new XMLHttpRequest();
//   xhttp.onload = () => {
//     while (responsiveDropdown.hasChildNodes()) {
//       responsiveDropdown.removeChild(responsiveDropdown.firstChild);
//     }
//     let res = xhttp.responseText;
//     res = JSON.parse(res);
//     if (res.length <= 0) {
//       responsiveDropdown.innerHTML += `<li><a class="dropdown-item" href="#">
//                                   <div class="d-flex flex-column">
//                                     <h6 class="card-title">No product found</h6>
//                                   </div>
//                                 </a></li>`;
//     } else {
//       res.forEach((product, key) => {
//         if (key === 0) {
//           responsiveDropdown.innerHTML += `<li><a class="dropdown-item" href="product_detail.php?productID=${product.id}">
//                                     <div class="d-flex flex-column">
//                                       <h6 class="card-title">${product.name}</h6>
//                                       <p class="card-text">$ ${product.price} </p>
//                                     </div>
//                                   </a></li>`;
//         } else {
//           responsiveDropdown.innerHTML += `<li><hr class="dropdown-divider"></li>
//                                   <li><a class="dropdown-item" href="product_detail.php?productID=${product.id}">
//                                   <div class="d-flex flex-column">
//                                     <h6 class="card-title">${product.name}</h6>
//                                     <p class="card-text">$ ${product.price} </p>
//                                   </div>
//                                 </a></li>`;
//         }
//       });
//     }

//     responsiveDropdown.classList.add("show");
//   };
//   xhttp.open("GET", "products_search.php?search=" + e.target.value);
//   xhttp.send();
// });

// responsiveSearchInput.addEventListener("focusout", () => {
//   responsiveDropdown.classList.remove("show");
// });

// searchInput.addEventListener("input", (e) => {
//   const xhttp = new XMLHttpRequest();
//   xhttp.onload = () => {
//     while (dropdown.hasChildNodes()) {
//       dropdown.removeChild(dropdown.firstChild);
//     }
//     let res = xhttp.responseText;
//     res = JSON.parse(res);
//     if (res.length <= 0) {
//       dropdown.innerHTML += `<li><a class="dropdown-item" href="#">
//                                   <div class="d-flex flex-column">
//                                     <h6 class="card-title">No product found</h6>
//                                   </div>
//                                 </a></li>`;
//     } else {
//       res.forEach((product, key) => {
//         if (key === 0) {
//           dropdown.innerHTML += `<li><a class="dropdown-item" href="product_detail.php?productID=${product.id}">
//                                     <div class="d-flex flex-column">
//                                       <h6 class="card-title">${product.name}</h6>
//                                       <p class="card-text">$ ${product.price} </p>
//                                     </div>
//                                   </a></li>`;
//         } else {
//           dropdown.innerHTML += `<li><hr class="dropdown-divider"></li>
//                                   <li><a class="dropdown-item" href="product_detail.php?productID=${product.id}">
//                                   <div class="d-flex flex-column">
//                                     <h6 class="card-title">${product.name}</h6>
//                                     <p class="card-text">$ ${product.price} </p>
//                                   </div>
//                                 </a></li>`;
//         }
//       });
//     }

//     dropdown.classList.add("show");
//   };
//   xhttp.open("GET", "products_search.php?search=" + e.target.value);
//   xhttp.send();
// });

// searchInput.addEventListener("focusout", () => {
//   dropdown.classList.remove("show");
// });

function displaySearch() {
  const brand = document.querySelector("#navbar-brand");
  const togglers = document.querySelector("#toggler-container");
  const responsiveSearch = document.querySelector("#responsive-search");

  brand.classList.add("d-none");
  togglers.classList.add("d-none");
  responsiveSearch.classList.remove("d-none");
}

function closeSearch() {
  const brand = document.querySelector("#navbar-brand");
  const togglers = document.querySelector("#toggler-container");
  const responsiveSearch = document.querySelector("#responsive-search");

  brand.classList.remove("d-none");
  togglers.classList.remove("d-none");
  responsiveSearch.classList.add("d-none");
}

searchBarToggler.addEventListener("click", () => displaySearch());
backButton.addEventListener("click", () => closeSearch());
