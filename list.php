<?php

function directorio_contactos() {
    return dirname(__FILE__) . '/var/contacts/';
}

function list_contacts() {
    $files = glob(directorio_contactos() . '*.jcf');
    $contacts = array();

    foreach ($files as $file) {
        $content = file_get_contents($file);
        $contact = json_decode($content);
        $contact->edit_link = '/addedit.php?id=' . basename($file);
        $contacts[] = $contact;
    }

    return $contacts;
}


?>

<ul>
    <?php foreach (list_contacts() as $data) { ?>
    <li>
        Name: <?php echo htmlentities($data->name); ?>, 
        phone: <?php echo htmlentities($data->phone); ?>, 
        <a href="<?php echo htmlentities($data->edit_link)?>">edit</a></li>
    <?php } ?>
</ul>