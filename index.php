<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="text/javascript" src="javascript.js"></script>
<title>PHP Passwrd Generator</title>
</head>

<body>
  <div class="wrapper">
    <span class="description password">Password</span>
    <div id="gen_password">
      <form method="post" action="action/generate.password.php">
        <div class="genpass-holder">
          <div class="genpass-line"><span>Length for each password (max 32): </span> <input name="length" size="2" value="8" /></div>
	        <div class="genpass-line"><span>Minimum lowercase: </span><input class="jq_change_input" name="lowercase" size="2" value="2" /></div>
	        <div class="genpass-line"><span>Minimum uppercase: </span><input class="jq_change_input" name="uppercase" size="2" value="2" /></div>
	        <div class="genpass-line"><span>Minimum numbers: </span><input class="jq_change_input" name="numbers" size="2" value="2" /></div>
	        <div class="genpass-line"><span>Minimum symbols: </span><input class="jq_change_input" name="symbols" size="2" value="2" /></div>
	        <div class="genpass-line"><span>No similar characters (1/l, 0/O, etc): </span> <input type="checkbox" name="nosimilar" checked="checked" /></div>
          <div class="genpass-line"><span>In given order: <input type="checkbox" name="givenorder" /></span></div>
        </div>
        <p><input class="genpassword genbutton" type="submit" name="submit" value="Generate" /></p>
      </form>
      <div class="jq_genpassword_result"></div>
    </div>
  </div>
  <div class="wrapper">
    <span class="description phrase">Phrase</span>
    <div id="gen_passphrase">
      <form method="post" action="action/generate.passphrase.php">
        <div class="genpass-holder">
          <div class="genpass-line">
            <span>Number of words (1-5): </span>
            <select name="i">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected="selected">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
	        <div class="genpass-line">
            <span>Extra digits: </span>
            <select name="digits">
              <option value="0">0</option>
              <option value="2" selected="selected">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
	        <div class="genpass-line"><span>Capitalize first digits: </span><input name="capitalize" type="checkbox" checked="checked" /></div>
	        <div class="genpass-line"><span>Leetify sentence: </span><input name="hax" type="checkbox" /></div>
        </div>
        <p><input class="genpassphrase genbutton" type="submit" name="submit" value="Generate" /></p>
      </form>
      <div class="jq_genpassphrase_result"></div>
    </div>
  </div>
  <div class="wrapper">
    <span class="description sentence">Sentence</span>
    <div id="gen_sentence">
      <form method="post" action="action/generate.sentence.php">
        <div class="genpass-holder">
          <div class="genpass-line">
          <span>Number of words (3-5): </span>
            <select name="i">
              <option value="3">3</option>
              <option value="4" selected="selected">4</option>
              <option value="5">5</option>
            </select>
	        </div>
          <div class="genpass-line"><span>Capitalize first digit: </span><input name="capitalize" type="checkbox" checked="checked" /></div>
	        <div class="genpass-line"><span>No spaces: </span><input name="space" type="checkbox" /></div>
	        <div class="genpass-line"><span>Leetify sentence: </span><input name="hax" type="checkbox" /></div>
        </div>
        <p><input class="gensentence genbutton" type="submit" name="submit" value="Generate" /></p>
      </form>
      <div class="jq_gensentence_result"></div>
    </div>
  </div>
  <div class="wrapper">
    <span class="description hash">Hash</span>
    <div id="gen_hash">
      <form method="post" action="action/generate.hash.php">
        <div class="genpass-holder">
          <div class="genpass-line"><span>Input (max 32): </span><input name="userinput" size="32" value="" /></div>
          <div class="genpass-line"><span>Method: </span>
            <select name="cryptmethod">
              <option value="sha1crypt">SHA1</option>
              <option value="md5crypt">MD5</option>
              <option value="descrypt">DES</option>
            </select>
          </div>
        </div>
        <p><input class="genhash genbutton" type="submit" name="submit" value="Generate" /></p>
      </form>
      <div class="jq_genhash_result"></div>
    </div>
  </div>
  <div class="wrapper">
    <span class="description base64">base64</span>
    <div id="gen_hash">
      <form method="post" action="action/generate.base64.php">
        <div class="genpass-holder">
          <div class="genpass-line"><span>Input: </span><textarea name="input" size="32" value="" ></textarea></div>
          <div class="genpass-line"><span>Method: </span>
            <select name="cryptmethod">
              <option value="encode">Encode</option>
              <option value="decode">Decode</option>
            </select>
          </div>
        </div>
        <p><input class="genhash genbutton" type="submit" name="submit" value="Generate" /></p>
      </form>
      <div class="jq_genhash_result"></div>
    </div>
  </div>
</body>
</html>

