// creation des variables à partir d'id
var retour = document.getElementById('retour');
var nom = document.getElementById('nom');
var email = document.getElementById('email');
var texte = document.getElementById('commentaire');
var valider = document.getElementById('valider');


// validation de l'email via une expression régulière entre 2 slash et \S etant tout caractère sauf espace
function formatEmail(mail) {
  return /\S+@\S+\.\S+/.test(mail);
};


// fonction pour valider les données
function validation() {
  // création de la variable message
  var message = '';

  // conditions
  if(nom.value.length < 2) {
    message = message + "Please complete your name<br />";
  }

  if(formatEmail(email.value) == false) {
    message = message + "Please complete your email adress <br />";
  }

  if(texte.value.length == 0) {
    message = message + "Message is empty<br />";
  }

  // si aucun message d'erreur n'est dans la variable message
  if(message.length == 0) {
    message = message + "Your message was send with success !";
      
    retour.style.color = '#128300';

  } 

  else {
    // si un message d'erreur est dans la variable message
    retour.style.color = '#C21800';
  }

  // le message est inseré dans le html
  retour.innerHTML = message;
}


// Méthode qui écoute une evenement sur le bouton valider et déclenche la fonction validation
valider.addEventListener('click', validation);


const validationInput = document.querySelector('#email');

validationInput.addEventListener('input', (e) => {

  if(e.target.value.length >= 3) {
      validationInput.style.borderColor = "green";
  } else {
      validationInput.style.borderColor = "red";
  }

})
