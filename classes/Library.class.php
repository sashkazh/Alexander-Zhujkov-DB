<?php
class Heh{
    public function show(){
        try {
            $show = Connection::getInstance()->connect();
            $stmt = $show->query('SELECT * from classics');

            echo "<div class=\"container\"><table class=\"table\"><thead><tr><th><i class=\"glyphicon glyphicon-asterisk\"></i></th><th>Author</th><th>Title</th><th>Category</th><th>Year</th><th>ISBN</th><th>Action</th></tr></thead><tbody>";
            while ($row = $stmt->fetch()) {
                echo "<tr class='clickable' data-toggle='collapse' id='$row[id]' data-target='.$row[id]'>";
                echo "<td><i class=\"glyphicon glyphicon-plus\"></i></td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['isbn'] . "</td>";
                echo "<form action=\"delete.php\" method=\"post\">
                      <input type=\"hidden\" name=\"isbn\" value=\"$row[isbn]\" >
                      <input type=\"hidden\" name=\"delete\" value=\"yes\">
                      <td><input type=\"submit\" class=\"btn btn-danger\" value=\"Kill.\"></td>
                      </form>";
                echo "<form action=\"update.php\" method=\"post\"></tr>
                <tr class='collapse $row[id]'>
                <td></td>
                <td><input class=\"form-control\"  type=\"text\" name=\"a\" value=\"$row[author]\"></td>
                <td><input class=\"form-control\"  type=\"text\" name=\"t\" value=\"$row[title]\"></td>
                <td><input class=\"form-control\"  type=\"text\" name=\"c\" value=\"$row[category]\"></td>
                <td><input class=\"form-control\"  type=\"text\" name=\"y\" value=\"$row[year]\"></td>
                <td><input class=\"form-control\" id=\"disabledInput\" type=\"text\" name=\"isbn\" value=\"$row[isbn]\" disabled></td>
                <input type=\"hidden\" name=\"i\" value=\"$row[isbn]\">
                <td><input type=\"submit\" class=\"btn btn-primary\" value=\"Upd\"></td>
                </tr></form>";
            }
            echo "<form action=\"add.php\" method=\"post\"><tr>
            <td><i class=\"glyphicon glyphicon-pencil\"></i></td>
            <td><input class=\"form-control\"  type=\"text\" name=\"author\"></td>
            <td><input class=\"form-control\" type=\"text\" name=\"title\"></td>
            <td><input class=\"form-control\" type=\"text\" name=\"category\"></td>
            <td><input class=\"form-control\" type=\"text\" name=\"year\"></td>
            <td><input class=\"form-control\" type=\"text\" name=\"isbn\"></td>
            <td><input type=\"submit\" class=\"btn btn-success\" value=\"Add\"></td>
            </tr></form>";
            echo "</tbody></table></div>";
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }

    public function delete(){
        try {
            $delete = Connection::connect();
            if (isset($_POST['delete']) && isset($_POST['isbn']))
            {
                $stmt = $delete->prepare("DELETE FROM classics WHERE isbn = :isbn");
                $stmt->bindParam(':isbn', $isbn);

                $isbn = $_POST["isbn"];
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }

    public function add(){
        try {
            $add = Connection::connect();
            if (isset($_POST['author']) &&
                isset($_POST['title']) &&
                isset($_POST['category']) &&
                isset($_POST['year']) &&
                isset($_POST['isbn']))
            {
                $stmt = $add->prepare("INSERT INTO classics (author, title, category, year, isbn)
                VALUES (:author, :title, :category, :year, :isbn)");
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':isbn', $isbn);

                $author = $_POST['author'];
                $title = $_POST['title'];
                $category = $_POST['category'];
                $year = $_POST['year'];
                $isbn = $_POST['isbn'];
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }

    public function update()
    {
        try {
            $upd = Connection::connect();
            if (isset($_POST['i'])) {
                $stmt = $upd->prepare("UPDATE classics SET author = :author, title = :title, category = :category, year = :year WHERE isbn = :isbn");
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':isbn', $isbn);

                $author = $_POST['a'];
                $title = $_POST['t'];
                $category = $_POST['c'];
                $year = $_POST['y'];
                $isbn = $_POST['i'];
                $stmt->execute();
            }
        }
        catch (PDOException $e) {
            echo "<br>Не удалось установить соединения с базой данных: " . $e->getMessage(). "<br>";
        }
    }
}
?>