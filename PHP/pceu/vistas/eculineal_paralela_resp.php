<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $x1 = ($_POST['x1']);
    $y1 = ($_POST['y1']);
    $m1_1 = ($_POST['m1_1']);
    $m1_2 = ($_POST['m1_2']);

    if ($m1_1 > 0 && $m1_2 < 0) {
        echo '
        y2=(' . $m2_1 . '*(x-(' . $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
        y2=(' . $m2_1 . 'x-(' . $m2_1 * $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
        y2=' . $m2_1 . '/' . $m2_2 . 'x+(' . -1 * $m2_1 * $x1 . '/' . $m2_2 . ')+(' . $y1 . ')';
    } elseif ($m1_1 < 0 && $m1_2 > 0) {
        if ($y1 == 0) {
            echo
            'y2=(' . $m2_1 . '*(x-(' . $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
            y2=(' . $m2_1 . 'x-(' . $m2_1 * $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>';
            if (-1 * $m2_1 * $x1 > 0) {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x+(' . -1 * $m2_1 * $x1 . '/' . $m2_2 . ')';
            } elseif (-1 * $m2_1 * $x1 < 0) {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x' . -1 * $m2_1 * $x1 . '/' . $m2_2;
            }
        } elseif ($y1 > 0) {
            echo
            'y2=(' . $m2_1 . '*(x-(' . $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
            y2=(' . $m2_1 . '*(x+' . ($x1 * -1) . ')/' . $m2_2 . ')+(' . $y1 . ')<br>
            y2=(' . $m2_1 . 'x+' . ($m2_1 * $x1 * -1) . ')/' . $m2_2 . ')+' . $y1 . '<br>
            y2=' . $m2_1 . '/' . $m2_2 . 'x+' . ($m2_1 * $x1 * -1) . '/' . $m2_2 . '+' . $y1 . '<br>
            y2=' . $m2_1 . '/' . $m2_2 . 'x+' . ($m2_1 * $x1 * -1) . '/' . $m2_2 . '+' . $y1 * $m2_2 . '/' . $m2_2 . '<br>';
            if ((($m2_1 * $x1) - ($y1 * $m2_2)) > 0) {
                echo '';
            } else {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x+' . (($m2_1 * $x1 * -1) + ($y1 * $m2_2)) . '/' . $m2_2;
            }
        } else {
            echo
            'y2=(' . $m2_1 . '*(x-(' . $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
            y2=(' . $m2_1 . 'x' . ($x1 * -1) . ')/' . $m2_2 . ')' . $y1 . '<br>
            y2=' . $m2_1 . '/' . $m2_2 . 'x' . ($m2_1 * $x1 * -1) . '/' . $m2_2 . $y1 . '<br>
            y2=' . $m2_1 . '/' . $m2_2 . 'x' . ($m2_1 * $x1 * -1) . '/' . $m2_2 . $y1 * $m2_2 . '/' . $m2_2 . '<br>';
            if (($m2_1 * $x1) - ($y1 * $m2_2) > 0) {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x-' . ($m2_1 * $x1) - ($y1 * $m2_2) . '/' . $m2_2;
            } else {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x' . ($m2_1 * $x1) - ($y1 * $m2_2) . '/' . $m2_2;
            }
        }
    } elseif ($m1_1 > 0 && $m1_2 > 0) {
        if ($y1 == 0) {
            echo
            'y2=(' . $m2_1 . '*(x-(' . $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
            y2=(' . $m2_1 . 'x-(' . $m2_1 * $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>';
            if (-1 * $m2_1 * $x1 > 0) {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x+(' . -1 * $m2_1 * $x1 . '/' . $m2_2 . ')';
            } elseif (-1 * $m2_1 * $x1 < 0) {
                echo 'y2=' . $m2_1 . '/' . $m2_2 . 'x' . -1 * $m2_1 * $x1 . '/' . $m2_2;
            }
        } elseif ($y1 > 0) {
            echo
            'y2=(' . $m2_1 . '*(x-(' . $x1 . '))/' . $m2_2 . ')+(' . $y1 . ') <br>';
            if (((($m2_1 * $x1) - ($y1 * $m2_2)) > 0)) {
                echo '
                y2=(' . $m2_1 . '*(x-' . $x1 . ')/' . $m2_2 . ')+(' . $y1 . ') <br>
                y2=(' . $m2_1 . 'x' . ($x1 * $m2_1 * -1) . ')/' . $m2_2 . '+' . $y1 . '<br>
                y26=-' . $m2_1 . '/' . ($m2_2 * -1) . 'x+' . ($m2_1 * $x1) . '/' . ($m2_2 * -1) . '+' . $y1 . '<br>
                y2=-' . $m2_1 . '/' . ($m2_2 * -1) . 'x+' . ($m2_1 * $x1) . '/' . ($m2_2 * -1) . '+' . $y1 * ($m2_2 * -1) . '/' . ($m2_2 * -1) . '<br>
                y2=-' . $m2_1 . '/' . ($m2_2 * -1) . 'x+' . ($m2_1 * $x1) + (-1 * $y1 * $m2_2) . '/' . ($m2_2 * -1) . '<br>';
            } elseif ($m2_1 * $x1 == 0) {
                echo '
                y2=(' . $m2_1 . 'x-' . $m2_1 * $x1 . ')/' . $m2_2 . ')' . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $m2_1 * $x1 . '/' . $m2_2 . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $m2_1 * $x1 . '/' . $m2_2 . '+' . $y1 * $m2_2 . '/' . $m2_2 . '<br>';
                if ($m2_1 * $x1 < 0) {
                    echo '
                y2=(' . $m2_1 . 'x-' . $m2_1 * $x1 . ')/' . $m2_2 . ')' . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $m2_1 * $x1 . '/' . $m2_2 . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $m2_1 * $x1 . '/' . $m2_2 . '+' . $y1 * $m2_2 . '/' . $m2_2 . '<br>';
                } else {
                    echo '
                y2=(' . $m2_1 . 'x-' . $m2_1 * $x1 . ')/' . $m2_2 . ')' . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $m2_1 * $x1 . '/' . $m2_2 . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $m2_1 * $x1 . '/' . $m2_2 . '+' . $y1 * $m2_2 . '/' . $m2_2 . '<br>';
                }
            } elseif ($m2_1 * $x1 < 0) {
                if ($y1 > 0) {
                    echo '
                y2=(' . $m2_1 . '*(x+' . -1 * $x1 . '))/' . $m2_2 . ')+(' . $y1 . ')<br>
                y2=(' . $m2_1 . 'x+' . -1 * $x1 * $m2_1 . ')/' . $m2_2 . ')+(' . $y1 . ')<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x+' . -1 * $x1 * $m2_1 . '/' . $m2_2 . '+' . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m2_2 . 'x-' . $x1 * $m2_1 * -1 . '/' . -1 * $m1_2 . $y1 * $m2_2 . '/' . -1 * $m2_2 . '<br>
                y2=' . $m1_1 . '/' . $m1_2 . 'x' . ($x1 * $m2_1) + ($y1 * $m1_2) . '/' . -1 * $m1_2;
                } elseif ($y1 < 0)
                    echo '
                y2=(' . $m1_1 . '*(x+' . -1 * $x1 . '))/' . $m1_2 . ')' . $y1 . '<br>
                y2=(' . $m1_1 . 'x+' . -1 * $x1 * $m1_1 . ')/' . $m1_1 . ')' . $y1 . '<br>
                y2=' . $m1_1 . '/' . $m1_2 . 'x+' . -1 * $x1 * $m1_1 . '/' . $m1_2 . $y1 . '<br>
                y2=' . $m2_1 . '/' . $m1_2 . 'x-' . $x1 * $m2_1 * -1 . '/' . -1 * $m1_2 . '-' . $y1 * $m1_2 . '/' . -1 * $m1_2 . '<br>
                y2=' . $m1_1 . '/' . $m1_2 . 'x-' . ($x1 * $m1_1 * -1) + ($y1 * $m2_2) . '/' . -1 * $m1_2;
            }
        }
    } elseif ($m2_1 < 0 && $m2_2 < 0) {
        echo
        'y2=(' . $m1_1 . '*(x-(' . $x1 . '))/' . $m1_2 . ')+(' . $y1 . ')<br>
            y2=(' . $m1_1 . 'x-(' . $m2_1 * $x1 . '))/' . $m1_2 . ')+(' . $y1 . ')<br>
            y2=' . $m1_1 . '/' . $m1_2 . 'x+(' . -1 * $m1_1 * $x1 . '/' . $m1_2 . ')+(' . $y1 . ')';
    }


    ?>
</div>