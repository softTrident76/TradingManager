if (typeof (JKL) == 'undefined')
	JKL = function() {
	};

JKL.Calendar = function(eid, valname) {
	this.eid = eid;
	this.valname = valname;
	this.__dispelem = null;
	this.__textelem = null;
	this.__opaciobj = null;
	this.style = new JKL.Calendar.Style();
	return this;
};

JKL.Calendar.VERSION = "1.0";

JKL.Calendar.prototype.spliter = "-";
JKL.Calendar.prototype.date = null;
JKL.Calendar.prototype.min_date = null;
JKL.Calendar.prototype.max_date = null;
JKL.Calendar.prototype.lang = null;

JKL.Calendar.Style = function() {
	return this;
};

JKL.Calendar.Style.prototype.frame_width = "150px";
JKL.Calendar.Style.prototype.frame_color = "#4557F8";
JKL.Calendar.Style.prototype.font_size = "12px";
JKL.Calendar.Style.prototype.day_bgcolor = "#F0F0F0";
JKL.Calendar.Style.prototype.month_color = "#FFFFFF";
JKL.Calendar.Style.prototype.month_hover_color = "#4557F8";
JKL.Calendar.Style.prototype.month_hover_bgcolor = "#FFFFCC";
JKL.Calendar.Style.prototype.weekday_color = "#4557F8";
JKL.Calendar.Style.prototype.saturday_color = "#4557F8";
JKL.Calendar.Style.prototype.sunday_color = "#4557F8";
JKL.Calendar.Style.prototype.others_color = "#999999";
JKL.Calendar.Style.prototype.day_hover_bgcolor = "#FF9933";
JKL.Calendar.Style.prototype.cursor = "pointer";

JKL.Calendar.Style.prototype.set = function(key, val) {
	this[key] = val;
}
JKL.Calendar.Style.prototype.get = function(key) {
	return this[key];
}
JKL.Calendar.prototype.setStyle = function(key, val) {
	this.style.set(key, val);
};
JKL.Calendar.prototype.getStyle = function(key) {
	return this.style.get(key);
};

JKL.Calendar.prototype.initDate = function(dd) {
	if (!dd)
		dd = new Date();
	var year = dd.getFullYear();
	var mon = dd.getMonth();
	var date = dd.getDate();
	this.date = new Date(year, mon, date);
	this.getFormValue();
	return this.date;
}

JKL.Calendar.prototype.getOpacityObject = function() {
	if (this.__opaciobj)
		return this.__opaciobj;
	var cal = this.getCalendarElement();
	if (!JKL.Opacity)
		return;
	this.__opaciobj = new JKL.Opacity(cal);
	return this.__opaciobj;
};

JKL.Calendar.prototype.getCalendarElement = function() {
	if (this.__dispelem)
		return this.__dispelem;
	this.__dispelem = document.getElementById(this.eid)
	return this.__dispelem;
};

JKL.Calendar.prototype.getFormElement = function() {
	var valObj = getObject(this.valname);
	return valObj;
};

