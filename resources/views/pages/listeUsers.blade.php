@extends('layouts.navbar')



@section('content')

  
<div class="card text-center" style="width: 77%">
  <div class="card-header nombre-elements"  style="text-align: center;">

    @if(Auth::user()->est_admin==1)
    <button type="button" class="btn btn-outline-dark" data-toggle="modal" title="Ajouter un nouveau employé" data-target="#ajouterEmp" style="width: 150px;" >
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30 " fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
      </svg>  
     </button>
    @else
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
      <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
    </svg>
     {{ $entreprise->nom }}
    @endif


   <!------------------------------------   Ajouter un employé ------------------------------------>

   <div class="modal fade" id="ajouterEmp" tabindex="-1" role="dialog" aria-labelledby="ajouterEmpTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> <strong>Ajouter un Employé</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div align="center">
          <div  style="width: 18rem;">
            <img class="card-img-top" src="/images/user.png"  alt="user image" id="user-img">
            <div class="card-body">
             
             
              
            </div>
          </div>
          </div>
        <form method="POST" action="{{ route('ajouterEmp') }}">
          @csrf
          <div class="input-group mb-3" style="padding-left:12px;padding-right:12px">
              
            <input type="text"  name="nom" class="form-control"  aria-label="Entreprise_name" aria-describedby="basic-addon1" placeholder="nom complet" required>
            
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="color: red">*</span>
            </div>
          </div>
    <!--  input : numéro de téléphone  -->
          <div class="input-group mb-3" style="padding-left:12px;padding-right:12px">
            
            <input type="text"  name="telephone" class="form-control"  aria-label="Entreprise_name" aria-describedby="basic-addon1" placeholder="Numéro de téléphone" required>
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="color: red">*</span>
            </div>
          </div>
    
    <!-- input : email -->
          <div class="input-group mb-3" style="padding-left:12px;padding-right:12px">
            
            <input type="text"  name="email" class="form-control"  aria-label="Entreprise_name" aria-describedby="basic-addon1" placeholder="Email" required>
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="color: red">*</span>
            </div>
          </div>
    
   <!--  cin -->        
          <div class="input-group mb-3" style="padding-left:12px;padding-right:12px">
            
            <input type="text"  name="cin" class="form-control"  aria-label="CIN" aria-describedby="basic-addon1" placeholder="carte d'identité nationale" required>
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1" style="color: red">*</span>
            </div>
          </div>
  
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">annuler</button>
          <button type="submit" class="btn btn-success">ajouter</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!----------------------------------------------------------------------------------------->





  <!----------------------------------Message de confirmation --------------------------------->

    
@isset($email)
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:green">succès</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        l'employé a été ajouté avec succès, 
                                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>  
@endisset





  <!-----------------------------------end Message de confirmation------------------------------->
  </div>
  <div class="card-body search-list ">
        
       @php
        $i=0;
       @endphp
        
       <div>
       @foreach ($users as $user)
       @if($i==0)
       <div class="card-deck" >
       @endif
       @php
       $i++;
       @endphp
       
       <div class="card userCard w3-animate-zoom" style="margin: 15px;max-width: 170px;">
        <a href="{{ route('details',['id'=>$user->id]) }}" class="employee-role" style="text-decoration: none">
          <img class="card-img-top" src="{{asset($user->logo_path)}}" id="img-user" style="width: 165px;">
          @if($user->id==Auth::user()->id) 
            <strong style="color:green"> Vous </strong>
           @else
          <strong> {{$user->nom}}  </strong>
           @endif
         
        </a>
        <div class="card-body">
         
          <p class="card-text">
            
            <div >
              <a  href="/documents/{{ $user->id }}" style="text-decoration: none"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-doc" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-7.839 9.166v.522c0 .256-.039.47-.117.641a.861.861 0 0 1-.322.387.877.877 0 0 1-.469.126.883.883 0 0 1-.471-.126.868.868 0 0 1-.32-.386 1.55 1.55 0 0 1-.117-.642v-.522c0-.257.04-.471.117-.641a.868.868 0 0 1 .32-.387.868.868 0 0 1 .471-.129c.176 0 .332.043.469.13a.861.861 0 0 1 .322.386c.078.17.117.384.117.641Zm.803.519v-.513c0-.377-.068-.7-.205-.972a1.46 1.46 0 0 0-.589-.63c-.254-.147-.56-.22-.917-.22-.355 0-.662.073-.92.22a1.441 1.441 0 0 0-.589.627c-.136.271-.205.596-.205.975v.513c0 .375.069.7.205.973.137.271.333.48.59.627.257.144.564.216.92.216.357 0 .662-.072.916-.216.256-.147.452-.356.59-.627.136-.274.204-.598.204-.973ZM0 11.926v4h1.459c.402 0 .735-.08.999-.238a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.59-.68c-.263-.156-.598-.234-1.004-.234H0Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.141 1.141 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082H.79V12.57Zm7.422.483a1.732 1.732 0 0 0-.103.633v.495c0 .246.034.455.103.627a.834.834 0 0 0 .298.393.845.845 0 0 0 .478.131.868.868 0 0 0 .401-.088.699.699 0 0 0 .273-.248.8.8 0 0 0 .117-.364h.765v.076a1.268 1.268 0 0 1-.226.674c-.137.194-.32.345-.55.454a1.81 1.81 0 0 1-.786.164c-.36 0-.664-.072-.914-.216a1.424 1.424 0 0 1-.571-.627c-.13-.272-.194-.597-.194-.976v-.498c0-.379.066-.705.197-.978.13-.274.321-.485.571-.633.252-.149.556-.223.911-.223.219 0 .421.032.607.097.187.062.35.153.489.272a1.326 1.326 0 0 1 .466.964v.073H9.78a.85.85 0 0 0-.12-.38.7.7 0 0 0-.273-.261.802.802 0 0 0-.398-.097.814.814 0 0 0-.475.138.868.868 0 0 0-.301.398Z"/>
                </svg>
              </a>
            </div>

          </p> 
           
          
           
          @if(Auth::user()->est_admin==1)
          @if($user->id!=Auth::user()->id)          
          <button type="button" class="btn btn-danger" style="color:white;width:90%"  data-toggle="modal" data-target="#deleteEmp{{$user->id}}" > <!----->
                
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
            </svg>
          </button>
    
           
          
              <!-- Modal -->
              <div class="modal fade" id="deleteEmp{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteEmpTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteEmpTitle"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     
                     voulez-vous vraiment  Supprimer <strong style="color:red"> {{$user->nom}} </strong>de facon permanente ?
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                      
                     <button  class="btn btn-primary"  onclick="window.location.href='/DeleteUser/{{$user->id}}'">OUI</button> 
                       </div>
                  </div>
                </div>
              </div>
               
          
             
            
              @endif

              @endif
   

                

        <!------------parameters <Admin>  -->
        

        </div>
      </div>
      @if($i==5)
      </div>
      @php
      $i=0;
      @endphp
      @endif
       
      @endforeach

      @if($i<5)
    </div>
      @endif
             
       </div> 
         
             
            
           
            
            
            
           

     

       {{ $users->links('pagination::bootstrap-4') }}
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