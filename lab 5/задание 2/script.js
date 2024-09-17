function calculateSum() {

    const input = document.getElementById('arrayInput').value;


    const arr = [];
    const elements = input.split(',');
    for (let i = 0; i < elements.length; i++) {
        arr.push(parseFloat(elements[i].trim()));
    }


    const tolerance = 1e-5;
    const PI = Math.PI;

    let firstIndex = -1;
    let lastIndex = -1;


    for (let i = 0; i < arr.length; i++) {
        if (Math.abs(arr[i] - PI) <= tolerance) {
            if (firstIndex === -1) {
                firstIndex = i;
            }
            lastIndex = i;
        }
    }

    if (firstIndex !== -1 && lastIndex !== -1 && lastIndex > firstIndex) {
        let sum = 0;

        
        for (let i = firstIndex + 1; i < lastIndex; i++) {
            sum += arr[i];
        }


        document.getElementById('result').textContent = `Сумма элементов между первым и последним допустимыми индексами: ${sum}`;
    } else {
       
        document.getElementById('result').textContent = 'Допустимые элементы не найдены или индексы указаны неверно.';
    }
}