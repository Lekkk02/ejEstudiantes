<?php 
session_start();
$arrayAlum = [];
$arrayTest = [];
if(isset($_SESSION['AlumBackup'])){
  $arrayAlum = $_SESSION['AlumBackup'];

}
if(isset($_POST['destroy'])){
  session_destroy();
  header("Location: index.php");
}
class Alumno {
    public $cedula_alum;
    public $nombre_alum;
    public $mate_alum;
    public $fisica_alum;
    public $prog_alum;
    public $aprobadoMate;
    public $aprobadoFisica;
    public $aprobadoProg;
    public function __construct($cedula,$nombre,$nota_mate, $nota_fisica, $nota_prog){ 
      $this->cedula_alum = $cedula;
      $this->nombre_alum = $nombre;
      $this->mate_alum = $nota_mate;
      $this->fisica_alum = $nota_fisica;
      $this->prog_alum = $nota_prog;
    }
    public function getCedula(){
      return $this->cedula_alum;
    }   
    public function getNombre(){
      return $this->nombre_alum;
    }    
    public function getMate(){
        return $this->mate_alum;
      }        
    public function getFisica(){
        return $this->fisica_alum;
      }    
    public function getProg(){
        return $this->prog_alum; 
      }  
    public function getAprobMate(){
        return $this->aprobadoMate; 
      }  

      public function getAprobFisica(){
        return $this->aprobadoFisica; 
      }  

      public function getAprobProg(){
        return $this->aprobadoProg; 
      }  
    public function setAprobMate(){
      $this->aprobadoMate = 1;
    }
    public function setAprobFisica(){
      $this->aprobadoFisica = 1;
    }
    public function setAprobProg(){
      $this->aprobadoProg = 1;
    }
  }
  

    if(isset($_POST['txtCedula']) && isset($_POST['txtNombre']) && isset($_POST['txtMate']) && isset($_POST['txtFisi']) && isset($_POST['txtProg'])){
        if(!empty($_POST['txtCedula']) && !empty($_POST['txtNombre']) && !empty($_POST['txtMate']) && !empty($_POST['txtFisi']) && !empty($_POST['txtProg'])){
            $cedula = $_POST['txtCedula'];
            $nombre = $_POST['txtNombre'];
            $mate = $_POST['txtMate'];
            $fisica = $_POST['txtFisi'];
            $prog = $_POST['txtProg'];

            $arrayTest = new Alumno($cedula,$nombre, $mate, $fisica, $prog);
            array_push($arrayAlum, $arrayTest);
            $_SESSION['AlumBackup'] = $arrayAlum;  

        }else{

        }
    }



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro Empleadosw</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link href="styles.css" rel="stylesheet" />
  </head>
  <body>
    <section>
      <nav class="navbar center">
        <div class="container">
          <div class="item">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="nav-link">Inicio</a>
          </div>
          <div class="item">
            <a href="#stats" class="nav-link">Estadisticas</a>
          </div>
        </div>
      </nav>
    </section>

    <main class="mainSec">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
        <label for="inputCedula">Cedula</label>          
              <input
                type="number"
                class="form-control"
                placeholder="Cédula"
                name="txtCedula"
                min="0"
                max="99999999"
              />
           
          </div>
        </div>
        <div class="form-group">
          <label for="inputNombre">Nombre</label>
          <input
            type="text"
            class="form-control"
            placeholder="Nombre alumno"
            name="txtNombre"
          />
        </div>
        <div class="form-group">
        <label for="inputMate">Nota de matemáticas</label>          
              <input
                type="number"
                class="form-control"
                placeholder="Nota"
                name="txtMate"
                min="0"
                max="20"
              />
           
          </div>
          <div class="form-group">
        <label for="inputMate">Nota de de física</label>          
              <input
                type="number"
                class="form-control"
                placeholder="Nota"
                name="txtFisi"
                min="0"
                max="20"
              />
           
          </div>
          <div class="form-group">
        <label for="inputMate">Nota de programación</label>          
              <input
                type="number"
                class="form-control"
                placeholder="Nota"
                name="txtProg"
                min="0"
                max="20"
              />
           
          </div>
         
        
         

        <button
          type="submit"
          class="btn btn-primary"
          name="btn"
        >
          Registrar
        </button>
        <button
          type="submit"
          class="btn btn-secondary"
          name="destroy"
        >
          Borrar Registros
        </button>
      </form>

      <div id="table">
        <h1 class='my-4'>Lista de alumnos</h1>
      <table class="table table-bordered my-2">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cedula</th>
      <th scope="col">Nombre</th>
      <th scope="col">Nota matemáticas</th>
      <th scope="col">Nota física</th>
      <th scope="col">Nota programación</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      foreach($arrayAlum as $alumno){
        echo "<tr>";
        echo "<td>", $alumno->getCedula(), "</td>";
        echo "<td>", $alumno->getNombre(), "</td>";
        echo "<td>", $alumno->getMate(), "</td>";
        echo "<td>", $alumno->getFisica(), "</td>";
        echo "<td>", $alumno->getProg(), "</td>";

        echo "</tr>";
      }
      
      ?>

  </tbody>
