<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    // enable extra drivers just by including them
    //~ include "./plugins/drivers/simpledb.php";

    $plugins = array(
        // specify enabled plugins here
        // new AdminerDumpXml(),
        // new AdminerTinymce(),
        // new AdminerFileUpload("data/"),
        // new AdminerSlugify(),
        // new AdminerTranslation(),
        // new AdminerForeignSystem(),
        new FCSqliteConnectionWithoutCredentials(),
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer-fr.php";