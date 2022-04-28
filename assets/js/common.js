// Base Functions
function getObject(obj) {
	if (!obj)
		return null;

	if (typeof obj == 'string')
		return document.getElementById(obj) || document.getElementsByName(obj).item(0);
	else
		return obj;
}

function createXMLHttpRequest(cbFunc)
{
	var XMLhttpObject = null;
	try{
		XMLhttpObject = new XMLHttpRequest();
	}catch(e){
		try{
			XMLhttpObject = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				XMLhttpObject = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				return null;
			}
		}
	}
	if (XMLhttpObject) XMLhttpObject.onreadystatechange = cbFunc;
	return XMLhttpObject;
}

function insertAfter(newChild, refChild) {
	if ((!newChild) || (!refChild) || (!refChild.parentNode))
		return null;

	if (refChild.nextSibling)
		return refChild.parentNode.insertBefore(newChild, refChild.nextSibling);
	else
		return refChild.parentNode.appendChild(newChild);
}

function setTextFieldValue(tf, text) {
	var tf_el = getObject(tf);

	if (!tf_el)
		return;

	if (tf_el.value != text)
		tf_el.value = text;
}

// String Functions
function replaceAll(txt, searchValue, replaceValue) {
	if (txt) {
		txt = txt.replace(searchValue, replaceValue);

		if (txt.indexOf(searchValue) > -1)
			txt = replaceAll(txt, searchValue, replaceValue);
	}

	return txt;
}

function replaceAllStart(txt, searchValue, replaceValue) {
	if (txt) {
		if (txt.indexOf(searchValue) == 0)
			txt = txt.replace(searchValue, replaceValue);

		if (txt.indexOf(searchValue) == 0)
			txt = replaceAllStart(txt, searchValue, replaceValue);
	}

	return txt;
}

function replaceAllEnd(txt, searchValue, replaceValue) {
	if (txt) {
		if (txt.lastIndexOf(searchValue) == (txt.length - 1))
			txt = txt.replace(searchValue, replaceValue);

		if (txt.lastIndexOf(searchValue) == (txt.length - 1))
			txt = replaceAllEnd(txt, searchValue, replaceValue);
	}

	return txt;
}

function trim(text) {
	if (!text)
		return text;

	text = replaceAllStart(text, '　', '');
	text = replaceAllEnd(text, '　', '');

	return text.replace(/^\s+|\s+$/g, '');
}

function trimStart(text) {
	if (!text)
		return text;

	text = replaceAllStart(text, '　', '');

	return text.replace(/^\s+/, '');
}

function trimEnd(text) {
	if (!text)
		return text;

	text = replaceAllEnd(text, '　', '');

	return text.replace(/\s+$/, '');
}

function truncate(data, length) {
	var result = data;
	if (data.length > length) {
		result = data.substring(0, length) + "...";
	}

	return result;
}

// Event Handle Functions
function addEventHandler(src, event_name, handle_fn) {
	var handleSource = getObject(src);

	if (!handleSource)
		return;

	try {
		handleSource.attachEvent('on' + event_name, handle_fn);
	} catch (e) {
		handleSource.addEventListener(event_name, handle_fn, false);
	}
}

function stopEvent(event) {
	if (!event)
		return;

	if (event.stopPropagation)
		event.stopPropagation();
	else
		event.cancelBubble = true;

	if (event.preventDefault)
		event.preventDefault();
	else
		event.returnValue = false;
}

// Mask Text Function
function doOnlyIntEdit(txtObj) {
	var txt = txtObj.value;
	var regex = new RegExp("[0-9]","i");
	if( !txt ) {
		txtObj.value = "";
	} else {
		for( i = 0; i < txt.length; i++ )
			if( !regex.test(txt.substring(i, i+1)) )
				txtObj.value = txt.substring(0, i);
	}
}

function doOnlyFloatEdit(txtObj) {
	var txt = txtObj.value;
	var regex = new RegExp("[0-9.]","i");
	var regexp = new RegExp("[.]","i");
	var count = 0;
	if( !txt || regexp.test(txt.substring(0, 1))) {
		txtObj.value = "";
	} else {
		for( i = 0; i < txt.length; i++ ) {
//			if( regexp.test(txt.substring(i, i+1)) )
//				count++;
			if( !regex.test(txt.substring(i, i+1)) )
				txtObj.value = txt.substring(0, i);
		}
	}
}

function getOnlyMaskRegexText(txt, regexStr) {
	if (!txt)
		return '';

	var regex = new RegExp(regexStr,"i");
	for ( var i = 0; i < txt.length; i++) {
		if (regex.test(txt.substring(i, i + 1)))
			continue;

		return txt.substring(0, i);
	}

	return txt;
}

function keyPressRegexTextOnly(evt, obj, regexStr) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    alert(charCode + ":" + String.fromCharCode(charCode));
    if (charCode <= 31) {
        return true;
    }
	var regex = new RegExp(regexStr,"i");
    var key = String.fromCharCode(charCode);
    if (regex.test(obj.value)) {
        return true;
    } else {
        return false;
    }
}

function parseFloatValue(value) {
	var quantity = parseFloat(value);
	if(quantity != 0 && !quantity) {
		return -1;
	}
	
	return quantity;
}

