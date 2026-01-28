document.getElementById('sectionProduce').innerHTML = `
        <div id="ContentProduce"></div>
`;
const A_1xa1_x1 = [{
    id: 1,
    name: "Web Food Fresh",
    price: 2500,
    category: "Website",
    image: "https://i.pinimg.com/736x/4d/56/d9/4d56d92300967781fcd263b2e1320599.jpg",
    description: "A food website is an online platform that allows users to order food from local restaurants. ",
    tag: "Premium",
    classe: "tag-premium",
    made: "Both",
}, {
    id: 2,
    name: "Store TEO",
    price: 1000,
    category: "Website App",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIAf1NNqzVnIltHqrbfgtM5WuEpcbZwubmjQ&s",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}, {
    id: 3,
    name: "NEO Mall",
    price: 1000,
    category: "Website App",
    image: "https://i.pinimg.com/1200x/18/f4/d3/18f4d36e8324326d694f488722d7aa06.jpg",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}, {
    id: 4,
    name: "Bank NEO",
    price: 1000,
    category: "Website App",
    image: "https://i.pinimg.com/736x/25/2d/68/252d681479c4f4d23a482e186d60cc70.jpg",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}, {
    id: 5,
    name: "Food Order System",
    price: 1000,
    category: "Website App",
    image: "https://i.pinimg.com/1200x/93/e6/32/93e63237177ff474358e648da4cac1a0.jpg",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}, {
    id: 6,
    name: "Food Order System",
    price: 1000,
    category: "Website App",
    image: "https://i.pinimg.com/1200x/18/07/18/1807185b9ba437e95b90c8fedd7d5c26.jpg",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}, {
    id: 7,
    name: "Food Order System",
    price: 1000,
    category: "Website App",
    image: "https://i.pinimg.com/736x/23/86/fa/2386fa71d2bcc2cd9fd95bdadba81f46.jpg",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}, {
    id: 8,
    name: "Food Order System",
    price: 1000,
    category: "Website App",
    image: "https://i.pinimg.com/736x/f0/dc/10/f0dc107146a2b310ea40e4382140cc6e.jpg",
    description: "A store website is an online platform that allows users to browse and purchase products or services. ",
    tag: "Normal",
    classe: "tag-normal",
    made: "Thean",
}];
let A_1xa1_x1Html = '';

A_1xa1_x1.forEach(dataA_1xa1_x1 => {
    A_1xa1_x1Html += `
        <div class="produces">
            <div class="produce">
                <div class="controllProduceCard">
                    <div class="imageProduce">
                        <img src="${dataA_1xa1_x1.image}" alt="image">
                    </div>
                    <div class="infoProduce">
                        <div class="titleProduce">Title: ${dataA_1xa1_x1.name}</div>
                        <div class="descriptionProduce">Description: ${dataA_1xa1_x1.description}</div>
                        <div class="flexProd">
                            <div class="nameAuthor">Author: ${dataA_1xa1_x1.made}</div>
                            <div class="priceProduce">Price: ${dataA_1xa1_x1.price}</div>
                        </div>
                    </div>
                </div>
                <div class="btn ">
                    <div class="btn1"><a href="./frontend/src/containers/cards/card.html">Enroll Now</a></div>
                    <div class="btn2">Add Wishlist</div>
                    <div class="btn3">Process with ...</div>
                </div>
            </div>
        </div>
        `;
});
document.getElementById('ContentProduce').innerHTML = A_1xa1_x1Html;