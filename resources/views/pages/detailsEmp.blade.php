@extends('layouts.navbar')


@section('content')

    
    
    
    
    <div class="card text-center" style="width: 77%">
      <div class="card-header nombre-elements" style="text-align: center;">
        
        <a href="/compte" style="text-decoration: none;color: #002222!important;"><strong>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
            <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
          </svg>
           {{ $entreprise->nom }} / </strong></a>
          @if(isset($section))
          <a href="/sections/{{ $section->id }}" style="text-decoration: none;"> <strong> {{$section->nom}} </strong></a>
          @else 
          
          @endif
          @isset($folder)
          <a href="/sections/{{ $section->id }}/{{$dossier_id}}" style="text-decoration: none;"> <strong>/ {{$folder->nom}} </strong></a>
          @endisset
                
      </div>
      <div class="card-body search-list">
        
       <!-- -------------  Partie Dynamique ------------------>
      
    
        
        <div class="card-body">
          <div align="center">
          <div>
            
            <div class="card-body">
             
                <img class="card-img-top" src="{{asset($employee->logo_path)}}"  alt="user image"  style="border-radius: 50%;width:150px;" >
                <div style="font-size: 25px">{{$employee->nom}}</div>
               
               <div style="font-size: 15px;color:rgb(56, 56, 10);"> 
                @if($employee->est_admin==1)
                Administrateur
                @else
                Employé
                @endif
               </div>
             
                <br>
                 
                <a  href="/documents/{{ $employee->id }}" style="text-decoration: none;font-size:18px;text-align: left;"> La liste des Documents 
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list-columns" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 0 .5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 2h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 4h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 6h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 8h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
                  </svg></a>
            
            </div>
          </div>
          
          
                  
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">Email : </label>
                <input style="border:0.5px outset " type="text" class="form-control" id="email" value="{{$employee->email}}">
              </div>
              <div class="form-group col-md-6">
                <label for="telephone">téléphone :</label>
                <input style="border:0.5px outset " type="text" class="form-control" id="telephone" value="{{$employee->telephone}}">
              </div>
              
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Rôle : </label>
                <input style="border:0.5px outset" type="text" class="form-control" id="inputCity" value="@if($employee->est_admin==1) Administrateur @else Employé @endif">
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Denier accès :</label>
                <input style="border:0.5px outset" type="text" class="form-control" id="inputCity" value="{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->logout_at)->toDayDateTimeString();}}">
              </div>
              
            </div>
          
      </div>
    
       <!--------------------Fin Partie Dynamique ------------>
      </div>
    
     
    </div>


 
 



    </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    
    </html>


@endSection