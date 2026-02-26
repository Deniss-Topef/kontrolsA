<div class="container"> 
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"> 
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
         <svg class="bi me-2" width="40" height="32" aria-hidden="true"><use xlink:href="/"></use></svg>
          <span class="fs-4">Kontrols-A</span> </a> <ul class="nav nav-pills"> 
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Sakums</a></li>
           <li class="nav-item"><a href="/kontakti" class="nav-link">Kontakti</a></li> 
           <!-- <li class="nav-item"><a href="/data" class="nav-link">Dati</a></li> -->
          @if (Auth::check())
           <li class="nav-item"><a href="/logout" class="nav-link">Izlogoties</a></li> 
          @else
           <li class="nav-item"><a href="/login" class="nav-link">Ielogoties</a></li> 
           @endif
          </ul> </header> </div>