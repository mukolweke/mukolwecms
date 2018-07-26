import Vue from 'vue'

Vue.filter('shortenOutput', function (str) {

    let width = 40;

    if (str.length>width) {
        let p=width
        for (;p>0 && str[p]!==' ';p--) {
        }
        if (p>0) {
            let left = str.substring(0, p);
            let right = str.substring(p+1);
            return left + " <br/> " + right;
        }
    }

    return str;
});