// main data show to user
document.getElementById('bodyMain').innerHTML = `
    <!-- header -->
    <header>
        <div id="Head" class="controllerHeader">
        </div>
    </header>

    <!-- loading page first show data -->
    <div class="controll">
        <div id="loadingPage"></div>
    </div>

    <!-- main  -->
    <main id="contentPage">
        <div id="sectionMember" class="sectionMember">
        </div>
        <div class="sectionItems">
            <div id="ContentItems"></div>
        </div>
        <div class="sectionProduce">
            <div id="ContentProduce"></div>
        </div>
        <div class="sectionService">
            <div id="ContentService">
            </div>
        </div>
    </main>

    <!-- footer -->
    <footer id="footer">
    </footer>

`;


// Btn Dark Mode and Light Mode
function toggleMode() {
    document.getElementById("DarkMode").classList.toggle("LightModeC")
}

// hover
// const cards = Array.from(document.querySelectorAll(".card"));
// const cardsContainer = document.querySelector("#cards");

// cardsContainer.addEventListener("mousemove", (e) => {
//     for (const card of cards) {
//         const rect = card.getBoundingClientRect();
//         x = e.clientX - rect.left;
//         y = e.clientY - rect.top;

//         card.style.setProperty("--mouse-x", `${x}px`);
//         card.style.setProperty("--mouse-y", `${y}px`);
//     }
// })

//Loading page
var timeLoader;

function loadingPageFirst() {
    timeLoader = setTimeout(showPage, 3000);
}

function showPage() {
    document.getElementById("loadingPage").style.display = "none";
    document.getElementById("contentPage").style.display = "block";
}



//Check Cookie
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    let user = getCookie("username");
    if (user != "") {
        // alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 30);
        }
    }
}