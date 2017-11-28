<!DOCTYPE html>
<html>
<title>
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
<div class="w3-top">
</div>
<div class="w3-content" style="max-width:2000px;margin-top:46px">
    <div class="w3-container w3-content w3-center w3-padding-10" style="max-width:800px" id="band">
     <!--    <p class="w3-opacity"><i>some form</i></p> -->
	<p class="w3-center res" style="min-height: 30px;"></p>
        <div class="w3-row w3-padding-32">
            <form class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="inputName">Name</label>
                    <div class="controls">
                        <input type="text" id="inputName" placeholder="Name">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputText">Text</label>
                    <div class="controls">
                        <textarea id="redex" maxlength="50" rows="5" id="inputText" placeholder="Text"></textarea>
                        <style type="text/css">
                            redex { resize: none; }
                        </style>
                    </div>
                </div>
		<button type="submit" class="btn" id="btnSubmit" style="margin-top:15px">send</button>
            </form>
        </div>
    </div>
  <div class="w3-gray" id="tour">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <p class="w3-opacity w3-center"><i>Записи</i></p><br>
      <ul class="w3-ul w3-border w3-white w3-text-grey">
        <li class="w3-padding">September 
            <span class="w3-tag w3-red w3-margin-left">Sold out</span>
        </li>
        <li class="w3-padding">October 
            <span class="w3-tag w3-red w3-margin-left">Sold out</span>
        </li>
      </ul>
    </div>
  </div>
</div>
<footer>
</footer>
<script src="main.js?v=1.001"></script>
</body>
</html>