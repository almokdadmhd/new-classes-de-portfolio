<?php
class ViewTemplate
{
    public static function alert($message, $type, $lien = null)
    {
?>
        <div class="container my-4">
            <div class="alert alert-<?php echo $type; ?> text-center" role="alert">
                <?php echo $message;
                if ($lien) {
                ?>
                    <br />Cliquez <a href="<?php echo $lien ?>"> ici</a> pour continuer la navigation.
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }

    public static function menu()
    {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-info mb-4">
            <a class="navbar-brand" href="test.php">Portfolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="CreationUserTest.php">CreationUserTest <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="CreationUser.php">Creation user <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListeUsers.php">Liste users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CreationTypeSoc.php">Creation Type social </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListeTypeSoc.php">Liste types sociaux </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CreationSocial.php">Ajout de RS </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CreationTypeRef.php">Creation Type ref</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListeTypeRef.php">Liste type ref </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="CreationReference.php">Creation Referenece</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ListeReferences.php">Liste Refereneces </a>
                    </li>

                </ul>
            </div>
        </nav>
    <?php
    }

    public static function footer()
    {
    ?>
        <footer class="bg-info text-center mt-4 py-2">
            Portfolio Team © <?php echo date("Y"); ?>
        </footer>

<?php
    }
}
