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


<div class="super-container">

    <div class="button_cont" align="center" style="display: flex;">
    <a class="example_f" rel="nofollow" onclick="handleSignInClick()"><span>Ingresar </a>
    <a class="example_f" rel="nofollow" onclick="handleSignOutClick()"><span>Salir </a>
      </div>


          <div class="select" style="margin-top: 20px;">
            <select id = "slams" style="padding-left: 55px;">
              <option selected disabled>Selecciona un Grand Slam</option>
               <option value = "Australian">Australian Open</option>
               <option value = "Roland">Roland Garros</option>
               <option value = "US">US Open</option>
               <option value = "Wimbledon">Wimbledon</option>
            </select>
          </div>

          <div class= "resultado-container">

            <p id="nombre" style="display: none;"> El mayor campeon de
              <g class="torneo" style="font-weight: bold;"></g> 
            </p> 


            <p id="output" style="display: none;"> es: 
              <g class="output" style="font-weight: bold;"></g> 
            </p> 
          </div>

    <br>

    <div style="display: flex;" onmousedown="return false">

      <a class="myButton" onclick="buscarCampeon()">Ver campeon</a>

      <a   href="campeonatos.php" class="myButton"  id="campeonatos" style="margin-left: 8px; display:none; " onclick = "postIt();"> Ver campeonatos</a>
            
    </div>

    <br>

          <!-- Mensajeria por pantalla en caso de necesitar loguin -->
          <h1 id="loguin" style="display: none;"></h1>

</div>

 <!--      <button onclick="mostrarTabla()" > Ver tabla completa </button> -->

    <!-- HEADER -->
    <div class= "tbl-header" style="margin-left: 230px;">
    <table  cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="a">Año</th> 
                <th class="b">Torneo</th>
                <th class="c">Ubicación</th>
                <th class="d">Fecha</th>
                <th class="e">Singles</th>
                <th class="f">Dobles</th>
                <th class="g">Condición</th>
                <th class="h">Superficie</th>
                <th class="i">Ganador</th>
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
    </div>

<!-- TABLA CON CONTENIDO --> 
<div class="tbl-content table" style="width: 1325px;height: 754px;display: flex;margin-left: 230px;">
    <table id="año" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Año</th>    <!-- 0 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
    <table id="torneo" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Torneo</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
    <table id="ubicacion" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Ubicacion</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
        <table id="fecha" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Fecha</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
        <table id="singles" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Singles</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
        <table id="dobles" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Dobles</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
        <table id="condicion" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Condicion</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
        <table id="superficie" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Superficie</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
            </tbody>
    </table>
        <table id="ganador" cellspacing="0" cellpadding="0">
        <thead class="tbl-header">
            <tr>
                <th style="display:none;">Ganador</th> <!-- 2 -->
            </tr>
        </thead>
            <tbody class="tbl-content">
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


      function buscarCampeon() { 


          selectElement = document.querySelector('#slams'); 
                      
            array = selectElement.value; 
            campeonato = selectElement.value; 

                      switch (campeonato) {
                          case "Australian":
                            array = Australian;
                            campeonato= slams.a;
                            break;
                          case "Roland":
                            array = Roland;
                            campeonato= slams.b;
                            break;
                          case "US":
                            array = US;
                            campeonato= slams.c;
                            break;
                          case "Wimbledon":
                            array = Wimbledon;
                            campeonato= slams.d;
                            break;
                          default:
                             campeonato= "ninguno";
                        };


              if (campeonato== "ninguno"){

                console.log('No selecciono ningun Grand Slam');

              }else{

                //OBTENGO GANADOR POR CANTIDAD DE VECES
                var arr1= array;
                var mf = 1;
                var m = 0;
                var item;
                for (var i=0; i<arr1.length; i++)
                {
                        for (var j=i; j<arr1.length; j++)
                        {
                                if (arr1[i] == arr1[j])
                                 m++;
                                if (mf<m)
                                {
                                  mf=m; 
                                  item = arr1[i];
                                }
                        }
                        m=0;
                }

                console.log(item+" ( " +mf +" veces ) ") ;

                // //Almaceno torneo en variable browser para post
                localStorage.setItem('torneo', campeonato);
                localStorage.setItem('nombre', item);

                //MOSTRAR TEXTO OCULTO
                 var x = document.getElementById("nombre");
                 var y= document.getElementById("output");
                 var z= document.getElementById("campeonatos");

                      x.style.display = "inline-block";
                      y.style.display = "-webkit-inline-box";
                      z.style.display = "inline-block";

              

              //Muestro resultado por pantalla
               document.querySelector('.torneo').textContent = campeonato;   


                if (item == undefined){
                   output= "No se encuentra logueado para adquirir informacion.";
                   z.style.display = "none";
                 }else{
                  output= item + " ( " + mf +" veces ) ";
                }

                document.querySelector('.output').textContent = output; 

             }   
        } 

