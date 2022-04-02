<?php
    const SUM = '+';
    const SUB = '-';
    const MULT = '×';
    const EQ = '≈';

    function sum($a, $b) {
        return $a + $b;
    }

    function sub($a, $b) {
        return $a - $b;
    }

    function mult($a, $b) {
        return $a * $b;
    }

    function eq($a, $b) {
        if ($a == $b) return '=';
        if ($a < $b) return '<';
        return '>';
    }

    function calc($a, $b, $oper) {
        switch ($oper) {
            case SUM:
                return sum($a, $b);
            
            case SUB:
                return sub($a, $b);
            
            case MULT:
                return mult($a, $b);
            
            case EQ:
                return eq($a, $b);
            
            default:
                return 'No such operator -> ' + $oper;
        }
    }

    $inpA = $_POST['a'];
    $inpB = $_POST['b'];
    $inpO = $_POST['oper'];

    echo $inpA . ' ' . $inpO . ' ' . $inpB . ' ⇒ ' . calc($inpA, $inpB, $inpO);
?>