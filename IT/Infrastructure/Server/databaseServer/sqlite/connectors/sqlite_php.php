<!-- https://www.php.net/manual/en/book.sqlite3.php -->

<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <title>Sqlite3</title> 
    </head> 
    <body> 
	    <?php
            // test if sqlite3 extension is loaded (optional)
            if (extension_loaded("sqlite3")) {
                echo "Extension for sqlite3 loaded<br>";
                echo "Version: " . SQLITE3::version()["versionString"] . "<br>";
            } else {
                echo "Extension for sqlite3 not loaded<br>";
            }


            // create and_or open database file
            $filenameDatabase = "demo.db";
            $database = new SQLITE3($filenameDatabase);


            // execute ddl and dml statements
            $ddl_statement = "create table employees (
                              id INTEGER PRIMARY KEY,
                              firstname TEXT,
                              lastname TEXT,
                              salary REAL,
                              birthday TEXT);";

            if ($database->exec($ddl_statement)) {
                echo "Table created<br>";
            } else {
                echo "Table not created<br>";
            }

            $dml_statement = "insert into employees (firstname, lastname, salary, birthday) values 
                              ('John', 'Doe', 2000, '1970-01-01'),
                              ('Jane', 'Dee', 2000, '1980-01-01');";
            if ($database->exec($dml_statement)) {
                echo "Records inserted<br>";
            } else {
                echo "Records not inserted<br>";
            }


            // query dql statements
            $dql_statement = "select * from employees;";
            $result = $database->query($dql_statement);
            if (!$result) {
                exit("Query not executed<br>");
            }

            // prepared statements (bindValue and bindParam)
            $prepared_statement = $database->prepare("select * from employees where lastname = :lastname ;");
            $prepared_statement->bindValue(":lastname", 'Doe', SQLITE3_TEXT);
            $result_2 = $prepared_statement->execute();


            // access result as associative array
            while ($record = $result->fetchArray(SQLITE3_ASSOC)) {
                echo $record["id"] . ", "
                   . $record["firstname"] . ", "
                   . $record["lastname"] . ", "
                   . $record["salary"] . ", "
                   . $record["birthday"] . "<br>";
            }
            echo "<br><br>";


            // access result as numeric array
            while ($record = $result_2->fetchArray(SQLITE3_NUM)) {
                for ($i=0; $i<count($record); $i++) {
                    echo $record[$i] . ", ";
                }
                echo "<br>";
            }
            echo "<br><br>";


            // close database
            $result->finalize();
            $result_2->finalize();
            $prepared_statement->close();
            $database->close();
        ?>
    </body> 
</html>