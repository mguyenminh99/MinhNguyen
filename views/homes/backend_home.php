<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/10/2020
 * Time: 5:02 AM
 */?>
    <div>Đơn hàng: <?php echo $count_orders['number']?></div>
    <div>Doanh thu hôm nay: <?php echo empty($day_income['dayIncome']) ? '0 vnđ' : number_format($day_income['dayIncome']) . ' '. 'vnđ' ?></div>
    <h2>Theo tháng</h2>
    <table cellpadding="10" cellspacing="10">
        <tr>
            <th>
                Tháng
            </th>
            <th>
                Doanh thu
            </th>
        </tr>
        <?php foreach ($month_income as $money):?>
        <tr>
            <td><?php echo $money['month']?></td>
            <td><?php echo number_format($money['income'])?> vnđ</td>
        </tr>
        <?php endforeach;?>
    </table>