JKL.Calendar.prototype.convertTxtValue = function() {
	var txt = this.getFormElement();
	var contertedTxt = this.getConvertedTxt(txt.value);

	if (contertedTxt) {
		var splt = contertedTxt.split(this.spliter);
		this.date = new Date(splt[0] - 0, splt[1] - 1, splt[2] - 0);

		if (!this.date
				|| (this.min_date && this.date.getTime() < this.min_date
						.getTime())
				|| (this.max_date && this.date.getTime() > this.max_date
						.getTime())) {
			txt.value = '';
			this.initDate();
			return;
		}

		txt.value = contertedTxt;
		return;
	}

	txt.value = '';
	this.initDate();
}
JKL.Calendar.prototype.getConvertedTxt = function(txt) {
	var rawTxt = trim(txt);

	if (!rawTxt)
		return '';

	var dateRegExp = [
			new RegExp('^\\s*(\\d+)\\s*-\\s*(\\d{1,2})\\s*-\\s*(\\d{1,2})\\s*$'),
			new RegExp('^\\s*(\\d+)\\s*/\\s*(\\d{1,2})\\s*/\\s*(\\d{1,2})\\s*$'),
			new RegExp('^\\s*(\\d+)\\s*.\\s*(\\d{1,2})\\s*.\\s*(\\d{1,2})\\s*$') ];

	for ( var i = 0; i < 3; i++) {
		var match = dateRegExp[i].exec(rawTxt);

		if (!match)
			continue;

		var year_txt = match[1];
		var month_txt = match[2];
		var day_txt = match[3];

		if (i != 2 || rawTxt == (year_txt + '.' + month_txt + '.' + day_txt)) {
			if ((parseInt(month_txt.charAt(month_txt.length - 1)) == 0 && parseInt(month_txt) == 0)
					|| (parseInt(day_txt.charAt(day_txt.length - 1)) == 0 && parseInt(day_txt) == 0))
				return '';

			if (year_txt.length == 1)
				year_txt = '200' + year_txt;
			else if (year_txt.length == 2)
				year_txt = '20' + year_txt;
			else if (year_txt.length == 3)
				year_txt = '0' + year_txt;

			if (month_txt.length == 1)
				month_txt = '0' + month_txt;

			if (day_txt.length == 1)
				day_txt = '0' + day_txt;

			return year_txt + '-' + month_txt + '-' + day_txt;
		} else {
			for ( var j = 0; j < 10; j++) {
				if (rawTxt.indexOf(year_txt + '' + j + '' + month_txt) == 0) {
					month_txt = j + '' + month_txt;

					if (parseInt(month_txt.charAt(month_txt.length - 1)) == 0
							&& parseInt(month_txt) == 0)
						return '';

					for ( var k = 0; k < 10; k++) {
						if (rawTxt.indexOf(year_txt + month_txt + '' + k + ''
								+ day_txt) == 0) {
							day_txt = k + '' + day_txt;

							if (parseInt(day_txt.charAt(day_txt.length - 1)) == 0
									&& parseInt(day_txt) == 0)
								return '';

							if (year_txt.length == 1)
								year_txt = '200' + year_txt;
							else if (year_txt.length == 2)
								year_txt = '20' + year_txt;
							else if (year_txt.length == 3)
								year_txt = '0' + year_txt;

							return year_txt + '-' + month_txt + '-' + day_txt;
						}
					}
				}
			}
		}
	}

	return '';
}

JKL.Calendar.prototype.setDateYMD = function(ymd) {
	var splt = ymd.split(this.spliter);
	if (splt[0] - 0 > 0 && splt[1] - 0 >= 1 && splt[1] - 0 <= 12 && // bug fix
			splt[2] - 0 >= 1 && splt[2] - 0 <= 31) {
		if (!this.date)
			this.initDate();
		this.date.setFullYear(splt[0]);
		this.date.setMonth(splt[1] - 1);
		this.date.setDate(splt[2]);
	} else {
		ymd = "";
	}
	return ymd;
};

JKL.Calendar.prototype.getDateYMD = function(dd) {
	if (!dd) {
		if (!this.date)
			this.initDate();
		dd = this.date;
	}
	var mm = "" + (dd.getMonth() + 1);
	var aa = "" + dd.getDate();
	if (mm.length == 1)
		mm = "" + "0" + mm;
	if (aa.length == 1)
		aa = "" + "0" + aa;
	return dd.getFullYear() + this.spliter + mm + this.spliter + aa;
};

JKL.Calendar.prototype.getFormValue = function() {
	var form1 = this.getFormElement();
	if (!form1)
		return "";
	var date1 = this.setDateYMD(form1.value);
	return date1;
};

JKL.Calendar.prototype.setFormValue = function(ymd) {
	if (!ymd)
		ymd = this.getDateYMD();
	var form1 = this.getFormElement();
	if (form1) {
		form1.value = ymd;
	}
};


JKL.Calendar.prototype.show = function() {
	this.getCalendarElement().className = "show";
};

JKL.Calendar.prototype.hide = function() {
	this.getCalendarElement().className = "hide";
};

JKL.Calendar.prototype.fadeOut = function(s) {
	if (JKL.Opacity) {
		this.getOpacityObject().fadeOut(s);
	} else {
		this.hide();
	}
};

JKL.Calendar.prototype.moveMonth = function(mon) {
	if (!this.date)
		this.initDate();
	for (; mon < 0; mon++) {
		this.date.setDate(1);
		this.date.setTime(this.date.getTime() - (24 * 3600 * 1000));
	}
	for (; mon > 0; mon--) {
		this.date.setDate(1);
		this.date.setTime(this.date.getTime() + (24 * 3600 * 1000) * 32);
	}
	this.date.setDate(1);
	this.write();
};

JKL.Calendar.prototype.moveYear = function(year) {
	if (!this.date)
		this.initDate();

	this.date.setFullYear(this.date.getFullYear() + year);

	this.write();
};

