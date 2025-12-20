// demo content:
document.getElementById('ContentItems').innerHTML = `
            <div class="section">
                <div class="controllcontent">
                    <h2>Hot Content</h2>
                    <div id="ContentData_a1" class="content1">

                    </div>
                </div>
                <div class="controllcontent">
                    <h2>Sample Content</h2>
                    <div id="ContentData_a2" class="content1">

                    </div>
                </div>
                <div class="controllcontent">
                    <h2>Type Global</h2>
                    <div id="ContentData_a3" class="content1">

                    </div>
                </div>
                <div class="controllcontent">
                    <h2>Top Style Premium</h2>
                    <div id="ContentData_a4" class="content1">

                    </div>
                </div>
            </div>

`;



//items 1
var a1 = 0;
for (a1 = 0; a1 <= 100; a1++) {
    const dbItems_a1 = [{
        id: a1,
        image: 'https://i.pinimg.com/1200x/5c/af/cf/5cafcfd01f16a91eb586ffd1eab2bdc0.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/3b/02/97/3b02978936829eaa45bcf37661b96379.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/1200x/b3/2c/69/b32c694b4e5b33fb84ecebf035e5cc5d.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/d9/58/fe/d958fef835611926f4926617ee02a934.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/1200x/ec/6f/d1/ec6fd1bb529a006cd4b5c7b90f61715f.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/c7/47/22/c747228580492562554479ce5dda8dd2.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/74/72/5f/74725f720d173e2e9f581f46ac86d050.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/44/5c/e0/445ce0ea313f50a21e3f50ac4b2288dd.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/1200x/f9/a1/d0/f9a1d05979c48b575ef0ec912b54c6b9.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/46/91/c6/4691c66cbe20e99f7742a9323b234eac.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/95/b4/66/95b4660acf392edd86ebab50750dbcaf.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/80/88/d0/8088d0ab6dce62ba3975b4389089a87f.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/7c/46/06/7c4606a3684dbba133b769288e76102d.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/8b/db/e2/8bdbe25d3fdca5effd7e81c784c72153.jpg'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/736x/85/ba/9e/85ba9e953ad7c6c929c2d46fec0f0050.jpg"'
    }, {
        id: a1,
        image: 'https://i.pinimg.com/1200x/ed/84/cc/ed84cc13163cce95c17357e99e6c49f2.jpg'
    }];
    let Data_a1_HTML = '';
    dbItems_a1.forEach(getData_a1 => {
        Data_a1_HTML += `
        <img src="${getData_a1.image}">
    `;
    });
    document.getElementById('ContentData_a1').innerHTML = Data_a1_HTML;
}

//items 2
var a2 = 0;
for (a2 = 0; a2 <= 100; a2++) {
    const dbItems_a2 = [{
        id: a2,
        image: 'https://i.pinimg.com/736x/bb/92/ae/bb92ae6afffbcc34fa7b07a793a082d8.jpg'
    }, {
        id: a2,
        image: 'https://i.pinimg.com/736x/02/57/ff/0257ff513343138cc2dca964118157eb.jpg'
    }, {
        id: a2,
        image: 'https://i.pinimg.com/736x/52/b2/ba/52b2bac8b43c2a9559a22eaf3ce909a3.jpg'
    }, {
        id: a2,
        image: 'https://i.pinimg.com/736x/ed/b2/4d/edb24d820ffb014629d637102dfe579c.jpg'
    }, {
        id: a2,
        image: 'https://i.pinimg.com/736x/ad/ed/cf/adedcfea7bf3de71b1c3436840d3f122.jpg'
    }, {
        id: a2,
        image: 'https://i.pinimg.com/1200x/f0/7e/ce/f07ece24d409e26368cfe172edf5af16.jpg'
    }];
    let Data_a2_HTML = '';
    dbItems_a2.forEach(getData_a2 => {
        Data_a2_HTML += `
        <img src="${getData_a2.image}">
    `;
    });
    document.getElementById('ContentData_a2').innerHTML = Data_a2_HTML;
}



//items 3
var a3 = 0;
for (a3 = 0; a3 <= 100; a3++) {
    const dbItems_a3 = [{
        id: a3,
        image: 'https://i.pinimg.com/1200x/fe/97/f9/fe97f9f54aa65b9071dcf34b95e1d55f.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/0f/c1/17/0fc117f021fffbd7b36019b058de3ca6.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/68/02/18/680218c9d314ce21990a8e96dc8e4395.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/b5/e7/2d/b5e72debb3e87900dd32a4537d6186ce.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/df/4e/7f/df4e7f6ccc089266f96ac03fab23b133.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/e4/93/ef/e493ef60ee26563f0accf08a3e8a1b9e.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/d2/de/30/d2de307580c21a1f3310bbc4a4366b0b.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/53/79/59/53795962d3fd29138c556b409d615958.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/94/0f/68/940f684427e5ecfe0b5f19976ca3c84a.jpg'
    }, {
        id: a3,
        image: 'https://i.pinimg.com/736x/bb/4a/3e/bb4a3e01eea3bae9cebe9d9ac68a43e5.jpg'
    }];
    let Data_a3_HTML = '';
    dbItems_a3.forEach(getData_a3 => {
        Data_a3_HTML += `
        <img src="${getData_a3.image}">
    `;
    });
    document.getElementById('ContentData_a3').innerHTML = Data_a3_HTML;
}

// items 4
var i = 0;
for (i = 0; i <= 100; i++) {
    const dbItems_a4 = [{
        id: i,
        image: 'https://i.pinimg.com/736x/c8/e2/e0/c8e2e0070d81d5be0ae60799a1ce298e.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/736x/0e/37/3e/0e373ed12c2ba2b815cbec7505ff43f3.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/736x/e9/4c/ba/e94cba87565aa3d416d71d9b952501d1.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }, {
        id: i,
        image: 'https://i.pinimg.com/1200x/07/a7/19/07a719ca8ee8f00efcba37973b522276.jpg'
    }];
    let Data_a4_HTML = '';

    dbItems_a4.forEach(getData_a4 => {
        Data_a4_HTML += `
        <img src="${getData_a4.image}">
    `;
    });
    document.getElementById('ContentData_a4').innerHTML = Data_a4_HTML;

}



// footer




/*================================
// Create by rex got
// Date: 20-06-2024
// Time: 14:30
// Version: 1.5
// license: MIT
// Copyright © 2024 Rex Got
=================================*/