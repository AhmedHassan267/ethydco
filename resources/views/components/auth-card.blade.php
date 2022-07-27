<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('img/img2.png');background-size:cover;z-index:-1">
    {{--  <img src="/img/ethy.png" alt="Ethydco" style="position: fixed;
                height: 100%;
                width: 100%;
                opacity: 0.4;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;">  --}}

        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg"style="background-color:white">
            {{ $slot }}
        </div>
    </div>

