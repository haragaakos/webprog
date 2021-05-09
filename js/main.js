var myVideo = document.getElementById("video"); 

if(myVideo){
    myVideo.addEventListener('click',function(e){
        if (e.target.paused) 
        e.target.play(); 
        else 
        e.target.pause(); 
    });
}
