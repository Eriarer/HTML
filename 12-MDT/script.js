function format(){
    document.getElementById("Staggered").style.display = "none";
    document.getElementById("Ortho").style.display = "none";
}

function stag() {
    document.getElementById("General").style.display = "none";
    document.getElementById("Staggered").style.display = "block";
    document.getElementById("Ortho").style.display = "none";
}

function overview(){
    document.getElementById("General").style.display = "block";
    document.getElementById("Staggered").style.display = "none";
    document.getElementById("Ortho").style.display = "none";
}

function ortho(){
    document.getElementById("General").style.display = "none";
    document.getElementById("Staggered").style.display = "none";
    document.getElementById("Ortho").style.display = "block";
}
