var imageNumber=0;//in the slideshow
function cycleImages(dir){
    imageNumber += dir;
    if(imageNumber>= imageArray.length){imageNumber = 0;}
    if(imageNumber< 0){imageNumber = imageArray.length-1;}
    document.getElementById("slideshow-image").setAttribute("src","/src/"+ imageArray[imageNumber]);
}

setInterval(cycleImages(1),5000);