function appendNumber(number) {
    var result = document.getElementById("result");
    result.value += number;
}

function appendOperator(operator) {
    var result = document.getElementById("result");
    result.value += operator;
}

function calculateResult() {
    var result = document.getElementById("result");
    try {
        result.value = eval(result.value);
    } catch (error) {
        result.value = "Error";
    }
}

function clearResult() {
    var result = document.getElementById("result");
    result.value = "";
}

function deleteLast() {
    var result = document.getElementById("result");
    result.value = result.value.slice(0, -1);
}
function appendReciprocal() {
    var result = document.getElementById("result").value;
    var counter =0;
    var str="";
    for(let i =0;i<result.length;i++)
    {
        if (result[i]!="%" && result[i]!="√" && result[i]!="-" && result[i]!="+" && result[i]!="/" && result[i]!="*")
        {
            str+=result[i];
            counter+=1;
        }
        else
        {
            str="";
            counter=0;
        }
    }
    var number =1/(parseFloat(str));
    document.getElementById("result").value=result.slice(0,-counter)+number.toString();
}
function appendSqrt() {
    var result = document.getElementById("result").value;
    var counter =0;
    var str="";
    for(let i =0;i<result.length;i++)
    {
        if (result[i]!="%" && result[i]!="√" && result[i]!="-" && result[i]!="+" && result[i]!="/" && result[i]!="*")
        {
            str+=result[i];
            counter+=1;
        }
        else
        {
            str="";
            counter=0;
        }
    }
    var number =Math.sqrt(parseFloat(str));
    document.getElementById("result").value=result.slice(0,-counter)+number.toString();
}