/* -----------------------------------------------news blocks------------------------------------------------------------ */
var i = 0
var orders = 0
var blocks = new Array("first-block", "second-block", "third-block", "fourth-block", "fifth-block", "sixth-block", "seventh-block", "eighth-block", "ninth-block")

function newsCall() {
    orders--
    document.querySelector(`.${blocks[i]}`).style.order = orders
    document.getElementById(blocks[i]).classList.add("active")
    document.getElementById(`${blocks[i]}-box`).classList.add("active")
    document.getElementById(`${blocks[i]}-header`).classList.add("active")
    let timer = setTimeout(
        function() {
            window.scrollTo({
                top: 230,
                behavior: "smooth"
            })
        }, 1000)
}

function newsClose() {
    orders++
    document.querySelector(`.${blocks[i]}`).style.order = i
    document.getElementById(blocks[i]).classList.remove("active")
    document.getElementById(`${blocks[i]}-box`).classList.remove("active")
    document.getElementById(`${blocks[i]}-header`).classList.remove("active")
}

function settingsOpen() {
    document.querySelector(".overlay").style.display = "flex"
    document.querySelector(".modal").style.display = "flex"
    document.getElementById("dataId").setAttribute("value", i)
}

function settingsClose() {
    document.querySelector(".overlay").style.display = "none"
    document.querySelector(".modal").style.display = "none"
}

function settingsContinue() {
    if (document.forms["new-news-form"].elements["new-news-input"].value == "") {
        return
    } else {
        document.querySelector(".overlay").style.display = "none"
        document.querySelector(".modal").style.display = "none"
    }
}