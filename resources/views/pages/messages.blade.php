@extends('layouts.navbar')
@section('content')

@if($nbMsNonLus>0)
    <script>
      jQuery(function(){
      jQuery('#clickAuto').click();
      });
    </script>
@endif

<div class="card text-center" style="width: 77%">
    <div class="card-header nombre-elements"  style="text-align: center;">
      <a href="/compte" style="text-decoration: none;color: #002222!important;"><strong>
       
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
          <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
        </svg>
        
        {{ $entreprise->nom }} / </strong></a>
        @if(isset($section))
        <a href="/sections/{{ $section->id }}" style="text-decoration: none;color:chocolate"> <strong> {{$section->nom}} </strong></a>
        @else 
        
        @endif
        @isset($folder)
        <a href="/sections/{{ $section->id }}/{{$dossier_id}}" style="text-decoration: none;color:chocolate"> <strong>/ {{$folder->nom}} </strong></a>
        @endisset

       
    </div>
    <div class="card-body">
      
     <!-- -------------  Partie Dynamique ------------------>
       
    
      
      <div class="card-body search-list">
        <h6 class="card-title" style="background-color: #f7f4f4;color:rgb(0, 0, 0);padding:13px"> 
        Boite de réception <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-inboxes" viewBox="0 0 16 16">
            <path d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562A.5.5 0 0 0 1.884 9h12.234a.5.5 0 0 0 .496-.438L14.933 6zM3.809.563A1.5 1.5 0 0 1 4.981 0h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374L3.81.563zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zm.941.83.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438l.32-2.562H10.45a2.5 2.5 0 0 1-4.9 0H1.066z"/>
          </svg>
        </h6>


        
        <table class="table table-hover">    
        <tbody>
        @foreach($messages as $message)
         
        <div>
           <!---->
           <tr @if($message->etat==0) style="background-color:rgb(255, 244, 244)" @endif>
            <th scope="row" style="text-align: left;width:20%;vertical-align: middle;">
               <a style="text-decoration: none;color:black;" href="{{ route('details',['id'=>$users->where('id',$message->user_id)->first()->id]) }}"> <img class="card-img-top" src="{{asset($users->where('id',$message->user_id)->first()->logo_path)}}" style="width: 40px;" alt="user image" id="user-img">
                {{ $users->where('id',$message->user_id)->first()->nom }}</a></th>
            <td style="text-align: left;width:32%;vertical-align: middle;"> 
                @if(strlen($message->message)>40)
                <a href="#" style="color:black;text-decoration:none;" data-toggle="modal" data-target="#MessageModale{{$message->id}}">
                <div class="alert alert-info" role="alert">
                        
                     {{substr($message->message, 0,40)}} ... <svg style="float: right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                </div>
                </a>
                @else
                <a href="#" style="color:black;text-decoration:none;" data-toggle="modal" data-target="#MessageModale{{$message->id}}">
                    <div class="alert alert-info" role="alert">
                        @if(strlen($message->message)==0)
                        Aucun message
                        @else
                        {{$message->message}}
                        @endif
                       
                        <svg style="float: right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                    </div>
                    
                </a>
                @endif
                
            </td>
            <td style="text-align: left;width:15%;vertical-align: middle;"> 
                @if($message->document=='null')
                <a  style="text-decoration:none;"> Aucun Document</a>
               @else
               <a href="/telecharger/{{$message->id}}" style="text-decoration:none;"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                </svg> {{$message->document_name}} </a>
               @endif
            </td>
            <td style="text-align: right;width:13%;vertical-align: middle;">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newMessage{{$message->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
              </svg>
              </button>
              <div  style="text-align:right;font-size:15px;" >
                {{  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->format('M  H:i') }}
              </div>
            
              
             
            </td>
            
          </tr>
         
        </div>

          
        <!-----------------------------  Email Modal   ------------------------------->

        
 <div class="modal fade" id="newMessage{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Partager des documents entre collègues</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" method="POST" action="/partagerDocument">
          @csrf
        <div  class="modal-body">
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">email:</label>
              <input type="text" name="email" class="form-control" id="recipient-name" autocomplete="off" value="{{$users->where('id',$message->user_id)->first()->email}}" required >
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" name="message" id="message-text"></textarea>
            </div>
            <div class="form-group" align="center">
              <label for="formFileMultiple{{$message->id}}" class="custom-file-upload">Séléctionner un document<br>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                </svg>
              </label>
     
              <input class="form-control my-2" name="document" type="file" id="formFileMultiple{{$message->id}}" multiple style="background-color: #c2c4c7;color:rgb(44, 40, 40)">
            
              <script>
                $(document).ready(function() {
                    $('#formFileMultiple'+{{$message->id}}).change(function() {
                      document.getElementById("showhere"+{{$message->id}}).innerHTML =  document.getElementById('formFileMultiple'+{{$message->id}}).value;
                    });
                });
             </script>
           
            <div class="card-footer text-muted">
              <div align="center" id="showhere{{$message->id}}">
               
              </div>
            </div>
          </div>
            
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
  <!-------------------------------------------------------------------------------->

  <!-------------------------------------- **  Message Modal  ** --------------------------------->

  
  <!-- Modal -->
  <div class="modal fade" id="MessageModale{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"style="text-align:center;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
            <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
          </svg> Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div>
            <img class="card-img-top" src="{{asset($users->where('id',$message->user_id)->first()->logo_path)}}" style="width: 40px;" alt="user image" id="user-img">
            
            <br>{{ $users->where('id',$message->user_id)->first()->nom }}   
         </div>
        <div class="alert alert-info" role="alert" style="text-align: justify">
         {{$message->message}}
         
        </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!----------------------------------- *** End Message Modal   *** ----------------------------------------->

        @endforeach
       

      </tbody>
      </table>

          
         <!-------------------------------------------- Demande     ----------------------------->
      
         
         {{ $messages->links('pagination::bootstrap-4') }} 
                 
             
              </div>

           
          
          </div>
         

         

         
        
          <!-------------------------------------------- Fin Demande     ----------------------------->
       
          

    
     <!--------------------Fin Partie Dynamique ------------>
    </div>
  
 
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
 
 </html>


@endSection