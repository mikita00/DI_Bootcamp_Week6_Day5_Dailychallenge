<?php

// Recuperer les mot dans le fichier
$wordsFile = file_get_contents("mots.txt");
$words = explode("\n", $wordsFile);

// Selectionner un mot aleatoirement
$word = rtrim($words[array_rand($words)]);

// Initialisation de mauvaise reponse
$incorrectGuesses = 0;

// initialiser mon mot choisi par "-"
$hiddenWord = str_repeat("-", strlen($word));

// lancement du jeu
while ($hiddenWord != $word && $incorrectGuesses < 7) {
    echo "Mot actuel: $hiddenWord\n";
    echo "Entrez une lettre: ";

    // recuperer la saisie du joueur
    $letter = trim(fgets(STDIN));
    if (strpos($word, $letter) === false) {
        // Si la reponse est incorrecte
        $incorrectGuesses++;
        echo "Incorrect.\n";
    } else {
        // Si la reponse est correcte
        for ($i = 0; $i < strlen($word); $i++) {
            if ($word[$i] == $letter) {
                $hiddenWord[$i] = $letter;
            }
        }
        echo "Correct!\n";
    }
}

// Verifier si le mot est trouvé
if ($hiddenWord == $word) {
    echo "Felicitations man, tu as trouvé le mot était  $word.\n";
} else {
    echo "Désolé man, tu as perdu le mot était  $word.\n";
}

?>