JKL.Calendar.prototype.addEvent = function(elem, ev, func) {
	if (window.Event && Event.observe) {
		Event.observe(elem, ev, func, false);
	} else {
		elem["on" + ev] = func;
	}
};

JKL.Calendar.prototype.write = function() {
	var date = new Date();

	if (!this.date)
		this.initDate();

	date.setTime(this.date.getTime());

	var year = date.getFullYear();
	var mon = date.getMonth();
	var today = date.getDate();
	var form1 = this.getFormElement();

	var min;
	if (this.min_date) {
		min = this.min_date.getTime();
	}
	var max;
	if (this.max_date) {
		max = this.max_date.getTime();
	}

	date.setDate(1);
	var wday = date.getDay();
	if (wday != 1) {
		if (wday == 0)
			wday = 7;
		date.setTime(date.getTime() - (24 * 3600 * 1000) * (wday - 1));
	}

	var list = new Array();
	for ( var i = 0; i < 42; i++) {
		var tmp = new Date();
		tmp.setTime(date.getTime() + (24 * 3600 * 1000) * i);
		if (i && i % 7 == 0 && tmp.getMonth() != mon)
			break;
		list[list.length] = tmp;
	}

	var month_table_style = 'width: 100%; ';
	month_table_style += 'background: ' + this.style.frame_color + '; ';
	month_table_style += 'border: 1px solid ' + this.style.frame_color + ';';

	var week_table_style = 'width: 100%; ';
	week_table_style += 'background: ' + this.style.day_bgcolor + '; ';
	week_table_style += 'border-left: 1px solid ' + this.style.frame_color + '; ';
	week_table_style += 'border-right: 1px solid ' + this.style.frame_color + '; ';

	var days_table_style = 'width: 100%; ';
	days_table_style += 'background: ' + this.style.day_bgcolor + '; ';
	days_table_style += 'border: 1px solid ' + this.style.frame_color + '; ';

	var month_td_style = "";
	month_td_style += 'font-size: ' + this.style.font_size + '; ';
	month_td_style += 'color: ' + this.style.month_color + '; ';
	month_td_style += 'padding: 4px 0px 2px 0px; ';
	month_td_style += 'text-align: center; ';
	month_td_style += 'font-weight: bold;';

	var week_td_style = "";
	week_td_style += 'font-size: ' + this.style.font_size + '; ';
	week_td_style += 'padding: 2px 0px 2px 0px; ';
	week_td_style += 'font-weight: bold;';
	week_td_style += 'text-align: center;';

	var days_td_style = "";
	days_td_style += 'font-size: ' + this.style.font_size + '; ';
	days_td_style += 'padding: 1px; ';
	days_td_style += 'text-align: center; ';
	days_td_style += 'font-weight: bold;';

	var days_unselectable = "font-weight: normal;";

	var src1 = "";

	var prev_year_txt = '전해로';
	var prev_month_txt = '전달로';
	var next_month_txt = '다음달로';
	var next_year_txt = '다음해로';
	var year_txt = '년';
	var month_txt = '월';
	var day_1_txt = '월';
	var day_2_txt = '화';
	var day_3_txt = '수';
	var day_4_txt = '목';
	var day_5_txt = '금';
	var day_6_txt = '토';
	var day_7_txt = '일';

	src1 += '<table border="0" cellpadding="0" cellspacing="0" style="' + month_table_style + '"><tr>';
	src1 += '<td id="__' + this.eid + '_btn_prev_year" title="' + prev_year_txt
			+ '" style="' + month_td_style + '">≪</td>';
	src1 += '<td style="' + month_td_style + '">&nbsp;</td>';
	src1 += '<td id="__' + this.eid + '_btn_prev_month" title="'
			+ prev_month_txt + '" style="' + month_td_style + '"><</td>';
	src1 += '<td style="' + month_td_style + '">' + (year) + year_txt + ' '
			+ (mon + 1) + month_txt + '</td>';
	src1 += '<td id="__' + this.eid + '_btn_next_month" title="'
			+ next_month_txt + '" style="' + month_td_style + '">></td>';
	src1 += '<td style="' + month_td_style + '">&nbsp;</td>';
	src1 += '<td id="__' + this.eid + '_btn_next_year" title="' + next_year_txt
			+ '" style="' + month_td_style + '">≫</td>';
	src1 += "</tr></table>\n";
	src1 += '<table border="0" cellpadding="0" cellspacing="0" style="' + week_table_style + '"><tr>';
	src1 += '<td style="color: ' + this.style.weekday_color + '; '
			+ week_td_style + '">' + day_1_txt + '</td>';
	src1 += '<td style="color: ' + this.style.weekday_color + '; '
			+ week_td_style + '">' + day_2_txt + '</td>';
	src1 += '<td style="color: ' + this.style.weekday_color + '; '
			+ week_td_style + '">' + day_3_txt + '</td>';
	src1 += '<td style="color: ' + this.style.weekday_color + '; '
			+ week_td_style + '">' + day_4_txt + '</td>';
	src1 += '<td style="color: ' + this.style.weekday_color + '; '
			+ week_td_style + '">' + day_5_txt + '</td>';
	src1 += '<td style="color: ' + this.style.saturday_color + '; '
			+ week_td_style + '">' + day_6_txt + '</td>';
	src1 += '<td style="color: ' + this.style.sunday_color + '; '
			+ week_td_style + '">' + day_7_txt + '</td>';
	src1 += "</tr></table>\n";
	src1 += '<table border="0" cellpadding="0" cellspacing="0" style="' + days_table_style + '">';

	var curutc;
	if (form1 && form1.value) {
		var splt = form1.value.split(this.spliter);
		if (splt[0] > 0 && splt[2] > 0) {
			var curdd = new Date(splt[0] - 0, splt[1] - 1, splt[2] - 0);
			curutc = curdd.getTime();
		}
	}

	for ( var i = 0; i < list.length; i++) {
		var dd = list[i];
		var ww = dd.getDay();
		var mm = dd.getMonth();
		if (ww == 1) {
			src1 += "<tr>";
		}
		var cc = days_td_style;
		if (mon == mm) {
			if (ww == 0) {
				cc += "color: " + this.style.sunday_color + ";";
			} else if (ww == 6) {
				cc += "color: " + this.style.saturday_color + ";";
			} else {
				cc += "color: " + this.style.weekday_color + ";";
			}
		} else {
			cc += "color: " + this.style.others_color + ";";
		}
		var utc = dd.getTime();
		if ((min && min > utc) || (max && max < utc)) {
			cc += days_unselectable;
		}
		if (utc == curutc) {
			cc += "background: " + this.style.day_hover_bgcolor + ";";
		}

		var ss = this.getDateYMD(dd);
		var tt = dd.getDate();
		src1 += '<td style="' + cc + '" title=' + ss + ' id="__' + this.eid
				+ '_td_' + ss + '">' + tt + '</td>';
		if (ww == 7) {
			src1 += "</tr>\n";
		}
	}
	src1 += "</table>\n";

	var cal1 = this.getCalendarElement();
	if (!cal1)
		return;
	cal1.style.width = this.style.frame_width;
	cal1.style.position = "absolute";
	cal1.innerHTML = src1;

	var __this = this;
	var get_src = function(ev) {
		ev = ev || window.event;
		var src = ev.target || ev.srcElement;
		return src;
	};
	var month_onmouseover = function(ev) {
		var src = get_src(ev);
		src.style.color = __this.style.month_hover_color;
		src.style.background = __this.style.month_hover_bgcolor;
	};
	var month_onmouseout = function(ev) {
		var src = get_src(ev);
		src.style.color = __this.style.month_color;
		src.style.background = __this.style.frame_color;
	};
	var day_onmouseover = function(ev) {
		var src = get_src(ev);
		src.style.background = __this.style.day_hover_bgcolor;
	};
	var day_onmouseout = function(ev) {
		var src = get_src(ev);
		src.style.background = __this.style.day_bgcolor;
	};
	var day_onclick = function(ev) {
		var src = get_src(ev);
		var srcday = src.id.substr(src.id.length - 10);
		__this.setFormValue(srcday);
		__this.fadeOut(1.0);
	};

	var tdprevYear = document
			.getElementById("__" + this.eid + "_btn_prev_year");
	tdprevYear.style.cursor = this.style.cursor;
	this.addEvent(tdprevYear, "mouseover", month_onmouseover);
	this.addEvent(tdprevYear, "mouseout", month_onmouseout);
	this.addEvent(tdprevYear, "click", function() {
		__this.moveYear(-1);
	});

	var tdprev = document.getElementById("__" + this.eid + "_btn_prev_month");
	tdprev.style.cursor = this.style.cursor;
	this.addEvent(tdprev, "mouseover", month_onmouseover);
	this.addEvent(tdprev, "mouseout", month_onmouseout);
	this.addEvent(tdprev, "click", function() {
		__this.moveMonth(-1);
	});

	var tdnext = document.getElementById("__" + this.eid + "_btn_next_month");
	tdnext.style.cursor = this.style.cursor;
	this.addEvent(tdnext, "mouseover", month_onmouseover);
	this.addEvent(tdnext, "mouseout", month_onmouseout);
	this.addEvent(tdnext, "click", function() {
		__this.moveMonth(+1);
	});

	var tdnextYear = document
			.getElementById("__" + this.eid + "_btn_next_year");
	tdnextYear.style.cursor = this.style.cursor;
	this.addEvent(tdnextYear, "mouseover", month_onmouseover);
	this.addEvent(tdnextYear, "mouseout", month_onmouseout);
	this.addEvent(tdnextYear, "click", function() {
		__this.moveYear(+1);
	});

	for ( var i = 0; i < list.length; i++) {
		var dd = list[i];
		if (mon != dd.getMonth())
			continue;

		var utc = dd.getTime();
		if (min && min > utc)
			continue;
		if (max && max < utc)
			continue;
		if (utc == curutc)
			continue;

		var ss = this.getDateYMD(dd);
		var cc = document.getElementById("__" + this.eid + "_td_" + ss);
		if (!cc)
			continue;

		cc.style.cursor = this.style.cursor;
		this.addEvent(cc, "mouseover", day_onmouseover);
		this.addEvent(cc, "mouseout", day_onmouseout);
		this.addEvent(cc, "click", day_onclick);
	}

	this.show();
};

