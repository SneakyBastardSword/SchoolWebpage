//alert("hey there")    //debug to ensure script is running
                       
var imageNumber=0;                                                                     //in the slideshow
function cycleImages(){
    imageNumber++;
    if(imageNumber>= imageArray.length){imageNumber = 0;}
    document.getElementById("slideshow-image").setAttribute("src","/src/"+ imageArray[imageNumber]);
}

setInterval(cycleImages(),5000);