(function() {
  'use strict';

  $(document).ready(function() {


    function Errore(string, e) {
      window.alert(string);
      e.preventDefault(e);
    }

    //Controllo numeri inseriti
    $("#RegistrazioneForm").submit(function(e){
      $('#RegistrazioneForm input').each(function() {
        if ( !$(this).val() ) {
          Errore("Riempi tutti i campi!", e);
          return false;
        }
      });
    });

    //Inserimento valori nei campi da scegliere
    //per l'inserimento dello data di nascita
    function popola(selector, i) {
      $(selector).append('<option value=' + i + '>' + i + '</option>');
    }

    for (var i = 1; i <= 31; i++)
      popola('#RegistrazioneForm #giorno', i);

    for (var i = 1; i <= 12; i++)
      popola('#RegistrazioneForm #mese', i);

    var d = new Date();
    var n = d.getFullYear();
    for (var i = n; i >= 1950; i--)
      popola('#RegistrazioneForm #anno', i);

  });
})();
