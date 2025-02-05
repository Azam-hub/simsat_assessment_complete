const myLocalStorage = (() => {

    function setValue(key, value, expiryTime) {
        const time = Date.now() + expiryTime;
        localStorage.setItem(key, JSON.stringify([value, time]))
    }

    function getValue(key) {
        if (localStorage.getItem(key) === null) return null;

        if (Date.now() > JSON.parse(localStorage.getItem(key))[1]) {
            localStorage.removeItem(key)
            return null;
        }

        return JSON.parse(localStorage.getItem(key))[0];
    }

    return {
        setValue,
        getValue,
    };
})();