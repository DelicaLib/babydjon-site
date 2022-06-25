/* -----------------------------------------------background------------------------------------------------------------ */

VANTA.TOPOLOGY({
    el: "body",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x90d0b5,
    backgroundColor: 0xd5d5d5
})


/* -----------------------------------------------button "контакты" listener------------------------------------------------------------ */

let contactsButton = document.getElementById("contacts")
contactsButton.onclick = function() {
    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: "smooth"
    })
}


/* -----------------------------------------------scroll------------------------------------------------------------ */

window.addEventListener("scroll", function() {
    if (window.pageYOffset > 230) {
        document.querySelector(".main-up").style.display = "block"
        document.querySelector(".main-up-arrow").style.display = "block"
    } else {
        document.querySelector(".main-up").style.display = "none"
        document.querySelector(".main-up-arrow").style.display = "none"
    }
})

document.querySelector(".main-up-arrow").addEventListener("click", function(item) {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    })
})

// var j = 0
// var audios = new Array("audios/ayanamy-baby.mp3", "audios/black-baby.mp3", "audios/price-baby.mp3", "audios/small-baby.mp3")
// var audiosTime = new Array("22000", "12000", "30000", "23000")

/* -----------------------------------------------ajax------------------------------------------------------------ */
// $(document).ready(function() {
//     var inProgress = false
//     var newsReady = new Array(false, false, false, false, false, false, false, false, false)
//     document.getElementById(blocks[i] + "-button").addEventListener("click", function() {
//         if (!newsReady[i] && !inProgress) {
//             $.ajax({
//                 url: "config/obrabotchik.php",
//                 method: "POST",
//                 data: { "id": i + 1 },
//                 beforeSend: function() {
//                     inProgress = true
//                 }
//             }).done(function(data) {
//                 data = jQuery.parseJSON(data)
//                 console.log(data[i + 1][2])
//                 newsReady[i] = true
//                 $.each(data, function(index, data) {
//                     $("#" + blocks[i] + "-box").append(data[i + 1][2])
//                 })
//                 inProgress = false
//             })
//         }
//     })

// })