    
<table>
    <tbody>
        <?php foreach ($balance_adjustments as $key => $value) { ?>
            <tr>
                <td style="text-align: left;"><?= date('H:i', strtotime($value->date)); ?></td>
                <td style="text-align: left;"><?= $value->description; ?></td>
                <td style="text-align: left;">
                <td style="text-align: left;">
                    <?php if ($value->indicator == "plus") {
                        echo "Ditambah (+)";
                    } else if ($value->indicator == "minus") {
                        echo "Dikurangi (-)";
                    } ?></td>
                </td>
                <td style="text-align: left;"><?= number_format($value->amount, 0, ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

