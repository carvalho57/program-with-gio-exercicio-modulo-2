<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Check #</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($transactions as $transaction): ?>            
            <tr>
                <td><?= $transaction['date'] ?></td>
                <td><?= $transaction['checked']?></td>
                <td><?= $transaction['description']?></td>
                <td><?= $transaction['amount']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Income:</th>
            <td>$ <?= $totalIncome ?></td>
        </tr>
        <tr>
            <th colspan="3">Total Expense:</th>
            <td>$<?= $totalExpense?></td>
        </tr>
        <tr>
            <th colspan="3">Net Total:</th>
            <td>$ <?= $netTotal  ?></td>
        </tr>
    </tfoot>
</table>
 
