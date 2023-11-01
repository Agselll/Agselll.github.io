var tombol = document.getElementById("tombol");
tombol.onclick = function(){
    document.body.classList.toggle("dark-mode");
}

var drop = document.getElementById("check");
const list = document.querySelector("ul")
drop.onclick = function(){
    if(document.getElementById("check").checked == true){
        list.style.display = 'inline';
    } else {
        list.style.display = 'none';
    }
}

const search = document.getElementById("searching");
search.addEventListener("click", 
    function(){
        alert("Maaf belum ada data volunteer untuk ditampilkan");
    }
)

const tentang = document.querySelector(".footer-center");
tentang.addEventListener("mouseover", ()=>{
    console.log("kelasss");
    tentang.style.backgroundColor = "rgb(0, 122, 82)";
    } 
)
tentang.addEventListener("mouseleave", ()=>{
    console.log("kelasss");
    tentang.style.backgroundColor = "transparent";
    } 
)

$("#about").on("click", () => {
    $("#about").css("color", "red")
}
)
