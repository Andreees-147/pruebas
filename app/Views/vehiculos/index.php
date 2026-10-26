<?= $this->include('layouts/header') ?>

<div class="panel">
    <div class="panel-top">
        <h1>Vehículos</h1>
        <a class="btn" href="<?= base_url('vehiculos/create') ?>">+ Nuevo vehículo</a>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-error"><?= esc(implode(' ', session()->getFlashdata('errors'))) ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (! empty($vehiculos)): ?>
            <?php foreach ($vehiculos as $i => $v): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($v['placa']) ?></td>
                    <td><?= esc($v['marca']) ?></td>
                    <td><?= esc($v['modelo']) ?></td>
                    <td>
                      <div class="fila-acciones">
                        <a class="btn btn-editar" href="<?= base_url('vehiculos/edit/' . $v['id_vehiculo']) ?>">Editar</a>
                        <form action="<?= base_url('vehiculos/delete/' . $v['id_vehiculo']) ?>" method="post"
                              onsubmit="return confirm('¿Eliminar el vehículo <?= esc($v['placa'], 'js') ?>?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                      </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" class="vacio">No hay vehículos registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <div class="pie">
        <a class="btn btn-gris" href="<?= base_url('/') ?>">← Volver al menú principal</a>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
<div class="overlay" id="aviso">
    <div class="caja">
        <div class="check">✓</div>
        <h2>¡Éxito!</h2>
        <p><?= esc(session()->getFlashdata('success')) ?></p>
        <button type="button" class="btn" onclick="cerrarAviso()">Aceptar</button>
    </div>
</div>
<script>
    function cerrarAviso() { document.getElementById('aviso').hidden = true; }
    setTimeout(cerrarAviso, 2500);
</script>
<?php endif; ?>
</main>
</body>
</html>

<style>
    .panel { background: #fff; border-radius: 10px; padding: 24px; box-shadow: 0 1px 4px rgba(0,0,0,.1); }
    .panel-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
    .panel-top h1 { margin: 0; }
    .btn { display: inline-block; padding: 9px 14px; border: 0; border-radius: 7px; color: #fff; background: #172554; text-decoration: none; cursor: pointer; font-size: 14px; }
    .btn-editar { background: #1d4ed8; }
    .fila-acciones { display: flex; gap: 8px; align-items: center; }
    .btn-danger { background: #b91c1c; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
    th { background: #f9fafb; }
    .alert { padding: 10px 14px; margin-bottom: 16px; border-radius: 7px; }
    .alert-error { color: #991b1b; background: #fee2e2; }
    .alert-ok { color: #166534; background: #dcfce7; }
    .pie { margin-top: 20px; }
    .btn-gris { background: #6b7280; }
    .vacio { padding: 20px; text-align: center; color: #6b7280; }
    .overlay { position: fixed; inset: 0; z-index: 1000; display: flex; align-items: center; justify-content: center; background: rgba(15,23,42,.55); }
    .overlay[hidden] { display: none; }
    .caja { min-width: 270px; padding: 28px 36px; text-align: center; background: #fff; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,.25); animation: aparece .25s ease-out; }
    .caja h2 { margin: 0 0 6px; }
    .caja p { margin: 0 0 16px; color: #374151; }
    .spinner { width: 44px; height: 44px; margin: 0 auto 14px; border: 5px solid #e5e7eb; border-top-color: #172554; border-radius: 50%; animation: giro .8s linear infinite; }
    .check { width: 56px; height: 56px; margin: 0 auto 12px; line-height: 56px; font-size: 32px; color: #fff; background: #16a34a; border-radius: 50%; }
    @keyframes giro { to { transform: rotate(360deg); } }
    @keyframes aparece { from { opacity: 0; transform: scale(.9); } to { opacity: 1; transform: scale(1); } }
</style>