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
    name: "Store TEO ",
    price: 1000,
    category: "Website App",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIAf1NNqzVnIltHqrbfgtM5WuEpcbZwubmjQ&s",
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
                    <div class="btn1">Enroll Now</div>
                    <div class="btn2">Add Wishlist</div>
                    <div class="btn3">Process with ...</div>
                </div>
            </div>
        </div>
        `;
});
document.getElementById('ContentProduce').innerHTML = A_1xa1_x1Html;