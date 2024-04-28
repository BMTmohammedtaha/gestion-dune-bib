<?php

$db = new Database();
$auteurs = $db->fetchAll('SELECT * FROM auteurs');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auteur_id = $_POST['auteur'];

    $sql = "SELECT livres.* FROM livres JOIN affectation ON livres.code_livre = affectation.code_livre WHERE affectation.id_auteur = ?";
    $livres = $db->fetchAll($sql, [$auteur_id]);
}
?>


<h2>Recherche de livres par auteur</h2>
<form method="post" action="<?php echo $path; ?>">
    <label for="auteur">Sélectionnez un auteur:</label>
    <select name="auteur">
        <?php foreach ($auteurs as $auteur) : ?>
            <option value="<?php echo $auteur['id_auteur']; ?>"><?php echo $auteur['nom'] . ' ' . $auteur['prenom']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" class="button_x"  value="Rechercher">
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
    <h3>Résultats de la recherche :</h3>
    <ul class="list_livres">
        <?php foreach ($livres as $livre) : ?>
            <li><?php echo $livre['titre']; ?> (Année d'édition: <?php echo $livre['annee_edition']; ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>