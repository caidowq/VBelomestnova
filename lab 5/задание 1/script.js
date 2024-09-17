
function findFibonacci() {
    var n = parseInt(document.getElementById('inputN').value);
    var result = document.getElementById('result');
    
    if (n <= 0) {
        result.textContent = "N должно быть положительным целым числом";
        return;
    }
    if (n === 1 || n === 2) {
        result.textContent = n + "-й Фибоначчи номер 1";
        return;
    }
    
    var a = 1, b = 1, temp;
    for (var i = 3; i <= n; i++) {
        temp = a + b;
        a = b;
        b = temp;
    }
    result.textContent = n + "-й Фибоначчи номер " + b;
}
