
<h3><i class="fa fa-angle-right"></i> Все заказы</h3>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> </h4>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Код</th>
                            <th>Название</th>
                            <th class="numeric">Цена</th>
                            <th class="numeric">Количество</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Адресс</th>
                            <th>mail</th>
                            <th class="numeric">Дата</th>
                            <th class="numeric">Время</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (ViewGetTools::AllOrders() as $value) { ?>

                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['product'] ?></td>
                                <td class="numeric"><?= $value['price'] ?></td>
                                <td class="numeric"><?= $value['qty'] ?></td>
                                <td ><?= $value['name'] ?></td>
                                <td ><?= $value['second_name'] ?></td>
                                <td ><?= $value['adress'] ?></td>
                                <td ><?= $value['email'] ?></td>
                                <td class="numeric"><?= $value['date'] ?></td>
                                <td class="numeric"><?= $value['time'] ?></td>
                        </tr>
                        <?
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div><!-- /content-panel -->
    </div><!-- /col-lg-4 -->			
</div><!-- /row -->
