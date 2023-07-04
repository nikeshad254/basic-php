<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        form fieldset{
            width: 50vw;
        }
        form fieldset .inpLbl{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <form action="./fileHandler.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Online project submission form</legend>

            <div class="inpLbl">
                <label for="tuNum">TU Regestration Number</label>
                <input type="text" name="tuNum" required><br>
            </div>

            <div class="inpLbl">
                <label for="email" required>Email Address</label>
                <input type="email" name="email"><br>
            </div>
            
            <div class="inpLbl">
                <div>
                    <label for="upload">Upload your Project file</label><br>
                    <small>supported file format: pdf, doc, docx, ppt, pptx, jpeg</small><br>
                </div>
                <input type="file" name="file" accept=".pdf, .doc, .docx, .ppt, .pptx, .jpeg, .jpg">
            </div>

            <input type="submit" value="Upload">
        </fieldset>
    </form>
</body>
</html>