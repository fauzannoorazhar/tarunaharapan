<div class="box box-primary">
    <div class="box-header with-border">
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-condensed">
            <tr>
                <th>No</th>
                <th>Artikel</th>
                <th>Ip User</th>
                <th>Rating</th>
            </tr>
                <?php
                $i=1;
                foreach ($model->rating as $data) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data->artikel->judul; ?></td>
                <td><?= $data->ip_user; ?></td>
                <td><?= StarRating::widget([
                        'name' => 'rating_35',
                        'value' => $data->rating,
                        'pluginOptions' => [
                            'displayOnly' => true,
                            'size' => 'xs'
                        ],
                    ]); ?>
                </td>
            </tr>
            <?php $i++; } ?>

                <tr>
                    <th></th>
                    <th>Rating Rata - Rata</th>
                    <th></th>
                    <th>
                        <?php /*echo $model->getRata();*/ ?>
                    </th>
                </tr>
        </table>
    </div>
</div>