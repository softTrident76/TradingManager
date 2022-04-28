function doViewSelCategory(categoryId) {
    getObject("frm").action = "index";
    getObject("categoryId").value = categoryId;
    getObject("frm").submit();
}

function doViewMyCart() {
    getObject("categoryId").value = -1;
    getObject("frm").action = "cart";
    getObject("frm").submit();
}

function doViewFavourite() {
    getObject("categoryId").value = -2;
    getObject("frm").action = "favourite";
    getObject("frm").submit();
}

function doViewPurchased() {
    getObject("categoryId").value = -3;
    getObject("frm").action = "purchased";
    getObject("frm").submit();
}

function doAddToFavourite(goodsId) {
    httpObj = createXMLHttpRequest(viewFavouriteResult);
    var params = "goodsId="+goodsId;
    if(httpObj) {
        httpObj.open("POST", "addFavourite");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function viewFavouriteResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        if( parseInt(httpObj.responseText) < 0 )
            alert(getObject("msg_failed_favourite").value);
        else if( parseInt(httpObj.responseText) == 0 )
            alert(getObject("msg_exist_favourite").value);
        else
            alert(getObject("msg_success_favourite").value);
    }
}

function doAddToCart(goodsId) {
    httpObj = createXMLHttpRequest(viewCartResult);
    var params = "goodsId="+goodsId;
    if(httpObj) {
        httpObj.open("POST", "addCart");
        httpObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpObj.send(params);
    }
}

function viewCartResult() {
    if( httpObj.readyState == 4 && httpObj.status ) {
        if( parseInt(httpObj.responseText) < 0 )
            alert(getObject("msg_failed_cart").value);
        else if( parseInt(httpObj.responseText) == 0 )
            alert(getObject("msg_exist_cart").value);
        else
            alert(getObject("msg_success_cart").value);
    }
}

function doAddCart(event) {
    if (validSelected(event)) {
        if( !confirm(getObject("msg_confirm_cart").value) ) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'appendCart';
        getObject("frm").submit();
    }
}

function doDeleteFromFavourite(event) {
    if (validSelected(event)) {
        if( !confirm(getObject("msg_confirm_delete").value) ) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'delFavourite';
        getObject("frm").submit();
    }
}

function doDeleteFromCart(event) {
    if (validSelected(event)) {
        if( !confirm(getObject("msg_confirm_delete").value) ) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'delCart';
        getObject("frm").submit();
    }
}

function doChangeQuantity(event, txtObj) {
    if( parseInt(txtObj.value) < 1 ) {
        stopEvent(event);
        txtObj.value = 1;
        return false;
    }
    var total = 0;
    for( var i = 0; i < document.getElementsByName("price").length; i++ ) {
        total += parseFloat(document.getElementsByName("price")[i].value) * parseFloat(document.getElementsByName("quantity")[i].value);
    }
    getObject("total").value = getNumberFormat(total, 3);
}

function doBuy(event) {
    if( !getObject("total").value || getObject("total").value == "0" || getObject("total").value == "" ) {
        alert(getObject("msg_none_cart").value);
        getObject("categoryId").value = 0;
        getObject("frm").action = 'index';
        getObject("frm").submit();
    } else if( parseFloat(getObject("deposit").value) < parseFloat(getObject("total").value) ) {
        if( !confirm(getObject("msg_alert_fund").value) ) {
            stopEvent(event);
            return false;
        } else {
            getObject("bgDiv").className = "show";
            getObject("fund-content").className = "fund-edit show";
            getObject("money").focus();
            // window.open(getObject("baseurl").value+"shop/deposit");
        }
    } else if( !confirm(getObject("msg_confirm_buy").value) ) {
        stopEvent(event);
        return false;
    } else {
        getObject("frm").action = 'buy';
        getObject("frm").submit();
    }
}

function doManualBuy(event) {
    if( !getObject("quantity").value || getObject("quantity").value == "0" || getObject("quantity").value == "" ) {
        alert(getObject("msg_input_quantity").value);
        getObject("quantity").focus();
        stopEvent(event);
        return false;
    }
    if( isNaN(getObject("quantity").value) ) {
        alert(getObject("msg_retry_quantity").value);
        getObject("quantity").select();
        stopEvent(event);
        return false;
    }
    if(  parseFloat(getObject("deposit").value) < parseFloat(getObject("price").value)*parseFloat(getObject("quantity").value)  ) {
        if( !confirm(getObject("msg_alert_fund").value) ) {
            stopEvent(event);
            return false;
        }
    }
    if( !confirm(getObject("msg_confirm_buy").value) ) {
        stopEvent(event);
        return false;
    }
    getObject("frm").action = 'manualBuy';
    getObject("frm").submit();
}

function doFund(event) {
    if( !getObject("money").value || getObject("money").value == "" ) {
        alert(getObject("msg_input_money").value);
        getObject("money").focus();
        stopEvent(event);
        return false;
    }
    if( isNaN(getObject("money").value) ) {
        alert(getObject("msg_retry_money").value);
        getObject("money").select();
        stopEvent(event);
        return false;
    }
    if( !confirm(getObject("msg_confirm_fund").value) ) {
        stopEvent(event);
        getObject("bgDiv").className = "hide";
        getObject("fund-content").className = "hide";
        return false;
    }
    window.open(getObject("baseurl").value+"shop/fund?money="+getObject("money").value);
}

function doCloseFund() {
    getObject("money").value = "";
    getObject("bgDiv").className = "hide";
    getObject("fund-content").className = "hide";
}