var myVideo = document.getElementById("video"); 
var kapcsolatform = document.getElementById('kapcsolatform');
var uzenet = document.getElementById('uzenet');

if(myVideo){
    myVideo.addEventListener('click',function(e){
        if (e.target.paused) 
        e.target.play(); 
        else 
        e.target.pause(); 
    });
}


if(kapcsolatform){
    kapcsolatform.addEventListener('submit',function(e){
        if( !(uzenet && uzenet.value.length > 5)){
            e.preventDefault();         
            alert("Túl rövid az üzenet!");
        }
    });
}



