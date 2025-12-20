const members = [{
    id: 4,
    name: 'Rex Got',
    image: '',
    major: "Cyber Security Specialist",
    position: "admin",
    point: 1500,
}, {
    id: 2,
    name: 'Sarou Virak Both',
    image: '',
    major: "Designer & Development",
    position: "ceo",
    point: 2000,
}, {
    id: 3,
    name: 'Khot Sothean',
    image: '',
    major: "Web Developer",
    position: "hero",
    point: 1500,
}, {
    id: 10,
    name: 'Vann Channy',
    image: '',
    major: "Web Designer & Designer",
    position: "founder",
    point: 500,
}, {
    id: 5,
    name: 'Khoun Ratana',
    image: "",
    major: "Full-Stack Developer",
    position: "expert",
    point: 1500,
}, {
    id: 1,
    name: 'Khat Sokly',
    image: '',
    major: "Full-Stack Development",
    position: "expert",
    point: 2500,
}, {
    id: 7,
    name: 'Ear Amnath',
    image: '',
    major: "Full-Stack Developer",
    position: "new",
    point: 1500,
}, {
    id: 6,
    name: 'Meng lin',
    image: '',
    major: "Full-Stack Developer",
    position: "new",
    point: 1500,
}, {
    id: 11,
    name: 'Noeurn Sovanneak',
    image: '',
    major: "Full-Stack Developer",
    position: "new",
    point: 500,
}, {
    id: 8,
    name: 'Kim Pechchora ラー🌎',
    image: '',
    major: "Full-Stack Developer",
    position: "new",
    point: 1500,
}, {
    id: 9,
    name: 'Pov Yayasmin♏️',
    image: '',
    major: "Full-Stack Developer",
    position: "new",
    point: 1500,
}];
let dataMembersHTML = '';


members.forEach(dataM => {
    dataMembersHTML += `
    <div style="order: ${dataM.id}" class="row">
        <div class="nth-1">No.${dataM.id}</div>
        <div class="name nth-2">Name: <div class="Myname">${dataM.name}</div></div>
        <div class="major nth-4">Major: <div class="Mymajor">${dataM.major}</div></div>
        <div class="position nth-5">Position: <div class="${dataM.position}"> ${dataM.position}</div></div>
        <div class=" nth-6">Score Rank: <div class="point${dataM.point}">${dataM.point}</div></div>
    </div>
    `;
});
document.getElementById('ContentMember').innerHTML = dataMembersHTML;


// members.forEach(DataM => {
//     dataMembersHTML += `
//         <div>${DataM.age}</div>
//     `;
// });
// document.getElementById('age').innerHTML = dataMembersHTML;

/*
// End of footer.js
// Create by rex got
// Date: 20-06-2024
// Time: 14:30
// Version: 1.0
// license: MIT
// Copyright © 2024 Rex Got

*/
