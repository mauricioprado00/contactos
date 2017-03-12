<?php

function directorio_contactos() {
    return dirname(__FILE__) . '/var/contacts/';
}

function saveConctact($name, $phone) {
    # aca podrias hacerlo con la base de datos, pero no se si ya la configuraste
    # si es asi entonces podrias traducir esto para la use

    $filename = directorio_contactos() . time() . '.jcf';
    $data = [
        'name' => $name,
        'phone' => $phone,
    ];
    file_put_contents($filename, json_encode($data));
}

if (count($_POST)) {
    saveConctact($_POST['name'], $_POST['phone']);
}

?>
<form method="POST">
    Nombre: <input type="text" name="name" value="<?php echo htmlentities($_POST['name']); ?>" /><br/>
    Telefono: <input type="text" name="phone" value="<?php echo htmlentities($_POST['phone']); ?>" /><br />
    <input type="submit" />
</form>