function read_data() {


  var e= document.getElementById("loguin");
  e.style.display = "none";

  var params = {
    // The ID of the spreadsheet to retrieve data from.
    spreadsheetId: '1GZu4w8_NiJS8I1--C-N5O2dPoj_Bv-ojekMRDS2ToMQ', 

    range: 'A1:AB4115',  

    majorDimension :'ROWS',

  };

  var request = gapi.client.sheets.spreadsheets.values.get(params);

  request.then(function(response) {

    console.log(response.result);

    // Guardo el JSON en una variable de Browser
    //localStorage.setItem('resultado', JSON.stringify(response.result));
    // Obtengo variable con JSON
    // var resultado = localStorage.getItem('resultado');

    populateSheet(response.result);

  }, function(reason) {
    console.error('error: ' + reason.result.error.message);
  });
}

function loguinMessage(){

  var e= document.getElementById("loguin");

  e.style.display = "inline-block";

  document.getElementById("loguin").innerHTML = "Ingresar credenciales para obtener tabla por favor.";

}


function populateSheet(result) {
    
    ///////////////////////////// AÑO ////////////////////////

    var tableRef = document.getElementById('año').getElementsByTagName('tbody')[0];

        //DISCRIMINA LA COLUMNA 
        var column;
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_year') {
                column = i;
                break;
            }
        }

        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

            var newRow   = tableRef.insertRow();   // CREA EL TR
            var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column1');    // SETEA CLASE
        }


       ///////////////////////////// TORNEO ////////////////////////

        var tableRef = document.getElementById('torneo').getElementsByTagName('tbody')[0];

        var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_name') {
                column = i;
                break;
            }
        }


        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column2');    // SETEA CLASE

            //GUARDAR EL NOMBRE DEL TORNEO Y BUSCA POR CADA GRAN SLAM 
            if ((val == slams.a) || (val == slams.b) || (val == slams.c) || (val == slams.d)){                
              
                //ALMACENO Y GUARDO EL GANADOR DEL CAMPEONATO ENCONTRADO
                  for (var g = 0, t = result.values[0].length; t < j; g++) {
                      if (result.values[0][g] === 'singles_winner_name') {
                          ganador = g;
                          break;
                      }
                  }

                      switch (val) {
                          case slams.a:
                            //console.log( i + " El campeonato " + slams.a + " lo gano " + result.values[i][ganador]);
                                                  Australian.push(result.values[i][ganador]);
                            break;
                          case slams.b:
                            //console.log( i + " El campeonato " + slams.b + " lo gano " + result.values[i][ganador]);
                                                  Roland.push(result.values[i][ganador]);
                            break;
                          case slams.c:
                           //console.log( i + " El campeonato " + slams.c + " lo gano " + result.values[i][ganador]);
                                                 US.push(result.values[i][ganador]);
                            break;
                          case slams.d:
                            //console.log( i + " El campeonato " + slams.d + " lo gano " + result.values[i][ganador]);
                                                 Wimbledon.push(result.values[i][ganador]);
                            break;
                          default:
                            console.log('No es Grand Slam');
                        };

                }
        }

    ///////////////////////////// UBICACION ////////////////////////

    var tableRef = document.getElementById('ubicacion').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_location') {
                column = i;
                break;
            }
        }


        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];


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

    var tableRef = document.getElementById('fecha').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_dates') {
                column = i;
                break;
            }
        }

        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

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

        var tableRef = document.getElementById('singles').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_singles_draw') {
                column = i;
                break;
            }
        }

        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column5');    // SETEA CLASE
          
        }

        ///////////////////////////// DOBLES /////////////////////////////////////

        var tableRef = document.getElementById('dobles').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === "tourney_doubles_draw") {
                column = i;
                break;
            }
        }


        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

                  var newRow   = tableRef.insertRow();   // CREA EL TR
                  var cell  = newRow.insertCell(0);   // CREA EL TD

                // Append a text node to the cell
                var newText  = document.createTextNode(val);  //COLOCA VALOR
                cell.appendChild(newText);

                cell.setAttribute('class', 'column6');    // SETEA CLASE

                
        }

        ///////////////////////////// CONDICION /////////////////////////////////////

        var tableRef = document.getElementById('condicion').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_conditions') {
                column = i;
                break;
            }
        }

        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

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

        var tableRef = document.getElementById('superficie').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'tourney_surface') {
                column = i;
                break;
            }
        }

        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

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

        var tableRef = document.getElementById('ganador').getElementsByTagName('tbody')[0];

          var column="";
        for (var i = 0, j = result.values[0].length; i < j; i++) {
            if (result.values[0][i] === 'singles_winner_name') {
                column = i;
                break;
            }
        }


        for (var i = 1, j = result.values.length; i < j; i++) {
            var val = result.values[i][column];

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

function postIt()   {

  var campeonato = localStorage.getItem('torneo');
  var nombre = localStorage.getItem('nombre');

        form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'campeonatos.php');

        camp = document.createElement('input');
        camp.setAttribute('name', 'campeonato');
        camp.setAttribute('type', 'hidden');
        camp.setAttribute('value', campeonato);

        nomb = document.createElement('input');
        nomb.setAttribute('name', 'nombre');
        nomb.setAttribute('type', 'hidden');
        nomb.setAttribute('value', nombre);


        form.appendChild(camp);
        form.appendChild(nomb);
        document.body.appendChild(form);
        form.submit();   

}


$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();


</script>

  </body>
</html>
