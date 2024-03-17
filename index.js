function saveData(key, value) {
    localStorage.setItem(key, value);
}

function getData(key) {
    return localStorage.getItem(key);
}

document.querySelector('select[name="text1"]').addEventListener('change', function() {
    saveData('text1', this.value);
});

document.querySelector('input[name="text2"]').addEventListener('input', function() {
    saveData('text2', this.value);
});

document.querySelector('input[name="text3"]').addEventListener('input', function() {
    saveData('text3', this.value);
});

document.querySelector('select[name="text4"]').addEventListener('change', function() {
    saveData('text4', this.value);
});

window.onload = function() {
    var savedText1 = getData('text1');
    if (savedText1) {
        document.querySelector('select[name="text1"]').value = savedText1;
    }

    var savedText2 = getData('text2');
    if (savedText2) {
        document.querySelector('input[name="text2"]').value = savedText2;
    }

    var savedText3 = getData('text3');
    if (savedText3) {
        document.querySelector('input[name="text3"]').value = savedText3;
    }

    var savedText4 = getData('text4');
    if (savedText4) {
        document.querySelector('select[name="text4"]').value = savedText4;
    }
}