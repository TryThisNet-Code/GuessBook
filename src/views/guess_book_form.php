<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuestBook</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <input type="text" name="name" placeholder="Enter your name">
    <textarea name="message" id="msg" placeholder="Enter your message"></textarea>
    <button onclick="sendMessage()">Send</button>
    <div id="showSuccess">

    </div>

    
    <div id="entries">
        <?php
            if(!empty($entries)){
                foreach($entries as $entry){
                    echo '<div class="entry">';
                    echo '<strong>'. htmlspecialchars($entry['name']).'</strong><br>';
                    echo nl2br(htmlspecialchars($entry['message']));
                    echo '</div>';
                }
            }else{
                echo '<p> No guestbook entries yet</p>';
            }
        ?>
    </div>
    

    <script>
        function sendMessage(){
            const name = document.querySelector('input[name="name"]').value;
            const message = document.querySelector('textarea[name="message"]').value;
            const output = document.getElementById("showSuccess");

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
                output.innerHTML = data.message;
                output.style.color = data.success ? "green" : "red";

                if(data.success){
                    document.querySelector('input[name="name"]').value = "";
                    document.querySelector('textarea[name="message"]').value = "";

                    const entryDiv = document.createElement("div");
                    entryDiv.classList.add("entry");
                    entryDiv.innerHTML = `<strong>${data.entry.name}</strong><br>${data.entry.message}`;
                    document.getElementById("entries").prepend(entryDiv);
                }
            })
        }
        
    </script>
</body>
</html>