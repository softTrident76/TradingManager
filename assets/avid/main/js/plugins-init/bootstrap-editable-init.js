/**
 * **************************************************
 * ******* Name: arvid
 * ******* Description: Bootstrap 4 Admin Dashboard
 * ******* Version: 1.0.0
 * ******* Released on 2019-02-13 00:31:49
 * ******* Support Email : quixlab.com@gmail.com
 * ******* Support Skype : sporsho9
 * ******* Author: Quixlab
 * ******* URL: https://quixlab.com
 * ******* Themeforest Profile : https://themeforest.net/user/quixlab
 * ******* License: ISC
 * ***************************************************
 */

$(function(){$("#username").editable({type:"text",pk:1,name:"username",title:"Enter username"}),$("#firstname").editable({validate:function(e){if(""==$.trim(e))return"This field is required"}}),$("#sex").editable({prepend:"not selected",source:[{value:1,text:"Male"},{value:2,text:"Female"}],display:function(e,t){var i=$.grep(t,function(t){return t.value==e});i.length?$(this).text(i[0].text).css("color",{"":"#98a6ad",1:"#5fbeaa",2:"#5d9cec"}[e]):$(this).empty()}}),$("#status").editable(),$("#group").editable({showbuttons:!1}),$("#dob").editable(),$("#comments").editable({showbuttons:"bottom"}),$("#inline-username").editable({type:"text",pk:1,name:"username",title:"Enter username",mode:"inline"}),$("#inline-firstname").editable({validate:function(e){if(""==$.trim(e))return"This field is required"},mode:"inline"}),$("#inline-sex").editable({prepend:"not selected",mode:"inline",source:[{value:1,text:"Male"},{value:2,text:"Female"}],display:function(e,t){var i=$.grep(t,function(t){return t.value==e});i.length?$(this).text(i[0].text).css("color",{"":"#98a6ad",1:"#5fbeaa",2:"#5d9cec"}[e]):$(this).empty()}}),$("#inline-status").editable({mode:"inline"}),$("#inline-group").editable({showbuttons:!1,mode:"inline"}),$("#inline-dob").editable({mode:"inline"}),$("#inline-comments").editable({showbuttons:"bottom",mode:"inline"})});