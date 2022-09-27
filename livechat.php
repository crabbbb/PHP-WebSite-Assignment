<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="livechat.css"/>
    </head>
    <body>
        <button class="open-button" onclick="openForm()"></button>
        <div class="chat-popup" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h2 style="text-align: center;">Live Chat</h2>

                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>
    </body>
</html>
