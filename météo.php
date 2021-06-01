<?php
  // fichier de connexion MySQL pour accéder aux données de la base de données
  include("db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];
?>

<?php
  // Nous allons « switcher » entre les méthodes de requête( comme GET, POST, DELETE et PUT)
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer une seuls donnée
        $id = intval($_GET["id"]);
        getProducts($id);
      }
      else
      {
        // Récupérer tous les données
        getProducts();
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  
    case 'POST':
      // Ajouter les données
      AddProduct();
      break;
  }
?>
<?php
  //Nous avons défini la méthode getProducts()
  function getProducts()
  {
      //pour releves
    echo "relevés: ";
    global $conn;
    $query = "SELECT * FROM releves";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
      {
        $response[] = $row;
      }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);

    //pour sonde
    echo "sonde: ";
    global $conn;
    $query = "SELECT * FROM sonde";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);

    //pour la station
    echo "station: ";
    global $conn;
    $query = "SELECT * FROM station";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }
?>
<?php
  function AddProduct()
  {
    global $conn;
    $id_releve = $_POST["id_releve"];
    $id_sonde = $_POST["id_sonde"];
    $id_station = $_POST["id_station"];
    $nom = $_POST["nom"];
    $humidite = $_POST["humidite"];
    $temperature = $_POST["temperature"];
    $Description = $_POST["Description"];
    $date = $_POST["date"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];


    echo $query="INSERT INTO produit(id_station, id_releve, id_sonde, nom, Description, temperature, humidite, date, lat, lon) VALUES('".$id_sonde."', '".$id_releve."', '".$id_station."', '".$nom."', '".$Description."', '".$temperature."', '".$humidite."', '".$date."', '".$lat."', '".$lon."')";

    if(mysqli_query($conn, $query))
    {
      $response=array(
        'status' => 1,
        'status_message' =>'Elément ajouté avec succes.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'ERREUR!.'. mysqli_error($conn)
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
?>

