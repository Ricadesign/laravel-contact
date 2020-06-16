@extends('layouts.app')

@section('content')
<style src="{{ voyager_asset('css/app.css') }}"></style>
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
              <input name="name" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border-gray-200 border rounded py-3 px-4" id="Nombre" type="text" placeholder="Nombre" required>
              <p id="name-label-success" class="text-green-500"></p>
              <p id="name-label-error" class="text-red-500"></p>
            </div>
            <div class="md:w-1/3 px-3 mb-3">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Telefono">
                Teléfono
              </label>
              <input name="phone" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border border-gray-200 rounded py-3 px-4" id="Telefono" type="phone" placeholder="Teléfono" required>
              <p id="phone-label-success" class="text-green-500"></p>
              <p id="phone-label-error" class="text-red-500"></p>
            </div>
            <div class="md:w-1/3 px-3 mb-3">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Email">
                Email
              </label>
              <input name="email" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border border-gray-200 rounded py-3 px-4" id="Email" type="email" placeholder="Email" required>
              <p id="email-label-success" class="text-green-500"></p>
              <p id="email-label-error" class="text-red-500"></p>
            </div>
          </div>
          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
              <label class="block uppercase tracking-wide text-grey-900 text-xs font-bold mb-2" for="Mensaje">
                Mensaje
              </label>
              <textarea name="message" class="rounded-lg appearance-none block w-full bg-gray-200 focus:border-gray-900 text-grey-900 border border-gray-200 rounded py-3 px-4 mb-3" rows="5" id="Mensaje" placeholder="Mensaje" required minlength="12"></textarea>
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
<script type="text/javascript" src="{{ contact_asset('js/app.js') }}"></script>
</div>
@endsection