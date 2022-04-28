function doCancel() {
    getObject("id").value = 0;
    getObject("name").value = "";
}

function doActive(event) {
    if (validSelected(event)) {
        if (!confirm("선택한 항목을 활성화하겠습니까?")) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'goods/active';
        getObject("frm").submit();
    }
}

function doDeactive(event) {
    if (validSelected(event)) {
        if( !confirm("선택한 항목을 비활성화하겠습니까?") ) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'goods/deactive';
        getObject("frm").submit();
    }
}

function doDelete(event) {
    if (validSelected(event)) {
        if( !confirm("선택한 항목을 삭제하겠습니까?") ) {
            stopEvent(event);
            return false;
        }
        getObject("frm").action = 'goods/delete';
        getObject("frm").submit();
    }
}