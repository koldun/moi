function print_r(taV){  alert(getProps(taV));}  
function getProps(toObj, tcSplit) {
  if (!tcSplit) tcSplit = '\n';
  var lcRet = '';
  var lcTab = '    ';
    for (var i in toObj) 
      lcRet += lcTab + i + " : " + toObj[i] + tcSplit;
    lcRet = '{' + tcSplit + lcRet + '}';
  return lcRet;
}

function trim(str, chars) { 
	return ltrim(rtrim(str, chars), chars); 
} 
 
function ltrim(str, chars) { 
	chars = chars || "\\s"; 
	return str.replace(new RegExp("^[" + chars + "]+", "g"), ""); 
} 
 
function rtrim(str, chars) { 
	chars = chars || "\\s"; 
	return str.replace(new RegExp("[" + chars + "]+$", "g"), ""); 
}

function getDecimal(num) {
  return +(num % 1).toFixed(6);
}

function decimalToDegree(number) { // number = 40.252295
  var degrees, minutes, minutesTemp, seconds, ostDegrees, ostMinutes;
  degrees = number > 0 ? Math.floor(number) : Math.ceil(number)   // 40°
  ostDegrees = Math.abs(getDecimal(number))                       // 0.252295 
  minutesTemp = ostDegrees * 60;                                  // 15.1377
  minutes = Math.floor(minutesTemp)                               // 15' 
  ostMinutes = getDecimal(minutesTemp)                            // 0.1377
  seconds = (ostMinutes * 60).toPrecision(6);                     // 8.262"
  return degrees+'°'+minutes+"'"+seconds+"''";
}

function degreeToDecimal(dms) {
  if (!dms) return Number.NaN;  
  var neg = dms.match(/(^\s?-)|(\s?[SW]\s?$)/)!=null? -1.0 : 1.0; 
  dms = dms.replace(/(^\s?-)|(\s?[NSEW]\s?)$/,''); 
  dms = dms.replace(/\s/g,''); 
  var parts = dms.match(/(\d{1,3})[.,°d]?(\d{0,2})[']?(\d{0,2})[.,]?(\d{0,})(?:["]|[']{2})?/); 
  if (parts == null) return Number.NaN;
  // parts:  0 : degree   1 : degree   2 : minutes   3 : secondes   4 : fractions of seconde 
  var d= (parts[1]?         parts[1]  : '0.0')*1.0; 
  var m= (parts[2]?         parts[2]  : '0.0')*1.0; 
  var s= (parts[3]?         parts[3]  : '0.0')*1.0; 
  var r= (parts[4]? ('0.' + parts[4]) : '0.0')*1.0; 
  var dec= (d + (m/60.0) + (s/3600.0) + (r/3600.0))*neg; 
  return dec; 
}
