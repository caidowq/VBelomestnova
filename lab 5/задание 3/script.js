function filterArray() {

    const input = document.getElementById('arrayInput').value;


    const arr = input.split(',').map(Number);


    function hasAllOddDigits(num) {
        const integerPart = Math.floor(Math.abs(num));
        const digits = integerPart.toString().split('');
        return digits.every(digit => parseInt(digit) % 2 !== 0);
    }


    const filteredArr = arr.filter(num => !hasAllOddDigits(num));


    document.getElementById('result').textContent = `Отфильтрованный массив: ${filteredArr.join(', ')}`;
}