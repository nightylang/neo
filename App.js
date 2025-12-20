// Header
document.getElementById('Head').innerHTML = `
            <div class="leftheader">
                <div class="logopage">
                    <img src="/src/image/logos/logo2.png">
                </div>
                <div class="namepage">
                    <h2>Nighty Rex Got NEO</h2>
                </div>
                <div>
                    <div class="loaderSite"></div>
                </div>
            </div>
            <div class="centerheader">
                <div id="futurepageid" class="futurepage">
                </div>
            </div>
            <div id="UserHead" class="rightheader">
            </div>
`;

// futurepage
const futurepage = [{
    id: 1,
    futureN: "Home",
    link: 'index.html',
    active: ""
}, {
    id: 2,
    futureN: "Products",
    link: 'producew.html',
    active: ""
}, {
    id: 3,
    futureN: "Service",
    link: 'comingsoon.html',
    active: ""
}, {
    id: 4,
    futureN: "About Site",
    link: 'abouts.html',
    active: ""

}];
let futurepageGet = '';

futurepage.forEach(datafuture => {
    futurepageGet += `
    <a class="optionheader ${datafuture.active}" href="${datafuture.link}">${datafuture.futureN}</a>
    `;
});
document.getElementById('futurepageid').innerHTML = futurepageGet;


// User
document.getElementById('UserHead').innerHTML = `
                <a href="./login.html">
                    <div id="usernameShow" class="nameuser"></div>
                </a>
                <a href="./profile.html">
                    <div class="profileuser">
                        <img src="https://i.pinimg.com/736x/3d/61/c2/3d61c24fa8bd420bc5d1ff7ae1ac2043.jpg">
                    </div>
                </a>
`;

//footer
document.getElementById('footer').innerHTML = `
        <div class="footer-left">
            <img class="pinter" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJHH6aoXJfdAScGlfLHNln2tjqUwkCDbxt8Q&s">
            <img class="pinter" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png">
            <img class="pinter" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRziqJ3QYGFSSuU4dWwufjF56J4Cmt7Nr5tuQ&s">
            <img class="pinter" src="https://images.seeklogo.com/logo-png/49/2/twitter-x-logo-png_seeklogo-492396.png">
            <img src="./src/image/banners/age-mark.png">
        </div>

`;