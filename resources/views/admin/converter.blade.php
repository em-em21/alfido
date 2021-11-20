@extends('layouts.admin')
@section('page-title', 'Конвертер валют | '.config('app.name'))
@section('title', 'Конвертер валют')

@section('admin-content')
<div class="col-lg-12 col-sm-12 col-md-12 d-flex mt-5 pl-4 pr-4 cc-wrapper">
    <div class="col-lg-7 col-md-6 mr-4 ml-3 converter con-light">
        <coin-ponent font="monospace"></coin-ponent>
    </div>
    <div class="col-lg-7 col-md-6 mr-4 ml-3 converter con-dark">
        <coin-ponent dark-mode font="monospace"></coin-ponent>
    </div>
    <div class="calculator card col-lg-4 col-md-6 ml-1 col-sm-0">
        <input type="text" class="calculator-screen " value="" disabled />
        <div class="calculator-keys">
            <button type="button" class="operator btn btn-info" value="+">+</button>
            <button type="button" class="operator btn btn-info" value="-">-</button>
            <button type="button" class="operator btn btn-info" value="*">&times;</button>
            <button type="button" class="operator btn btn-info" value="/">&divide;</button>

            <button type="button" value="7" class="btn btn-light waves-effect">7</button>
            <button type="button" value="8" class="btn btn-light waves-effect">8</button>
            <button type="button" value="9" class="btn btn-light waves-effect">9</button>

            <button type="button" value="4" class="btn btn-light waves-effect">4</button>
            <button type="button" value="5" class="btn btn-light waves-effect">5</button>
            <button type="button" value="6" class="btn btn-light waves-effect">6</button>

            <button type="button" value="1" class="btn btn-light waves-effect">1</button>
            <button type="button" value="2" class="btn btn-light waves-effect">2</button>
            <button type="button" value="3" class="btn btn-light waves-effect">3</button>

            <button type="button" value="0" class="btn btn-light waves-effect">0</button>
            <button type="button" class="decimal function btn btn-secondary" value=".">.</button>
            <button type="button" class="all-clear function btn btn-danger btn-sm" value="all-clear">AC</button>

            <button type="button" class="equal-sign operator btn btn-default" value="=">=</button>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/coinponent/coinponent@1.2.6/dist/coinponent.js"></script>
<script>
$(document).ready(function() {
    if ( $("body").hasClass('dark')) {
        $('.con-light').addClass('hide');
    } else {
        $('.con-dark').addClass('hide');
    }

    let toggler = $('.chk');
    toggler.on('click', function() {
        location.reload();
    }); 
});

const calculator = {
    displayValue: '0',
    firstOperand: null,
    waitingForSecondOperand: false,
    operator: null,
};

function inputDigit(digit) {
const { displayValue, waitingForSecondOperand } = calculator;

if (waitingForSecondOperand === true) {
    calculator.displayValue = digit;
    calculator.waitingForSecondOperand = false;
} else {
    calculator.displayValue = displayValue === '0' ? digit : displayValue + digit;
}
}

function inputDecimal(dot) {
    if (!calculator.displayValue.includes(dot)) {
        calculator.displayValue += dot;
    }
}

function handleOperator(nextOperator) {
    const { firstOperand, displayValue, operator } = calculator
    const inputValue = parseFloat(displayValue);

    if (operator && calculator.waitingForSecondOperand)  {
        calculator.operator = nextOperator;
        return;
    }

    if (firstOperand == null) {
        calculator.firstOperand = inputValue;
    } else if (operator) {
        const currentValue = firstOperand || 0;
        const result = performCalculation[operator](currentValue, inputValue);

        calculator.displayValue = String(result);
        calculator.firstOperand = result;
    }

    calculator.waitingForSecondOperand = true;
    calculator.operator = nextOperator;
}

const performCalculation = {
    '/': (firstOperand, secondOperand) => firstOperand / secondOperand,

    '*': (firstOperand, secondOperand) => firstOperand * secondOperand,

    '+': (firstOperand, secondOperand) => firstOperand + secondOperand,

    '-': (firstOperand, secondOperand) => firstOperand - secondOperand,

    '=': (firstOperand, secondOperand) => secondOperand
};

function resetCalculator() {
    calculator.displayValue = '0';
    calculator.firstOperand = null;
    calculator.waitingForSecondOperand = false;
    calculator.operator = null;
}

function updateDisplay() {
    const display = document.querySelector('.calculator-screen');
    display.value = calculator.displayValue;
}

    updateDisplay();

    const keys = document.querySelector('.calculator-keys');
    keys.addEventListener('click', (event) => {
        const { target } = event;
        if (!target.matches('button')) {
            return;
        }

        if (target.classList.contains('operator')) {
            handleOperator(target.value);
            updateDisplay();
            return;
        }

        if (target.classList.contains('decimal')) {
            inputDecimal(target.value);
            updateDisplay();
            return;
        }

        if (target.classList.contains('all-clear')) {
            resetCalculator();
            updateDisplay();
            return;
        }

        inputDigit(target.value);
        updateDisplay();
    });
</script>
@endpush