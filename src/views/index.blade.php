@extends('base')

@section('content')
<style>
input:focus, textarea:focus{
  outline: none;
}
  /*Loading Gif*/
.loader {
    margin: auto;
    border-top-color: #3498db;
    -webkit-animation: spinner 1s linear infinite;
    animation: spinner 1s linear infinite;
  }
  
  @-webkit-keyframes spinner {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }
  
  @keyframes spinner {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  



  
/*Snack bar style */
.paper-snackbar {
    transition-property: opacity, bottom, left, right, width, margin, border-radius;
    transition-duration: 0.5s;
    transition-timing-function: ease;
    font-size: 14px;
    min-height: 14px;
    background-color: #4caf50;
    border-radius: 4px;
    position: absolute;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    line-height: 22px;
    padding: 18px 24px;
    bottom: 0px;
    opacity: 0;
  
  }

  .error-snack{
    background-color: #ff5252 !important;
  }
  
  @media (min-width: 640px) {
    .paper-snackbar {
      /*
      Desktop:
        Single-line snackbar height: 48 dp tall
        Minimum width: 288 dp
        Maximum width: 568 dp
        2 dp rounded corner
        Text: Roboto Regular 14 sp
        Action button: Roboto Medium 14 sp, all-caps text
        Default background fill: #323232 100%
      */
  
      min-width: 288px;
      max-width: 568px;
      display: inline-flex;
      border-radius: 2px;
      margin: 24px;
      bottom: -100px;
      
    }
  }
  
  @media (max-width: 640px) {
    .paper-snackbar {
    /*
    Mobile:
      Single-line snackbar height: 48 dp
      Multi-line snackbar height: 80 dp
      Text: Roboto Regular 14 sp
      Action button: Roboto Medium 14 sp, all-caps text
      Default background fill: #323232 100%  
    */
      left: 0px;
      right: 0px;
    }
  }
  
  .paper-snackbar .action {
    background: inherit;
    display: inline-block;
    border: none;
    font-size: inherit;
    text-transform: uppercase;
    color: #FFFFFF;
    margin: 0px 0px 0px 24px;
    padding: 0px;
    min-width: min-content;
  }
</style>



<div class="container m-auto">
    <div class="text-center">
      <h1>Contacto</h1>
      <form action="/contact" method="post" class="needs-validation" novalidate>
        @csrf
        <div class=" px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/3 px-3 mb-3 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Nombre">
                Nombre
              </label>
              <input name="name" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border-gray-200 border-2 rounded py-3 px-4" id="Nombre" type="text" placeholder="Nombre" required>
              <p id="name-label-success" class="text-green-500"></p>
              <p id="name-label-error" class="text-red-500"></p>
            </div>
            <div class="md:w-1/3 px-3 mb-3">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Telefono">
                Teléfono
              </label>
              <input name="phone" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border-2 border-gray-200 rounded py-3 px-4" id="Telefono" type="phone" placeholder="Teléfono" required>
              <p id="phone-label-success" class="text-green-500"></p>
              <p id="phone-label-error" class="text-red-500"></p>
            </div>
            <div class="md:w-1/3 px-3 mb-3">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Email">
                Email
              </label>
              <input name="email" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border-2 border-gray-200 rounded py-3 px-4" id="Email" type="email" placeholder="Email" required>
              <p id="email-label-success" class="text-green-500"></p>
              <p id="email-label-error" class="text-red-500"></p>
            </div>
          </div>
          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Mensaje">
                Mensaje
              </label>
              <textarea name="message" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border-2 border-gray-200 rounded py-3 px-4 mb-3" rows="5" id="Mensaje" placeholder="Mensaje" required minlength="12"></textarea>
              <p id="message-label-success" class="text-green-500"></p>
              <p id="message-label-error" class="text-red-500"></p>
            </div>
          </div>
          <button id="submit" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-48 m-auto">
          <span id="send-text" class="">Enviar</span>
          <div id="loader" class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-6 w-6 hidden"></div>
          </button>
        </div>
      </form>
    </div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var createSnackbar = (function() {
  // Any snackbar that is already shown
  var previous = null;
  
  
    return function(message, actionText, action, error) {
      if (previous) {
        previous.dismiss();
      }
      var snackbar = document.createElement('div');
      snackbar.className = 'paper-snackbar';
      error ? snackbar.className += ' error-snack' : '';
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
      }.bind(snackbar), 50000);
      
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
                  createSnackbar('Tu mensaje se ha enviado con éxito!', null);
                  form.reset();
                  fields.forEach(element => {
                    cleanForm(element);
                  })
                  hideLoader()
                }).catch(err => {
                    console.log(err);
                    createSnackbar('No se ha podido enviar el mensaje!', null, null, true);
                    hideLoader()
                })
            }

          }, false);
        });
      }, false);
    })();
</script>
</div>
@endsection