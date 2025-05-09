<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuestBook</title>
</head>
<body>
    <input type="text" name="name" placeholder="Enter your name">
    <textarea name="message" id="msg" placeholder="Enter your message"></textarea>
    <button onclick="sendMessage()">Send</button>
    <div id="showEntry">
        
    </div> 

    <script>
        function sendMessage(){
            const name = document.querySelector('input[name="name"]').value;
            const message = document.querySelector('textarea[name="message"]').value;

            if(!name || !message){
                alert("Please fill all of the fields");
                return;
            }

            fetch("", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({name, message})
            })
            .then(res => res.json())
            .then(data => {
                if(data.success == false){
                    document.getElementById("showEntry").innerText = data.message;
                }else{
                    document.getElementById("showEntry").innerText = data.message;
                }

                if(data.success){
                    document.querySelector('input[name="name"]').value = "";
                    document.querySelector('textarea[name="message"]').value = "";
                }
            })
        }
        
    </script>
</body>
</html>