<?php

/*L'esercizio di questa lezione prevede di creare un Form di contatto per avere informazioni sui corsi di programmazione in 
un'accademia.

Creare un form in cui l'utente dovrà inserire il suo nome e la sua email per essere ricontattato.

Creare un'opzione multipla di corsi (select o checkbox vanno bene lo stesso), scegliendo tra: HTML, CSS, JavaScript, PHP, Java, Python, Laravel, MERN.

In PHP, acquisire i dati del form. 

Utilizzando una classe, utilizzare i dati del form in ingresso per creare l'istanza dell'utente da ricontattare.

Infine, creare un distruttore che mostrerà tutti i dati che l'utente ha selezionato in pagina.
*/


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-course-enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"
        defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body class="container">
    <h1 class="text-center mb-4">Course enrollment</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="courses">Courses:</label>
            <select class="form-control" id="courses" name="courses[]" multiple required>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Java">Java</option>
                <option value="Python">Python</option>
                <option value="Laravel">Laravel</option>
                <option value="MERN">MERN</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php 
    echo "Questi sono i tuoi riferimenti: <br>";
    //echo $user1->fullName;
    ?>
</body>

</html>

</html>

<?php
class User
{
    public $fullName;
    public $email;
    public $courses = [];

    public function __construct($fullName, $email, $courses)
    {
        var_dump($courses);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->courses = $courses;
    }

    public function __destruct() {
        echo "<strong>Il tuo nome completo</strong>: $this->fullName<br>";
        echo "<strong>La tua mail</strong>: $this->email<br>";
        echo "<strong>I corsi che hai richiesto</strong>: ". implode(", ", $this->courses)  . "<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['submit'])) {
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $courses = $_POST['courses'];

        if (isset($fullName) && isset($email) && isset($courses)) {
            $user = new User($fullName, $email, $courses);            
        } else  {
            echo "dati non forniti o non corretti";
        }
    }
}
?>