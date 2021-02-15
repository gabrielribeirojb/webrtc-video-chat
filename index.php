<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema video-chat</title>
    <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div class="welcome">
        <h2>Bem vido ao nosso chat em tempo real</h2>
    </div><!--welcome-->

    <video id="localVideo" autoplay muted></video>
    <video id="remoteVideo" autoplay muted></video>

    <script>
    if(!location.hash){
        location.hash = Math.floor(Math.random() * 0xFFFFFF).toString(16);
    }

    const roomHash = location.hash.substring(1);

    const drone = new ScaleDrone('yiS12Ts5RdNhebyM');

    const roomName =  'observable-'+roomHash;

    const configuration = {
        
        iceServers:[
            {
                urls: 'stun:stun.l.google.com:19302'
            }
        ]
    }

    let room;
    let pc;

    let number = 0;

    function onSuccess(){};

    function onError(error){
        console.log(error);
    }

    drone.on('open', error =>{
        if(error){
            console.log(error);
        }

        room = drone.subscribe(roomName);

        room.on('open', error => {
            //erro
        })

        room.on('members', members => {
            console.log("Conectado!");
            console.log("Conexões abertas: "+members.length);
        })
    });

</script>
 
</body>
</html>