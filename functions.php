<?php

/** Cette fonction verifie si une recette est valide ou pas
 * @param array $recipe Recette à verifier
 * @return boolean
 */
/* function isValidRecipe (array $recipe) : bool {
    return isset($recipe['is_enabled']) && $recipe['is_enabled'];
} */

/** Cette fonction formate et affiche une recette en HTML
 * @param array $recipe Recette à afficher
 * @return void
 */
function display_recipe(array $recipe) : void {
    $recipe_content = '';

    // if (isValidRecipe($recipe)) {
        // $recipe_content = '<article>';
        $recipe_content .= '<h3>' . $recipe['title'] . '</h3>';
        $recipe_content .= '<div>' . $recipe['recipe'] . '</div>';
        // $recipe_content .= '<i>' .  . '</i>';
        // $recipe_content .= '</article>';
    // }
    
    echo $recipe_content;
}

/** Cette fonction affiche le nom et l'âge de l'auteur d'une recette
 * @param string $authorEmail L'e-mail d'un eventuel auteur
 * @param array $users Tableau des utilisateurs (ou auteurs)
 * @return void
 */
function displayAuthor(string $authorEmail, array $users) : void {
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            echo '<strong>'.$author['full_name'] . ' (' . $author['age'] . ' ans) </strong>';
        }
    }
}

/** Cette fonction permet de recuperer les recettes valides dans un tableau
 * @param array $recipes tableau representant une recette
 * @return array Tableau des recettes valides
 */
/* function getRecipes(array $recipes) : array {
    $valid_recipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $valid_recipes[] = $recipe;
        }
    }

    return $valid_recipes;
} */
