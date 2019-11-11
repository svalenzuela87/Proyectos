<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Challenge Torneos Tenis</title>


   <script type='text/javascript' src='js/handle_login.js?w=2'></script>

   <!--  <script type='text/javascript' src='read_single_range.js?w=2'></script> -->

    <link href="css/style.css" rel="stylesheet">

</head>

  <body>

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>

<!--     <button id="signin-button" onclick="handleSignInClick()">Ingresar</button>
    <button id="signout-button" onclick="handleSignOutClick()">Salir</button> -->

 <!--      <a  href="index.php" ><button style="margin-left: 8px; display:inline-block; margin-bottom: 25px; " > Volver</button></a> -->

     <div class="button_cont" align="center" style="display: flex;" onmousedown="return false">
       <a class="example_f" href="index.php"><span>Volver</a>
      </div>

      <br>

            <p style="margin-bottom: 45px; display: inline-block;"> Torneos del mayor ganador :  
              <g class="output" style="font-weight: bold;"></g> 
            </p>     

             <p style="margin-bottom: 45px; display: -webkit-inline-box;"> en  
              <g class="torneo" style="font-weight: bold;"></g> 
            </p>   
    

<div class= "containerc" style="width: auto;">
    <table id="añoc" cellspacing="0" cellpadding="0" style="display: inline-block;">
        <thead class="tbl-header">
            <tr>
                <th>Año</th>    <!-- 0 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
    <table id="torneoc" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -4px;">
        <thead class="tbl-header">
            <tr>
                <th>Torneo</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
    <table id="ubicacionc" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -5px;">
        <thead class="tbl-header">
            <tr>
                <th>Ubicacion</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
        <table id="fechac" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -4px;">
        <thead class="tbl-header">
            <tr>
                <th>Fecha</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
        <table id="singlesc" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -5px;">
        <thead class="tbl-header">
            <tr>
                <th>Singles</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
        <table id="doblesc" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -4px;">
        <thead class="tbl-header">
            <tr>
                <th>Dobles</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
        <table id="condicionc" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -5px;">
        <thead class="tbl-header">
            <tr>
                <th>Condicion</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
        <table id="superficiec" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -4px;">
        <thead class="tbl-header">
            <tr>
                <th>Superficie</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
        <table id="ganadorc" cellspacing="0" cellpadding="0" style="display: -webkit-inline-box;margin-left: -5px;">
        <thead class="tbl-header">
            <tr>
                <th>Ganador</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody>
            </tbody>
</div>
      


<script>

            //Gran Slams a buscar
            var slams = {
                   a: 'Australian Open',
                   b: 'Roland Garros',
                   c: 'US Open',
                   d: 'Wimbledon'
                };

            //Creo arrays para almacenar nombres
            var   Australian = []; 
            var   Roland = []; 
            var   US = []; 
            var   Wimbledon = [];  
     

function read_data() {


  var params = {
    // The ID of the spreadsheet to retrieve data from.
    spreadsheetId: '1GZu4w8_NiJS8I1--C-N5O2dPoj_Bv-ojekMRDS2ToMQ', 

    range: 'A1:AB4115',  

    majorDimension :'ROWS',

  };

  var request = gapi.client.sheets.spreadsheets.values.get(params);

  request.then(function(response) {

    populateSheet(response.result);

  }, function(reason) {
    console.error('error: ' + reason.result.error.message);
  });
}


