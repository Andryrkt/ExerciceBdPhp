const form = document.querySelector("#addUserForm");

//ecouter la modification du nom
form.nom.addEventListener("change", function () {
  validNom(this);
});

//ecouter la modification du prenom
form.prenoms.addEventListener("change", function () {
  validPrenoms(this);
});

//ecouter la modification de l'email
form.email.addEventListener("change", function () {
  validEmail(this);
});
/*
//ecouter la modification de le password
form.password.addEventListener("change", function () {
  validPassword(this);
});
*/

//ecouter la soumission d'un formulaire
form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (
    validEmail(form.email) &&
    validNom(form.nom) &&
    validPrenoms(form.prenoms)
  ) {
    Swal.fire({
      position: "top-end",
      icon: "success",
      title: "Your work has been saved",
      showConfirmButton: false,
      timer: 1500,
    });
    form.submit();
  }
});

//**************Validation NOM*********** */
const validNom = function (inputNom) {
  /***AFFIchage Nom*/
  //On récupère le balise small
  const small = inputNom.nextElementSibling;

  // On teste le regExp
  if (/[a-zA-Z]{3,}/.test(inputNom.value)) {
    small.innerHTML = "Nom Valide";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    return true;
  } else {
    small.innerHTML =
      "3 caractères minimum et seulement des lettres minuscules ou majuscules";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    return false;
  }
};

//**************Validation PRENOMS*********** */
const validPrenoms = function (inputPrenoms) {
  /***AFFIchage Nom*/
  //On récupère le balise small
  const small = inputPrenoms.nextElementSibling;

  // On teste le regExp
  if (/[a-zA-Z]{3,}/.test(inputPrenoms.value)) {
    small.innerHTML = "Prénoms Valide";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    return true;
  } else {
    small.innerHTML =
      "3 caractères minimum et seulement des lettres minuscules ou majuscules";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    return false;
  }
};

//**************Validation EMAIL*********** */
const validEmail = function (inputEmail) {
  let emailRegExp = new RegExp(
    "^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$",
    "g"
  );

  /***AFFIchage email*/
  //On récupère le balise small
  const small = inputEmail.nextElementSibling;

  // On teste le regExp
  if (emailRegExp.test(inputEmail.value)) {
    small.innerHTML = "Adresse email valide";
    small.classList.remove("text-danger");
    small.classList.add("text-success");
    return true;
  } else {
    small.innerHTML = "Adresse email invalide";
    small.classList.remove("text-success");
    small.classList.add("text-danger");
    return false;
  }
};

//**************Validation Password*********** */
// const validPassword = function (inputPassword) {
//   let msg;
//   let valid = false;
//   //Au moin 3 caractères
//   if (inputPassword.value.length < 3) {
//     msg = "le mot de passe doit contenir au moin 3 caractères";
//   }
//   //Au poin 1 majuscule
//   else if (!/[A-Z]/.test(inputPassword.value)) {
//     msg = "le mot de passe doit contenir au moin 1 majuscule";
//   }
//   //Au moin 1 minuscule
//   else if (!/[a-z]/.test(inputPassword.value)) {
//     msg = "le mot de passe doit contenir au moin 1 misuscule";
//   } else if (!/[0-9]/.test(inputPassword.value)) {
//     msg = "le mot de passe doit contenir au moin 1 chifre";
//   }
//   //Mot de passe valide
//   else {
//     msg = "le mot de passe est valide";
//     valid = true;
//   }

//   /***AFFIchage mot de passe */
//   //On récupère le balise small
//   const small = inputPassword.nextElementSibling;

//   // On teste le regExp
//   if (valid) {
//     small.innerHTML = "mot de passe valide";
//     small.classList.remove("text-danger");
//     small.classList.add("text-success");
//     return true;
//   } else {
//     small.innerHTML = msg;
//     small.classList.remove("text-success");
//     small.classList.add("text-danger");
//     return false;
//   }
// };
