function processWord() {
    var inputWord = document.getElementById('inputWord').value;
    var result = '';
    for (var i = 0; i < inputWord.length; i++) {
        if (i % 2 === 0) {
            result += inputWord[i].toLowerCase();
        } else {
            result += inputWord[i].toUpperCase();
        }
    }
    document.getElementById('result').textContent = "Результат обработки: " + result;
}