function populateSheet(result) {



    //Obtengo valores para limitar tabla
    var campeonato = localStorage.getItem('torneo');
    var nombre = localStorage.getItem('nombre');


      //Muestro nombre por pantalla y torneo
      document.querySelector('.output').textContent = nombre;   
     document.querySelector('.torneo').textContent = campeonato;   


    //Obtener posiciones del ganador en el torneo seleccionado
    var posiciones_campeonatos = [];
    var posiciones_jugador = [];

        //ALMACENO POSICIONES DEL TORNEO
        var column;
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_name') {
                column = i;
                break;
            }
        }

        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

             if (val == campeonato){  
              //console.log("La posicion de torneo es : " + i);
                  posiciones_campeonatos.push(i);
             };
        }

        // console.log(posiciones_campeonatos);


        //ALMACENO POSICIONES DEL JUGADOR
        var column;
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'singles_winner_name') {
                column = i;
                break;
            }
        }
      
        for (var i=0; i < result.values.length; i++) {
             var val = result.values[i][column];

             if (val == nombre){  
              //console.log("La posicion del ganador es  : " + i);
                  posiciones_jugador.push(i);
             };
        }

        // console.log(posiciones_jugador);

        //Comparo posiciones y obtengo posiciones para buscar por columnas
         var final = [];
          for(var i=0;i<posiciones_jugador.length;i++){
              for(var j=0;j<posiciones_campeonatos.length;j++){
                if(posiciones_jugador[i]==posiciones_campeonatos[j]){
                  //console.log(posiciones_jugador[i]);
                  final.push(posiciones_jugador[i]);
                  }
            }
          };
      
    ///////////////////////////// AÑO ////////////////////////

    var tableRef = document.getElementById('añoc').getElementsByTagName('tbody')[0];

        //DISCRIMINA LA COLUMNA 
        var column;
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_year') {
                column = i;
                break;
            }
        }

          for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];
       
            var newRow   = tableRef.insertRow();   // CREA EL TR
            var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column1');    // SETEA CLASE
        }

       ///////////////////////////// TORNEO ////////////////////////

      var tableRef = document.getElementById('torneoc').getElementsByTagName('tbody')[0];

        var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_name') {
                column = i;
                break;
            }
        }


        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column2');    // SETEA CLASE
          }

    ///////////////////////////// UBICACION ////////////////////////

    var tableRef = document.getElementById('ubicacionc').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_location') {
                column = i;
                break;
            }
        }

        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];
  

                      if (val === ""){
                        val = "Sin ubicación";
                      }

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column3');    // SETEA CLASE
        }

    ///////////////////////////// FECHA ////////////////////////

    var tableRef = document.getElementById('fechac').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_dates') {
                column = i;
                break;
            }
        }

        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                      if (val === ""){
                        val = "Sin fecha";
                      }


                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column4');    // SETEA CLASE

        }

      ///////////////////////////// SINGLES ////////////////////////

        var tableRef = document.getElementById('singlesc').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_singles_draw') {
                column = i;
                break;
            }
        }

        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column5');    // SETEA CLASE
          
        }

        ///////////////////////////// DOBLES /////////////////////////////////////

        var tableRef = document.getElementById('doblesc').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === "tourney_doubles_draw") {
                column = i;
                break;
            }
        }


        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column6');    // SETEA CLASE

                
        }

        ///////////////////////////// CONDICION /////////////////////////////////////

        var tableRef = document.getElementById('condicionc').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_conditions') {
                column = i;
                break;
            }
        }

        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                      if (val === ""){
                        val = "Sin condición";
                      }

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column7');    // SETEA CLASE


        }

      ///////////////////////////// SUPERFICIE /////////////////////////////////////

        var tableRef = document.getElementById('superficiec').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_surface') {
                column = i;
                break;
            }
        }

        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                      if (val === ""){
                        val = "Sin superficie";
                      }

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column8');    // SETEA CLASE

        }

        ///////////////////////////// GANADOR /////////////////////////////////////

        var tableRef = document.getElementById('ganadorc').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'singles_winner_name') {
                column = i;
                break;
            }
        }


        for (var i = 0, j = final.length; i < j; i++) {
            var val = result.values[final[i]][column];

                      if (val === ""){
                        val = "Sin ganador";
                      }

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column9');    // SETEA CLASE
        }          

}


</script>

  </body>
</html>
