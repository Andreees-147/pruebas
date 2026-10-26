<?= $this->include('layouts/header') ?>

<div class="panel">
    <h1>Crear vehículo</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('vehiculos/store') ?>" method="post">
        <?= csrf_field() ?>

        <label for="placa">Placa</label>
        <input type="text" id="placa" name="placa" value="<?= esc(old('placa')) ?>" maxlength="8" pattern="[A-Za-z]{3}-[0-9]{4}" placeholder="ABC-1234" title="Formato: 3 letras, guion y 4 números (ABC-1234)" required>

        <label for="marca">Marca</label>
        <input type="text" id="marca" name="marca" value="<?= esc(old('marca')) ?>" maxlength="50" required>

        <label for="modelo">Modelo</label>
        <input type="text" id="modelo" name="modelo" value="<?= esc(old('modelo')) ?>" maxlength="50" required>

        <div class="acciones">
            <button type="submit" class="btn">Guardar</button>
            <a class="btn btn-gris" href="<?= base_url('vehiculos') ?>">Cancelar</a>
        </div>
    </form>
</div>
<div class="overlay" id="cargando" hidden>
    <div class="caja">
        <div class="spinner"></div>
        <h2>Guardando...</h2>
        <p>Espera un momento</p>
    </div>
</div>

<script>
    // Mensajes en español para los campos obligatorios
    var mensajes = {
        placa:  'Por favor, escribe la placa.',
        marca:  'Por favor, escribe la marca.',
        modelo: 'Por favor, escribe el modelo.'
    };
    document.querySelectorAll('input[required]').forEach(function (campo) {
        campo.addEventListener('invalid', function () {
            if (campo.validity.patternMismatch) {
                campo.setCustomValidity('La placa debe tener el formato ABC-1234.');
            } else {
                campo.setCustomValidity(mensajes[campo.name] || 'Por favor, llena este campo.');
            }
        });
        campo.addEventListener('input', function () { campo.setCustomValidity(''); });
    });

    // Placa: 3 letras + guion automático + 4 números (ABC-1234)
    document.getElementById('placa').addEventListener('input', function () {
        var limpio = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        var letras = '', numeros = '';
        for (var i = 0; i < limpio.length; i++) {
            var c = limpio[i];
            if (letras.length < 3 && /[A-Z]/.test(c)) {
                letras += c;
            } else if (letras.length === 3 && numeros.length < 4 && /[0-9]/.test(c)) {
                numeros += c;
            }
        }
        this.value = numeros ? letras + '-' + numeros : letras;
    });

    document.querySelector('form').addEventListener('submit', function (e) {
        if (this.dataset.enviando) return;
        e.preventDefault();
        this.dataset.enviando = '1';
        document.getElementById('cargando').hidden = false;
        setTimeout(() => this.submit(), 600);
    });
</script>
</main>
</body>
</html>

<style>
    .panel { max-width: 480px; background: #fff; border-radius: 10px; padding: 24px; box-shadow: 0 1px 4px rgba(0,0,0,.1); }
    label { display: block; margin: 14px 0 6px; font-weight: bold; }
    input[type=text] { width: 100%; padding: 9px; border: 1px solid #d1d5db; border-radius: 7px; font-size: 14px; }
    .btn { display: inline-block; padding: 9px 14px; border: 0; border-radius: 7px; color: #fff; background: #172554; text-decoration: none; cursor: pointer; font-size: 14px; }
    .btn-gris { background: #6b7280; }
    .acciones { display: flex; gap: 10px; margin-top: 20px; }
    .alert { padding: 10px 14px; margin-bottom: 16px; border-radius: 7px; color: #991b1b; background: #fee2e2; }
    .alert ul { margin: 0; padding-left: 18px; }
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