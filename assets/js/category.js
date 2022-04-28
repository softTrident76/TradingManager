function doSelectRow(trObj, id) {
    getObject("id").value = id;
    getObject("name").value = trObj.childNodes.item(3).innerHTML;
}

function doCancel() {
    getObject("id").value = 0;
    getObject("name").value = "";
}

function doDelete(event) {
    if (validSelected(event)) {
        if( !confirm(getObject("msg_confirm_delete").value) ) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'category/delete';
        getObject("frm").submit();
    }
}