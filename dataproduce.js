const productse = [{
    id: 1,
    name: "មីជាតិ",
    price: 1000,
    category: "Food",
    image: "a2.jpg",
    description: "មីជាតិ ត្រូវបានផលិតឡើងតាំងពីចុងឆ្នាំ ២០១៩ មកម្លេះ ដោយមានរោងចក្រនៅខ្មែរ និងអ្នកជំនាញខ្មែរជាអ្នកផលិត១០០%។",
    tag: "Premium",
    classe: "tag-premium",
    made: "Made by Cambodia",
    exams: 13,
}, {
    id: 2,
    name: "Vital Water",
    price: 1000,
    category: "Drink",
    image: "a1.jpg",
    description: "Access to clean water provides an important pathway to better health, regular school attendance, and improved quality of life for families. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Made in Cambodia",
    exams: 17,

}, {
    id: 3,
    name: "Cambodia Water",
    price: 1000,
    category: "Drink",
    image: "a1.jpg",
    description: "Access to clean water provides an important pathway to better health, regular school attendance, and improved quality of life for families.",
    tag: "Premium",
    classe: "tag-premium",
    made: "Made in Cambodia",
    exams: 15,

}, {
    id: 4,
    name: "Premiun Water",
    price: 1000,
    category: "Drink",
    image: "a1.jpg",
    description: "Access to clean water provides an important pathway to better health, regular school attendance, and improved quality of life for families.",
    tag: "Premium",
    classe: "tag-premium",
    made: "Made in Cambodia",
    exams: 15,

}, {
    id: 5,
    name: "Eragold",
    price: 1000,
    category: "Drink",
    image: "a1.jpg",
    description: "Access to clean water provides an important pathway to better health, regular school attendance, and improved quality of life for families.",
    tag: "Premium",
    classe: "tag-premium",
    made: "Made in Cambodia",
    exams: 15,

}, {
    id: 6,
    name: "Kulen Water",
    price: 1000,
    category: "Drink",
    image: "a1.jpg",
    description: "Access to clean water provides an important pathway to better health, regular school attendance, and improved quality of life for families.",
    tag: "Premium",
    classe: "tag-premium",
    made: "Made in Cambodia",
    exams: 15,

}, ];
const scanner = document.querySelector(".product");
const linkcat = document.querySelectorAll("div")
window.addEventListener('DOMContentLoaded', () => {
    displayProduct(productse);

    // console.log(displaydata);
});
linkcat.forEach((forClick) => {
    forClick.addEventListener("click", (e) => {
        const category = e.target.dataset.id;
        const productCategory = productse.filter(function(data) {
            if (data.category === category) {
                return data;
            }
        });

        if (category === "All") {
            displayProduct(productse);
        } else {
            displayProduct(productCategory);
        }
    });
});

function displayProduct(productAll) {
    let displaydata = productAll.map(function(category) {
        return `
        <div class="cards-controll">
            <div class="inside-card">
                <div class="terminal-top">
                    <div class="dots-3">
                        <div class="dot-child-1"></div>
                        <div class="dot-child-2"></div>
                        <div class="dot-child-3"></div>
                    </div>
                    <div class="title-premiun">${category.tag} Product</div>
                    <div class="${category.classe}">${category.tag}</div>
                </div>
                <div class="card-bodys">
                    <div class="card-bodys-top">
                        <img src="${category.image}" alt="${category.name}">
                        <span class="h2">${category.name}</span>
                    </div>
                    <p class="card-p">${category.description}</p>
                </div>
                <div class="card-bodys-bottom">
                    <div class="card-list">
                        <div class="card-list-left">
                            <span><i class="fas fa-book-open"></i>&nbsp 3 Model</span>
                            <span><i class="fa fa-pencil-square"></i>&nbsp ${category.exams} exams</span>
                        </div>
                        <div class="card-list-right">
                            <span><i class="fa fa-clock"></i>&nbsp 9.5 Quality</span>
                            <span><i class="fa fa-file-text"></i>&nbsp 5 Rated</span>
                        </div>
                    </div>
                    <p class="card-tag-p">${category.made}, Price :${category.price}&nbspRiel</p>
                </div>
                <div class="btn-enroll">
                    <a href="#none">Enroll Now</a>
                </div>
            </div>
        </div>

        `;
    })
    displaydata = displaydata.join("");
    scanner.innerHTML = displaydata;

}
document.getElementById('ContentProduce').innerHTML = `
    <div class="product">
         <div class="produce">
        <div class="controll">
            <div class="title"></div>
            <div class="name"></div>
            <div class="price"></div>
            <div class="image">
                <img src="" alt="image">
            </div>
        </div>
    </div>
    </div>
`;