function getNumberFormat(value, len) {
	if( !value || value == "" )
		return 0;
	var str = value + "";
	var point = str.split('.');
	if( point.length > 1 && point[1].length > len ) {
		var decimal = point[1];
		decimal =  decimal.substr(0, len + 1);
		if( parseInt(decimal.substr(0, len)) > Math.pow(10, len) - 2 ) {
			return parseInt(point[0]) + 1;
		} else if( parseInt(decimal.substr(len, 1)) > 4 ) {
			return parseFloat(point[0] + "." + (parseInt(decimal.substr(0, len)) + 1));
		}
		return parseFloat(point[0] + "." + decimal.substr(0, len));
	}
	return parseFloat(value);
}

function getFloat(value) {
	if( !value || value == "" || isNaN(value) )
		return 0;
	return parseFloat(value);
}

function setLang(lang, url) {
	var bRedirect = false;
	if( lang == 'kor' && getObject("lang").value != 0 ) {
		bRedirect = true;
		getObject("lang").value = 0;
	} else if( lang == 'chn' && getObject("lang").value != 1 ) {
		bRedirect = true;
		getObject("lang").value = 1;
	} else if( lang == 'eng' && getObject("lang").value != 2 ) {
		bRedirect = true;
		getObject("lang").value = 2;
	}
	if(bRedirect) {
		getObject("frm").action = url;
		getObject("frm").submit();
	}
}

function doCheckAll(chkAll) {
	if( chkAll.checked ) {
		var chkStr = "";
		for( var i = 0; i < document.getElementsByName("chkOne").length; i++ ) {
			if( i == document.getElementsByName("chkOne").length - 1 )
				chkStr += document.getElementsByName("chkOne")[i].value;
			else
				chkStr += document.getElementsByName("chkOne")[i].value + ",";
			document.getElementsByName("chkOne")[i].checked = true;
		}
		getObject("chkAll").value = chkStr;
	} else {
		for( var i = 0; i < document.getElementsByName("chkOne").length; i++ )
			document.getElementsByName("chkOne")[i].checked = false;

		getObject("chkAll").value = "";
	}
}

function doCheckOne(chkOne) {
	var chkStr = getObject("chkAll").value;
	if( chkOne.checked ) {
		if( chkStr == "" )
			chkStr += chkOne.value;
		else
			chkStr += ',' + chkOne.value;
	} else {
		var pos = chkStr.indexOf(chkOne.value);
		if( pos == 0 )
			chkStr = chkStr.substring(0, pos) + chkStr.substring(pos+chkOne.value.length+1, chkStr.length);
		else
			chkStr = chkStr.substring(0, pos-1) + chkStr.substring(pos+chkOne.value.length+1, chkStr.length);
	}
	if( chkStr != "" )
		getObject("chkAll").checked = true;
	else
		getObject("chkAll").checked = false;
	getObject("chkAll").value = chkStr;
}

function validSelected(event) {
	var isSelected = false;
	for( var i = 0; i < document.getElementsByName("chkOne").length; i++ ) {
		if( document.getElementsByName("chkOne")[i].checked ) {
			isSelected = true;
			break;
		}
	}
	if( !isSelected ) {
		alert("항목을 선택하십시오.");
		stopEvent(event);
		return false;
	}
	return true;
}

function getNumberFormat(value, len) {
	if( !value || value == "" )
		return 0;
	var str = value + "";
	var point = str.split('.');
	if( point.length > 1 && point[1].length > len ) {
		var decimal = point[1];
		decimal =  decimal.substr(0, len + 1);
		if( parseInt(decimal.substr(0, len)) > Math.pow(10, len) - 2 ) {
			return parseInt(point[0]) + 1;
		} else if( parseInt(decimal.substr(len, 1)) > 4 ) {
			return parseFloat(point[0] + "." + (parseInt(decimal.substr(0, len)) + 1));
		}
		return parseFloat(point[0] + "." + decimal.substr(0, len));
	}
	return parseFloat(value);
}

function getCurrentChatTime() {
	var date = new Date();
	var hour = date.getHours();
	var minute = date.getMinutes();
	hour = ( hour == 0 ) ? hour = 12 : hour;
	return ((hour < 14) ? hour : hour-13)+":"+((minute < 10) ? "0"+minute : minute)+" "+((hour < 13) ? "AM" : "PM");
}

function coinNameFilter(str)
{
	if( str == 'TRX')
		return 'TX';
	
	if( str == 'BSV')
		return 'BSD';

	return str;
}

function abbreviatedApikey(str)
{
	if(str.length > 48)
		str = str.substring(0, 47) + "...";	
	return str;
}

function decimalFormat(str)
{	
	if(isNaN(str))
		return str;
	ret = Number(str).toFixed(4).replace(/0+$/,'');
	lastchar = ret.substr(ret.length - 1); 
	ret =  lastchar == '.' ? ret + '0' : ret;
	return ret
}

function formatDate(date) {
	var d = new Date(date),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

	if (month.length < 2) 
		month = '0' + month;
	if (day.length < 2) 
		day = '0' + day;		

	return [year, month, day].join('-');	
}

function formatDatetimeTime(date) {
	var d = new Date(date);

	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

	hour = '' + d.getHours();
	minutes = '' + d.getMinutes();
	secords = '' + d.getSeconds();

	if (month.length < 2) 
		month = '0' + month;

	if (day.length < 2) 
		day = '0' + day;

	if (hour.length < 2) 
		hour = '0' + hour;

	if (minutes.length < 2) 
		minutes = '0' + minutes;

	if (secords.length < 2) 
		secords = '0' + secords;

	return [year, month, day].join('-') + " " + [hour, minutes, secords].join(':');
}
  

Number.prototype.padLeft = function(base,chr){
	var  len = (String(base || 10).length - String(this).length)+1;
	return len > 0? new Array(len).join(chr || '0')+this : this;
 }



