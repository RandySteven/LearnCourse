<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn Code</title>
    <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            display: flex;
            background-color: rgb(32, 33, 41)
        }
        .code-area{
            display: flex;
            flex-direction: column;
            width: 50%;
            border-right: 1px solid #555;
            margin-top: 4px;
        }
        .code-area textarea{
            resize: none;
            outline: none;
            width: 100%;
            height: 33.33%;
            font-size: 13px;
            padding: 10px;
            background-color: rgb(0, 15, 56);
            color: lime;
        }
        .preview-area{
            width: 50%;
            margin-top: 4px;
            background-color: white;
        }
        .preview-area iframe{
            width: 100%;
            height: 100%;
            border: none;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        ul {
            position: fixed;
            top: 0;
            width: 100%;
        }
        li {
            display: inline;
        }
        li {
            float: left;
        }

        a {
            display: block;
            padding: 8px;
            background-color: #dddddd;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
</head>
<body>
    <ul>
        <li><a href="/">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
              </svg>
        </a></li>
    </ul>

    <div class="code-area" style="margin-top: 3%">
        <textarea id="htmlCode" placeholder="HTML Code" oninput="showPreview()"></textarea>
        <textarea id="cssCode" placeholder="CSS Code" oninput="showPreview()"></textarea>
        <textarea id="jsCode" placeholder="Javascript Code" oninput="showPreview()"></textarea>
    </div>
    <div class="preview-area" style="margin-top: 3%">
        <iframe id="preview-window"></iframe>
    </div>

    <script type="text/javascript">
        function showPreview(){
            var htmlCode = document.getElementById("htmlCode").value;
            var cssCode = "<style>"+document.getElementById("cssCode").value+"</style>";
            var jsCode = "<scri"+"pt>" + document.getElementById("jsCode").value +"</scri"+"pt>";
            var frame = document.getElementById("preview-window").contentWindow.document;
            frame.open();
            frame.write(htmlCode+cssCode+jsCode);
            frame.close();
        }
    </script>

</body>
</html>