JKL.Calendar.prototype.getCalenderElement = JKL.Calendar.prototype.getCalendarElement;
JKL.Calender = JKL.Calendar;

var cals = [];

function handleCalendar() {
	addEventHandler(document, 'click', function(evt) {
		var src = evt.target || evt.srcElement;

		for ( var i = 0; i < cals.length; i++) {
			if (cals[i][0] == src) {
				cals[i][1].convertTxtValue();
				cals[i][1].write();
			} else if ((cals[i][1].getCalenderElement().style.display === "")
					&& (!isCalendarButton(cals[i][1], src))) {
				cals[i][1].convertTxtValue();
				cals[i][1].hide();
			}
		}
	});
}

function isCalendarButton(calendar, evtSrc) {
	if (!evtSrc.id)
		return false;

	return evtSrc.id.indexOf('__' + calendar.eid + '_btn_') == 0;
}

function makeCalendarField(formID, txtFieldID, lang) {
	var calField = getObject(txtFieldID);
	if (!calField)
		return;

	calField.setAttribute('autocomplete', 'off');
	calField.style.width = '70';
	addEventHandler(calField, 'keydown', function(evt) {
		var keyCode = evt.keyCode || evt.charCode;

		if (keyCode == 13) {
			stopEvent(evt);
		}
		if(keyCode == 9) {
			for ( var i = 0; i < cals.length; i++) {
				if ((cals[i][1].getCalenderElement().style.display === "")
						&& (!isCalendarButton(cals[i][1], calField))) {
					cals[i][1].convertTxtValue();
					cals[i][1].hide();
				}
			}
		}
	});
	addEventHandler(calField, 'focus', function(evt) {
		for ( var i = 0; i < cals.length; i++) {
			if (cals[i][0] == calField) {
				cals[i][1].convertTxtValue();
				cals[i][1].write();
			}
		}
	});

//	var brTagEl = insertAfter(document.createElement('br'), calField);
	var calView = insertAfter(document.createElement('span'), calField);
	calView.setAttribute('id', txtFieldID + '_cal_view');
	calView.setAttribute('style', 'z-index: 999;');
	
	var calendar = new JKL.Calendar(calView.id, txtFieldID);
	if (lang)
		calendar.lang = lang;

	var startDate = calField.getAttribute('startDate');
	var endDate = calField.getAttribute('endDate');
	var splt = null;

	if (startDate) {
		splt = startDate.split(calendar.spliter);
		calendar.min_date = new Date(splt[0] - 0, splt[1] - 1, splt[2] - 0);
	}

	if (endDate) {
		splt = endDate.split(calendar.spliter);
		calendar.max_date = new Date(splt[0] - 0, splt[1] - 1, splt[2] - 0);
	}

	cals.push( [ calField, calendar ]);
}