// Header
document.getElementById('Head').innerHTML = `
            <a href="index.html">
                <div class="leftheader">
                    <div class="logopage">
                        <img src="./frontend/src/image/logos/logonew.png">
                    </div>
                    <div class="namepage">
                        <h2>Nighty Rex Got NEO</h2>
                    </div>
                    <div>
                        <div class="loaderSite"></div>
                    </div>
                </div>
            </a>
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
    futureN: "Products",
    link: 'produce.html',
    active: "",
    modsite: " "
}, {
    id: 2,
    futureN: "Service",
    link: 'service.html',
    active: "",
    modsite: "laptop"
}, {
    id: 3,
    futureN: "About Sites",
    link: 'abouts.html',
    active: "",
    modsite: "laptop"

}];
let futurepageGet = '';

futurepage.forEach(datafuture => {
    futurepageGet += `
    <a id="${datafuture.modsite}" class="optionheader ${datafuture.active}" href="${datafuture.link}">${datafuture.futureN}</a>
    `;
});
document.getElementById('futurepageid').innerHTML = futurepageGet;


// Profile
document.getElementById('UserHead').innerHTML = `
                <a href="login.html">
                    <div id="usernameShow" class="nameuser"></div>
                </a>
                <a href="producegirls.html">
                    <div class="profileuser">
                        <img src="https://i.pinimg.com/736x/fe/3c/fa/fe3cfa7b380b6a3c5a68a15725e63ecf.jpg">
                    </div>
                </a>
`;



//footer
document.getElementById('footer').innerHTML = `
    <div class="service-content">
        <div class="footer-col">
            <div class="logo" style="color: white; margin-bottom: 15px;">
                <i class="fa-solid fa-layer-group"></i> Nigty Rex Got NEO
            </div>
        </div>
        <div class="footer-col">
            <h4>Company</h4>
                <ul>
                    <li><a href="abouts.html">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="service.html">Services</a></li>
                    <li><a href="#">Partners</a></li>
                </ul>
        </div>
        <div id="laptop" class="footer-col">
            <h4>Services</h4>
            <ul>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Cloud Migration</a></li>
                <li><a href="#">Cyber Security</a></li>
                <li><a href="#">Data Analytics</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Legal</h4>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Cookie Policy</a></li>
            </ul>
        </div>

    </div>
    <div class="footer-left">
        <img class="pinter" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJHH6aoXJfdAScGlfLHNln2tjqUwkCDbxt8Q&s">
        <img class="pinter" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png">
        <img class="pinter" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRziqJ3QYGFSSuU4dWwufjF56J4Cmt7Nr5tuQ&s">
        <img class="pinter" src="https://images.seeklogo.com/logo-png/49/2/twitter-x-logo-png_seeklogo-492396.png">
        <img src="./src/image/banner/age-mark.png">
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Nigty Rex Got NEO Services. All rights reserved.</p>
    </div>
`;

// contentPageIndex
// document.getElementById('contentPageIndex').innerHTML = `
//     <div class="welcome-section">
//         <div class="logo-sponser">
//             <div class="logoA">
//                 <img src="./src/image/logo new.png" >
//             </div>
//             <div>
//                 <h2>X</h2>
//             </div>
//             <div class="logoA">
//                 <img src="./src/image/logo old.png" >
//             </div>
//         </div>
//         <div class="welcome-text">
//             <h1>Welcome to Nighty Rex Got NEO</h1>
//         <p>Your Gateway to Innovative Solutions</p>
//         <a href="produce.html" class="explore-button">Explore Our Products</a>
//         </div>
//         <div class="welcome-subtext">
//             <img src="./src/image/circle-outline.png" >
//         </div>
//     </div>
// `;