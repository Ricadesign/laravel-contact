var createSnackbar = (function() {
  // Any snackbar that is already shown
  var previous = null;
  
  
  return function(message, actionText, action) {
    if (previous) {
      previous.dismiss();
    }
    var snackbar = document.createElement('div');
    snackbar.className = 'paper-snackbar';
    snackbar.dismiss = function() {
      this.style.opacity = 0;
    };
    var text = document.createTextNode(message);
    snackbar.appendChild(text);
    if (actionText) {
      if (!action) {
        action = snackbar.dismiss.bind(snackbar);
      }
      var actionButton = document.createElement('button');
      actionButton.className = 'action';
      actionButton.innerHTML = actionText;
      actionButton.addEventListener('click', action);
      snackbar.appendChild(actionButton);
    }
    setTimeout(function() {
      if (previous === this) {
        previous.dismiss();
      }
    }.bind(snackbar), 5000);
    
    snackbar.addEventListener('transitionend', function(event, elapsed) {
      if (event.propertyName === 'opacity' && this.style.opacity == 0) {
        this.parentElement.removeChild(this);
        if (previous === this) {
          previous = null;
        }
      }
    }.bind(snackbar));

    
    
    previous = snackbar;
    document.body.appendChild(snackbar);
    // In order for the animations to trigger, I have to force the original style to be computed, and then change it.
    getComputedStyle(snackbar).bottom;
    snackbar.style.bottom = '0px';
    snackbar.style.opacity = 1;
  };
})();


    // Example starter JavaScript for disabling form submissions if there are invalid fields

    const errorColor = ['border-red-500', 'focus:border-red-600'];
    const successColor = ['border-green-500', 'focus:border-green-600'];

    function cleanForm(element){
      element.classList.remove(...errorColor)
      element.classList.remove(...successColor)
      document.getElementById(element.name + '-label-error').innerHTML = ''
      document.getElementById(element.name + '-label-success').innerHTML = ''
    }

    function invalidField(element) {
      element.classList.add(...errorColor)
      element.classList.remove(...successColor)
      document.getElementById(element.name + '-label-error').innerHTML = 'Rellena el campo ' + element.id
      document.getElementById(element.name + '-label-success').innerHTML = ''
    }

    function validMessage(element) {
      element.classList.add(...successColor)
      element.classList.remove(...errorColor)
      document.getElementById(element.name + '-label-success').innerHTML = 'Campo valido'
      document.getElementById(element.name + '-label-error').innerHTML = ''
    }

    function invalidEmail(element) {
      element.classList.add(...errorColor)
      element.classList.remove(...successColor)
      document.getElementById(element.name + '-label-error').innerHTML = 'Email debe ser valido'
      document.getElementById(element.name + '-label-success').innerHTML = ''
    }

    function invalidPhone(element) {
      element.classList.add(...errorColor)
      element.classList.remove(...successColor)
      document.getElementById(element.name + '-label-error').innerHTML = 'Teléfono debe ser valido'
      document.getElementById(element.name + '-label-success').innerHTML = ''
    }

    function invalidMessage(element) {
      element.classList.add(...errorColor)
      element.classList.remove(...successColor)
      document.getElementById(element.name + '-label-error').innerHTML = 'El mensaje debe tener almenos 12 caracteres'
      document.getElementById(element.name + '-label-success').innerHTML = ''
    }

    function validField(element) {
      switch (element.name) {
        case 'email':
          ValidateEmail(element.value) ? validMessage(element) : invalidEmail(element);
          break;
        case 'phone':
          validatePhone(element.value) ? validMessage(element) : invalidPhone(element);
          break;
        case 'message':
          element.value.length > 12 ? validMessage(element) : invalidMessage(element);
          break;
        case 'name':
          validMessage(element);
          break;
      }

    }

    function ValidateEmail(mail) {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,20})+$/.test(mail)) {
        return (true)
      }
      return (false)
    }

    function validatePhone(phone) {
      if (/^\d{9}$/.test(phone)) {
        return true;
      } else {
        return false;
      }
    }

    //Loading Gif
    const loader = document.getElementById('loader');
    //Send Text
    const sendText = document.getElementById('send-text');

    function showLoader(){
      loader.classList.remove('hidden');
      sendText.classList.add('hidden');
    }
    function hideLoader(){
      loader.classList.add('hidden');
      sendText.classList.remove('hidden');
    }

    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            event.preventDefault();
            event.stopPropagation();
            const fields = [].slice.call(document.querySelectorAll('input, textarea'), 1);
            fields.forEach(element => {
              element.addEventListener('input', function(e) {
                e.srcElement.value == '' ? invalidField(element) : validField(element);
              })

              element.value == '' ? invalidField(element) : validField(element);
            });
            
            if (form.checkValidity() === false) {
              return 
            }else{
              showLoader();
              const data = fields.reduce((acc, cur) => ({ ...acc, [cur.name]: cur.value }), {})
              
              axios.post(form.action, data)
                .then(res => {
                  console.log(res);
                  createSnackbar('Tu mensaje se ha enviado con éxito!', 'Close');
                  form.reset();
                  fields.forEach(element => {
                    cleanForm(element);
                  })
                  hideLoader()
                }).catch(err => {
                    console.log(err);
                })
            }

          }, false);
        });
      }, false);
    })();