if (typeof objectifyForm !== "function") {
    window.objectifyForm = function (formArray) { //serialize data function
        if (!formArray instanceof Array) {
            return false
        }
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }
}