</table>
      </div>
    </main>

    <section id="stats">
      <h1>Estadisticas</h1>
      <div id="table">
    <table class="table table-bordered my-2">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class='text-center align-middle '>Promedio matemática</th>
      <th scope="col" class='text-center align-middle'>Promedio física</th>
      <th scope="col" class='text-center align-middle'>Promedio programación</th>

      <th scope="col" class='text-center align-middle'>Aprobados matemática</th>
      <th scope="col" class='text-center align-middle'>Aprobados física</th>
      <th scope="col" class='text-center align-middle'>Aprobados programación</th>

      <th scope="col" class='text-center align-middle'>Reprobados matemática</th>
      <th scope="col" class='text-center align-middle'>Reprobados física</th>
      <th scope="col" class='text-center align-middle'>Reprobados programación</th>

    </tr>
    <tr>
    <?php 
      $promMate = 0;
      $promFisica = 0;
      $promProg = 0;

      $cantAprobMate = 0;
      $cantReprobMate = 0;

      $cantAprobFisica = 0;
      $cantReprobFisica = 0;

      
      $cantAprobProg = 0;
      $cantReprobProg = 0;


      foreach($arrayAlum as $alumno){ 
        $promMate += $alumno->getMate(); 
        $promFisica += $alumno->getFisica(); 
        $promProg += $alumno->getProg(); 

        if($alumno->getMate() > 9){
          $cantAprobMate += 1;
          $alumno->setAprobMate();

        }else{
          $cantReprobMate += 1;
        }

        if($alumno->getFisica() > 9){
          $cantAprobFisica += 1;
          $alumno->setAprobFisica();

        }else{
          $cantReprobFisica += 1;
        }

        if($alumno->getProg() > 9){
          $cantAprobProg += 1;
          $alumno->setAprobProg();

        }else{
          $cantReprobProg += 1;
        }


       
      }

      echo "<td>";
       try{
        echo $promMate / sizeof($arrayAlum);
      }catch(DivisionByZeroError){
        echo "0";
      } 
      echo "</td>";

      echo "<td>";
      try{
        echo $promFisica / sizeof($arrayAlum);
      }catch(DivisionByZeroError){
        echo "0";
      } 
      echo "</td>";

      echo "<td>";
      try{
        echo $promProg / sizeof($arrayAlum);
      }catch(DivisionByZeroError){
        echo "0";
      } 

      echo "</td>";

      echo "<td>";
      echo $cantAprobMate;
      echo "</td>";

      echo "<td>";
      echo $cantAprobFisica;
      echo "</td>";

      echo "<td>";
      echo $cantAprobProg;
      echo "</td>";

      
      echo "<td>";
      echo $cantReprobMate;
      echo "</td>";

      echo "<td>";
      echo $cantReprobFisica;
      echo "</td>";

      echo "<td>";
      echo $cantReprobProg;
      echo "</td>";

  
      ?>

    </tr>
 
  </thead>
  <tbody>


  </tbody>
</table>

<table class="table table-bordered my-2">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class='text-center align-middle '>Alumnos que aprobaron todas las materias</th>
      <th scope="col" class='text-center align-middle'>Alumnos que aprobaron 2 materias</th>
      <th scope="col" class='text-center align-middle'>Alumnos que aprobaron 1 materia</th>

      <th scope="col" class='text-center align-middle'>Nota máxima matemática</th>
      <th scope="col" class='text-center align-middle'>Nota máxima física</th>
      <th scope="col" class='text-center align-middle'>Nota máxima programación</th>

    </tr>
    <tr>
    <?php 

      $cantTodas = 0;
      $cantdos = 0;
      $cantuna = 0;

      $maxMate = 0;
      $maxFisica = 0;
      $maxProg = 0;

      
      foreach($arrayAlum as $alumno){
        if(($alumno->getAprobProg() + $alumno->getAprobFisica() + $alumno->getAprobMate()) == 3){
          $cantTodas += 1;
        }
        if(($alumno->getAprobProg() + $alumno->getAprobFisica() + $alumno->getAprobMate()) == 2){
          $cantdos += 1;
        }
        if(($alumno->getAprobProg() + $alumno->getAprobFisica() + $alumno->getAprobMate()) == 1){
          $cantuna += 1;
        }


        if($alumno->getMate() > $maxMate){
          $maxMate = $alumno->getMate();
        }
        
        if($alumno->getFisica() > $maxFisica){
          $maxFisica = $alumno->getFisica();
        }
        
        if($alumno->getProg() > $maxProg){
          $maxProg = $alumno->getProg();
        }

       
      }
      echo "<td>";
      echo $cantTodas;
      echo "</td>";

      echo "<td>";
      echo $cantdos;
      echo "</td>";

      echo "<td>";
      echo $cantuna;
      echo "</td>";

      echo "<td>";
      echo $maxMate;
      echo "</td>";

      echo "<td>";
      echo $maxFisica;
      echo "</td>";

      echo "<td>";
      echo $maxProg;
      echo "</td>";
  
      
      ?>

    </tr>
 
  </thead>
  <tbody>


  </tbody>
</table>
    </section>
    <script src="js/index.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
