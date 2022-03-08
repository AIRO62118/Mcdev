$(document).ready(function() {     
    function ajax(){        
        var request= $.ajax({        
            url: "'https://geo.api.gouv.fr/communes?codePostal=78000", 
            method: "GET",        
            dataType: "json",        
            beforeSend: function( xhr ) {            
                xhr.overrideMimeType( "application/json; charset=utf-8" );        
            }});        
            request.done(function( msg ) {            
                $.each(msg, function(index,e){              
                    console.log(e.titre);              
                });        
            });        // Fonction qui se lance lorsque l’accès au web service provoque une erreur         
            request.fail(function( jqXHR, textStatus ) {            
                alert ('erreur');         
            });    
        }    // Appel de la fonction ajax    
        ajax();
    }
);