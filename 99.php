<html>
<head>
<script>
function showHint() {

    var str=document.getElementById("txtMessage").value;
    
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form> 
First name: <input type="text" id="txtMessage"  >
<input type="submit" name="submit" class="m" value="CREATE">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
<script type="text/javascript" src="js2.js"></script>

</body>
</html>