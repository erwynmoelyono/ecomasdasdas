<?php 


?>
<h1>Master Bareng</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telpon</th>
    </tr>
    <?php foreach($data as $d) : ?>
        <tr>
            <td><?= $d->id?></td>
            <td><?= $d->nama?></td>
            <td><?= $d->alamat?></td>
            <td><?= $d->telpon?></td>
        </tr>
    <?php endforeach; ?>
</table>